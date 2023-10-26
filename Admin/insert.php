<?php

include 'db-connection.php';

if ($connection) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari formulir
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $gambar = $_POST['gambar'];

        // Buat kueri SQL untuk INSERT data
        $querySql = "INSERT INTO artikel (judul, gambar, isi) VALUES (:judul, :gambar, :isi)";
        $statement = $connection->prepare($querySql);

        // Bind nilai yang sesuai dengan placeholder
        $statement->bindParam(':judul', $judul);
        $statement->bindParam(':gambar', $gambar);
        $statement->bindParam(':isi', $isi);

        // Eksekusi pernyataan SQL
        if ($statement->execute()) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Gagal menambahkan data artikel.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#613613" fill-opacity="0.85" d="M0,128L48,106.7C96,85,192,43,288,69.3C384,96,480,192,576,208C672,224,768,160,864,138.7C960,117,1056,139,1152,160C1248,181,1344,203,1392,213.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Artikel</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi Artikel</label>
                <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">URL Gambar</label>
                <input type="url" name="gambar" id="gambar" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="../Admin/admin.php"class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#613613" fill-opacity="0.85" d="M0,128L48,106.7C96,85,192,43,288,69.3C384,96,480,192,576,208C672,224,768,160,864,138.7C960,117,1056,139,1152,160C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    
    <script src="./js/bootstrap.bundle.min.js" ></script>
  </body>
</html>
