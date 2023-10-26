<?php
$artikelId = @$_GET['id'];
$artikel = null;

if ($artikelId) {
    include 'db-connection.php';

    if ($connection) {
        if (@$_POST['id']) {
            // Update data
            $querySql = "UPDATE artikel SET judul = :judul, isi = :isi, gambar = :gambar WHERE id = :id";
            $statement = $connection->prepare($querySql);
            $statement->execute([
                'judul' => $_POST['judul'],
                'isi' => $_POST['isi'],
                'gambar' => $_POST['gambar'],
                'id' => $_POST['id']
            ]);

            header("Location: admin.php");
            exit;
        } else {
            // Tampilkan data
            $querySql = 'SELECT * FROM artikel WHERE id = :id';
            $statement = $connection->prepare($querySql);
            $statement->execute([
                'id' => $artikelId
            ]);
            $artikel = $statement->fetch(PDO::FETCH_ASSOC);
        }
    } else {
        echo "Gagal terhubung ke database.";
    }
} else {
    echo "Wajib kirim parameter 'id' untuk mengedit artikel.";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Artikel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cba9" fill-opacity="0.85" d="M0,192L48,160C96,128,192,64,288,64C384,64,480,128,576,144C672,160,768,128,864,112C960,96,1056,96,1152,122.7C1248,149,1344,203,1392,229.3L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container mt-5">
        <h2>Edit Artikel</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="judul">Judul :</label>
                <input type="text" name="judul" id="judul" class="form-control" required value="<?= $artikel['judul'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="isi">Text</label>
                <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required><?= $artikel['isi'] ?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar URL</label>
                <input type="url" name="gambar" id="gambar" class="form-control" required value="<?= $artikel['gambar'] ?? '' ?>">
            </div>

            <?php if ($artikel): ?>
                <input type="hidden" name="id" value="<?= $artikel['id'] ?>">
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="admin.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cba9" fill-opacity="0.85" d="M0,64L48,64C96,64,192,64,288,96C384,128,480,192,576,218.7C672,245,768,235,864,224C960,213,1056,203,1152,202.7C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</body>
</html>
