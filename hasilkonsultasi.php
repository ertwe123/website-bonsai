<?php
include './databases/koneksi.php';

// mengaktifkan session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bonsai</title>

  <link rel="shortcut icon" href="assets/images/cupang8.png">

  <!-- Vendor CSS -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/css/style2.css" rel="stylesheet">

  <style>
    .form {
      margin-top: 70px;
    }

    .diagnosa {
      margin: 10px;
      max-height: 300px;
      overflow: auto;
      border: 3px solid #a3f0ff;
      letter-spacing: 2px;
      text-align: center;
      padding: 15px;
      border-radius: 10px;
    }

    .solusi {
      margin: 10px;
      max-height: 300px;
      overflow: auto;
      border: 3px solid #a3f0ff;
      letter-spacing: 1px;
      padding: 15px;
      border-radius: 10px;
    }
  </style>
</head>

<body>

  <div class="container">

    <h1 class="text-center mt-5">
      Hasil Diagnosa Penyakit Tanaman Bonsai
    </h1>

    <?php

    $koneksi = mysqli_connect("localhost", "root", "", "ikancupang");

    // cek koneksi
    if (mysqli_connect_errno()) {
      die("Koneksi database gagal : " . mysqli_connect_error());
    }

    // cek apakah ada gejala dipilih
    if (isset($_POST['bukti'])) {

      echo "<div class='form'>";
      echo "<p><b>Gejala Yang Dipilih :</b></p>";

      $gejaladipilih = $_POST['bukti'];

      foreach ($gejaladipilih as $gjlplh) {

        $qry = mysqli_query($koneksi, "SELECT * FROM tb_gejala WHERE id='$gjlplh'");

        while ($data = mysqli_fetch_array($qry)) {

          echo $data['kdgejala'] . " | " . $data['gejala'] . "<br>";
        }
      }

      echo "</div>";

      // mengambil belief
      $sql = "SELECT GROUP_CONCAT(b.kdpenyakit), a.belief
              FROM tb_rules a
              JOIN tb_penyakit b ON a.id_penyakit=b.id
              WHERE a.id_gejala IN(" . implode(',', $_POST['bukti']) . ")
              GROUP BY a.id_gejala";

      $result = $koneksi->query($sql);

      $bukti = array();

      while ($row = $result->fetch_row()) {
        $bukti[] = $row;
      }

      // mengambil seluruh kode penyakit
      $sql = "SELECT GROUP_CONCAT(kdpenyakit) FROM tb_penyakit";

      $result = $koneksi->query($sql);

      $row = $result->fetch_row();

      $fod = $row[0];

      // proses densitas
      $densitas_baru = array();

      while (!empty($bukti)) {

        $densitas1[0] = array_shift($bukti);
        $densitas1[1] = array($fod, 1 - $densitas1[0][1]);

        $densitas2 = array();

        if (empty($densitas_baru)) {

          $densitas2[0] = array_shift($bukti);

        } else {

          foreach ($densitas_baru as $k => $r) {

            if ($k != "&theta;") {
              $densitas2[] = array($k, $r);
            }
          }
        }

        $theta = 1;

        foreach ($densitas2 as $d) {
          $theta -= $d[1];
        }

        $densitas2[] = array($fod, $theta);

        $m = count($densitas2);

        $densitas_baru = array();

        for ($y = 0; $y < $m; $y++) {

          for ($x = 0; $x < 2; $x++) {

            if (!($y == $m - 1 && $x == 1)) {

              $v = explode(',', $densitas1[$x][0]);
              $w = explode(',', $densitas2[$y][0]);

              sort($v);
              sort($w);

              $vw = array_intersect($v, $w);

              if (empty($vw)) {

                $k = "&theta;";

              } else {

                $k = implode(',', $vw);
              }

              if (!isset($densitas_baru[$k])) {

                $densitas_baru[$k] =
                  $densitas1[$x][1] * $densitas2[$y][1];

              } else {

                $densitas_baru[$k] +=
                  $densitas1[$x][1] * $densitas2[$y][1];
              }
            }
          }
        }

        foreach ($densitas_baru as $k => $d) {

          if ($k != "&theta;") {

            $densitas_baru[$k] =
              $d / (1 - (isset($densitas_baru["&theta;"])
                ? $densitas_baru["&theta;"]
                : 0));
          }
        }
      }

      unset($densitas_baru["&theta;"]);

      // urutkan nilai terbesar
      arsort($densitas_baru);

      // mengambil nama penyakit
      $arrPenyakit = array();

      $qry = mysqli_query($koneksi, "SELECT * FROM tb_penyakit");

      while ($data = mysqli_fetch_array($qry)) {

        $arrPenyakit[$data['kdpenyakit']] =
          $data['nama_penyakit'];
      }

      // mengambil solusi
      $dataS = null;

      $dataS = null;

// ambil kode penyakit dengan nilai tertinggi
$codes = array_keys($densitas_baru);

// pecah jika ada lebih dari satu kode
$final_codes = explode(',', $codes[0]);

// ambil penyakit pertama
$kodePenyakit = $final_codes[0];

// query solusi penyakit
$strS = mysqli_query(
  $koneksi,
  "SELECT * FROM tb_penyakit WHERE kdpenyakit='$kodePenyakit'"
);

if ($strS && mysqli_num_rows($strS) > 0) {

  $dataS = mysqli_fetch_array($strS);
}

      // hasil diagnosa
      echo "<br><br>";

      echo "<p style='text-align:center;'>";
      echo "<b>Kesimpulan Hasil Diagnosa :</b>";
      echo "</p>";

      $codes = array_keys($densitas_baru);

      $final_codes = explode(',', $codes[0]);

      $sql = "SELECT GROUP_CONCAT(nama_penyakit)
              FROM tb_penyakit
              WHERE kdpenyakit IN('" . implode("','", $final_codes) . "')";

      $result = $koneksi->query($sql);

      $row = $result->fetch_row();

      echo "<div class='diagnosa'>";

      echo "Terdeteksi penyakit <b>{$row[0]}</b>
            dengan derajat kepercayaan sebesar
            <b>" . round($densitas_baru[$codes[0]] * 100, 2) . "%</b>";

      echo "</div>";

      // solusi
      echo "<br>";

      echo "<p style='text-align:center;'>";
      echo "<b>Saran :</b>";
      echo "</p>";

      if ($dataS && isset($dataS['solusi'])) {

        echo "<div class='solusi'>";
        echo $dataS['solusi'];
        echo "</div>";

      } else {

        echo "<p style='text-align:center;color:red;'>
              Solusi penyakit tidak ditemukan
              </p>";
      }
    }

    ?>

    <div class="d-flex justify-content-center mb-5">
      <a href="./konsultasi.php"
        class="btn btn-outline-danger mt-2">
        Klik disini untuk kembali
      </a>
    </div>

  </div>

</body>

</html>