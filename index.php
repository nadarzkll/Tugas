<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website Artikel</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">

</head>
<nav class="navbar navbar-expand-lg navbar-info bg-info shadow-lg fixed-top ">
  <a href="#Home">
    <div class="container">
      <a class="navbar-brand text-light" style="font-family: forte; font-size:xx-large;" href="#">Website.Artikel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-light" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#Home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Hubungi_Kami">Hubungi Kami</a>
          </li>
        </div>
      </div>
      <button type="button" class="btn btn-outline-dark justify-content-end">
        <a href="../Tugas_Akhir/Admin/login.php" style="color: inherit; text-decoration: none;">Admin</a>
      </button>

    </div>
    </div>
    </div>
  </a>
</nav>

<style>
  .carousel-item {
    height: 700px;
  }
</style>
<div id="Home">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://i.pinimg.com/originals/c1/f9/5d/c1f95db40ca8d42eabf3b99703c37074.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption d-none d-md-block text-dark">
          <h1>여러분, 안녕하세요</h1>
          <p>Temukan drama Favoritmu!!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/06/15/2907532243.jpeg"
          class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-dark">
          <h1>여러분, 안녕하세요</h1>
          <p>Temukan drama Favoritmu!!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://asset-a.grid.id/crop/0x0:0x0/x/photo/2020/11/12/4125607089.jpg" class="d-block w-100"
          alt="...">
        <div class="carousel-caption d-none d-md-block text-light">
          <h1>여러분, 안녕하세요</h1>
          <p>Temukan drama Favoritmu!!</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="0.8"
    d="M0,288L48,245.3C96,203,192,117,288,106.7C384,96,480,160,576,170.7C672,181,768,139,864,149.3C960,160,1056,224,1152,256C1248,288,1344,288,1392,288L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
  </path>
</svg>


<?php
include '../TUGAS/Admin/db-connection.php';
if ($connection) {
  $querySql = 'SELECT * FROM artikel';
  $statement = $connection->prepare($querySql);
  $statement->execute();
  $listArtikel = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<br><br>
<center>
  <div class="container text-center" id="Blog">
    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 border-end-0">
      <b class="display-4 text-secondary"> Blog </b>
    </div>
  </div>
</center>

<br>
<div class="container bg-light" style="justify-content: center;">
  <?php if ($listArtikel) { ?>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php foreach ($listArtikel as $article) { ?>
        <div class="col-md-4 mb-4">
          <div class="card border border-5">
            <img src="<?= $article['gambar'] ?>" class="card-img-top h-100" alt="<?= $article['judul'] ?>">
            <div class="card-body">
              <h4 class="card-title">
                <?= $article['judul'] ?>
              </h4>
              <p class="card-text">
                <?= substr($article['isi'], 0, 255) ?>...
              </p>
              <a href="../Tugas_Akhir/Admin/find.php?id=<?= $article['id'] ?>" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#0099ff" fill-opacity="0.85"
    d="M0,128L48,160C96,192,192,256,288,282.7C384,309,480,299,576,261.3C672,224,768,160,864,154.7C960,149,1056,203,1152,202.7C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
  </path>
</svg>

<div class="p-3 mb-2 bg-dark text-white" id="Hubungi_Kami">
  <div class="container d-flex justify-content-center">
    <form>
      <h2 class="text-center">Hubungi Kami</h2>
      <div class="row justify-content-center mb-3" style="width: 700px;">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Nama">
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
        </div>
      </div>

      <div class="mb-3" style="width: 680px;">
        <label for="exampleInputText1" class="form-label">Pesan</label>
        <input type="text" class="form-control" style="height: 150px;" id="exampleInputText1" placeholder="Pesan">
      </div>

      <button type="submit" class="btn btn-primary" style="width: 100px;">Kirim</button>
    </form>
  </div>
</div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
