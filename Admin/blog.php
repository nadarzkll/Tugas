<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <?php
    include 'db-connection.php';
    if ($connection) {
        $querySql = 'SELECT * FROM artikel';
        $statement = $connection->prepare($querySql);
        $statement->execute();
        $listArtikel = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

<center>
    <h1>Admin</h1>
</center>
<br>
    <?php if ($listArtikel) { ?>
        <div class="row justify-content-center">
            <?php foreach ($listArtikel as $article) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card border border-5">
                        <img src="<?= $article['gambar'] ?>" class="card-img-top" alt="<?= $article['judul'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article['judul'] ?></h5>
                            <p class="card-text"><?= substr($article['isi'], 0, 200) ?>...</p>
                            <a href="find.php?id=<?= $article['id'] ?>" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>