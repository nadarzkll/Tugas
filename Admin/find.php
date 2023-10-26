<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="0.85" d="M0,160L48,144C96,128,192,96,288,69.3C384,43,480,21,576,37.3C672,53,768,107,864,112C960,117,1056,75,1152,58.7C1248,43,1344,53,1392,58.7L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
<?php

$id = @($_GET['id']);
$article = null;

if($id){

    include 'db-connection.php';

    $id = @$_GET['id'];
if ($connection && $id) {

     $querySql = "SELECT * from artikel where id=:id";
     $statement = $connection->prepare($querySql);
     $statement->execute([
          'id' => $id
     ]);
     $article = $statement->fetch(PDO::FETCH_ASSOC);

    }
}else{
    echo"Wajib kirim mentor id";
}
?>

<?php if($article){ ?>

     <body class="bg-light">
     <div class="container py-4">
    
          <a href="../index.php"class="btn btn-primary">Kembali</a><br><br>
     <div class="card mb-3">
     <img src="<?= $article['gambar'] ?>" style="width: 100%;" />
     <div class="card-body">
     <h1 class="text-center display-2">
          <?= $article['judul'] ?>
     </h1>

     <pre class="mt-3 lh-bas" style="white-space: break-spaces;font-size: 17px;"><?= $article['isi'] ?></pre>
</div>
</div>
</div>
<?php } ?>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>