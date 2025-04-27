<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah produk</title>
    <link rel="icon" type="image/png" href="../img/Givenchypol.png" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "Header.php";
        include "../Koneksi.php";
        $query_produk = mysqli_query($conn, "select * from produk where id_produk='".$_GET['id_produk']."'"); //get=karena datanya mengambil dr url
        $data_produk = mysqli_fetch_array($query_produk); //diubah ke array assosiatif dan numerik
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <h1 class="card-header">Edit Product</h1>
            <div class="card-body">
                <form method="POST" action="Proses_Ubah_Produk.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_produk" value="<?=$data_produk['id_produk']?>">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Name of Product</label>
                        <input type="text" class="form-control" name="nama_produk" value="<?=$data_produk['nama_produk']?>" placeholder="Input Name of Product" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Description</label>
                        <input type="text" class="form-control" name="deskripsi" value="<?=$data_produk['deskripsi']?>" placeholder="Input Description of Product" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Category</label>
                        <input type="text" class="form-control" name="kategori" value="<?=$data_produk['kategori']?>" placeholder="Input Category of Product" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">Name of Brand</label>
                        <input type="text" class="form-control" name="merek" value="<?=$data_produk['merek']?>" placeholder="Input Name of Brand" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Price</label>
                        <input type="text" class="form-control" name="harga" value="<?=$data_produk['harga']?>" placeholder="Input Price of Brand" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_produk" class="form-label">Photo</label>
                        <img src="../img/<?=$data_produk['foto_produk']?>" width="100"/></br>
                        <input type="file" class="form-control" name="foto_produk" value="<?=$data_produk['foto_produk']?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
<?php
    include "Footer.php";
?>