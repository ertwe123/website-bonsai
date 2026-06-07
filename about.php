  <!-- navbar -->
  <?php include "tamplate/navbar.php"; ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/cupang.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2">
            <span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span>
            <span>Tentang <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-0 bread">Tentang</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row mb-5 pb-5">

        <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
          <div class="d-block services text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <img src="assets/images/cupang1.png" style="width: 50%" />
            </div>
            <div class="media-body p-4">
              <h3 class="heading">Budi Daya Tanaman Bonsai</h3>
              <p>
                Budi daya tanaman bonsai adalah seni mengerdilkan pohon atau tanaman hias 
                menggunakan pot dangkal untuk menciptakan miniatur bentuk asli pohon tua yang artistik. 
                Proses ini melibatkan teknik khusus seperti pemangkasan, pengawatan, dan pengaturan akar 
                untuk menciptakan keindahan estetik yang bernilai ekonomi tinggi.
              </p>
              <p>
                Anda Bisa melihat video bagaimana cara budi daya tanaman bonsai dengan menekan tombol video dibawah.</p>
              <a href="https://youtu.be/OXjBUED5RHg?si=DW7_FEkl2e6L-9-b" target="_blank" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-video-camera"></span><i class="sr-only">Read more</i></a>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
          <div class="d-block services text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <img src="assets/images/cupang2.png" style="width: 50%" />
            </div>
            <div class="media-body p-4">
              <h3 class="heading">Perawatan Tanaman Bonsai</h3>
              <p>
                Perawatan tanaman bonsai adalah rangkaian teknik pemeliharaan 
                seni hidup untuk menjaga tanaman tetap kerdil, sehat, dan estetis dalam pot dangkal. 
                Proses ini meliputi penyiraman rutin (1-2x sehari), pemangkasan rutin (cabang/daun), pemupukan, repotting, 
                serta pembentukan menggunakan kawat. Fokus utamanya adalah menjaga kesehatan dan keindahan bentuk pohon
              </p>
              <p>
                Anda Bisa melihat video bagaimana cara Perawatan tanaman bonsai dengan menekan tombol video dibawah.</p>
              <a href="https://youtu.be/fG0u5WIim_c?si=hjnulms-67O4WG9N" target="_blank" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-video-camera"></span><i class="sr-only">Read more</i></a>
            </div>
          </div>
        </div>

        <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
          <div class="d-block services text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <img src="assets/images/cupang3.png" style="width: 50%" />
            </div>
            <div class="media-body p-4">
              <h3 class="heading">Penyakit Tanaman Bonsai</h3>
              <p>
                Penyakit tanaman bonsai adalah gangguan kesehatan akibat infeksi jamur, bakteri, atau virus
                serta serangan hama (seperti ulat, wereng, dan kutu) yang merusak fisik tanaman 
                terutama karena lingkungan pot yang terbatas. Penyakit ini sering ditandai dengan daun bercak/kuning 
                batang membusuk, dan pertumbuhan terhenti.
              </p>
              <p>Anda Bisa melihat video bagaimana cara mengetahui jenis-jenis penyakit tanaman bonsai dengan menekan tombol video dibawah.</p>
              <a href="https://youtu.be/Hn3bzKlAdbE?si=6w74XyKcGNBkP13d" target="_blank" class="btn-custom d-flex align-items-center justify-content-center">
                <span class="fa fa-video-camera"></span><i class="sr-only">Read more</i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section class="ftco-section ftco-faqs">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-md-last">
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image: url(assets/images/cupang7.png); background-size: contain; background-repeat: no-repeat;">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="heading-section mb-5 mt-5 mt-lg-0">
            <h2 class="mb-3">Penyakit Tanaman Bonsai</h2>
            <p>
              Berikut Beberapa Penyakit Yang Ada Pada Aplikasi Sistem Pakar Tanaman Bonsai Ini.
            </p>
          </div>
          <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
            <?php
            include 'databases/koneksi.php';
            $sql = "SELECT * FROM tb_penyakit ORDER BY kdpenyakit";
            $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));

            while ($data = mysqli_fetch_array($qry)) {
              $id_penyakit = $data['kdpenyakit'];
            ?>
              <div class="card">
                <div class="card-header p-0" id="heading_<?php echo $id_penyakit; ?>" role="tab">
                  <h2 class="mb-0">
                    <button href="#collapse_<?php echo $id_penyakit; ?>" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_<?php echo $id_penyakit; ?>">
                      <p class="mb-0"><?php echo $data['nama_penyakit']; ?></p>
                      <i class="fa" aria-hidden="true"></i>
                    </button>
                  </h2>
                </div>
                <div class="collapse" id="collapse_<?php echo $id_penyakit; ?>" role="tabpanel" aria-labelledby="heading_<?php echo $id_penyakit; ?>">
                  <div class="card-body py-3 px-0">
                    <ul>
                      <li>
                        <label>Definisi Penyakit :</label>
                        <p class="text-info"><?php echo $data['definisi']; ?></p>
                      </li>
                      <li>
                        <label>Saran :</label>
                        <p class="warning"><?php echo $data['solusi']; ?></p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light ftco-faqs">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image: url(assets/images/cupang6.png); background-size: contain; background-repeat: no-repeat;">
          </div>
        </div>

        <div class="col-lg-6 order-md-last">
          <div class="heading-section mb-5 mt-5 mt-lg-0">
            <h2 class="mb-3">Gejala-gejala Penyakit Tanaman Bonsai</h2>
            <p>
              Berikut Beberapa Gejala Penyakit Yang Ada Pada Aplikasi Sistem Pakar Tanaman Bonsai Ini.
            </p>
          </div>
          <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
            <div class="card">
              <div class="card-header p-0" id="headingThree" role="tab">
                <h2 class="mb-0">
                  <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                    <p class="mb-0">
                      Lihat Gejala-gejala Penyakit Tanaman Bonsai
                    </p>
                    <i class="fa" aria-hidden="true"></i>
                  </button>
                </h2>
              </div>
              <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body py-3 px-0">
                  <?php
                  include 'databases/koneksi.php';
                  $sql = "SELECT * FROM tb_gejala ORDER BY id ASC";
                  $qry = mysqli_query($koneksi, $sql) or die("SQL Error" . mysqli_error($koneksi));

                  while ($data = mysqli_fetch_array($qry)) {
                  ?>
                    <ul>
                      <li><?php echo $data['gejala']; ?></li>
                    </ul>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <?php include "tamplate/footer.php"; ?>