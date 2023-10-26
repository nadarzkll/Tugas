<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffd700" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,106.7C384,128,480,192,576,192C672,192,768,128,864,122.7C960,117,1056,171,1152,202.7C1248,235,1344,245,1392,250.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
<?php
include 'db-connection.php';

if ($connection) {
    $querySql = 'SELECT * FROM artikel';
    $statement = $connection->prepare($querySql);
    $statement->execute();
    $listArtikel = $statement->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['hapus'])) {
    $artikelId = $_POST['hapus'];
    
    if ($connection) {
        try {
            // Ambil path file gambar terkait dari database
            $querySql = 'SELECT gambar FROM artikel WHERE id = :id';
            $statement = $connection->prepare($querySql);
            $statement->execute([
                'id' => $artikelId
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            // Hapus file gambar jika ada
            if ($result && file_exists($result['gambar'])) {
                unlink($result['gambar']);
            }

            // Hapus data artikel dari database
            $deleteSql = 'DELETE FROM artikel WHERE id = :id';
            $deleteStatement = $connection->prepare($deleteSql);
            $deleteStatement->execute([
                'id' => $artikelId
            ]);

            // Data artikel berhasil dihapus
            header("Location: admin.php");
            exit;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Gagal terhubung ke database.";
    }
}
?>

<div class="container">
    <h2 class="text-center">Admin</h2>
    <div class="text-center mb-3">
        <a href="../index.php"class="btn btn-secondary">Kembali</a>
        <a href="insert.php?id=<?= $article['id'] ?>" class="btn btn-success">Tambah</a>
        <a href="logout.php" class="btn btn-info">Logout</a>
    </div>

    <!-- Tabel dengan grup pembatas dan nama kolom tengah -->
    <div class="container bg-light" style="justify-content: center;">
        <div class="table-responsive mx-auto">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Isi</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listArtikel as $article) { ?>
                        <tr class="align-center">
                            <td><?= $article['judul'] ?></td>
                            <td><?= substr($article['isi'], 0, 50) ?>...</td>
                            <td><img src="<?= $article['gambar'] ?>" class="img-thumbnail" style="height: 100px;"></td>
                            <td>
                            <div class="btn-group" role="group">
                                <form method="post">
                                    <input type="hidden" name="hapus" value="<?= $article['id'] ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                                </form>
                                
                                <a href="update.php?id=<?= $article['id'] ?>" class="btn btn-primary">Edit</a>
                    
                            </div>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffd700" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,106.7C384,128,480,192,576,192C672,192,768,128,864,122.7C960,117,1056,171,1152,202.7C1248,235,1344,245,1392,250.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
