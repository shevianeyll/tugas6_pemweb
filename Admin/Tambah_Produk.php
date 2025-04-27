<?php
    include "Header.php";//method post agar url-nya tidak tampil
?><br>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h3>Add New Product</h3>
        <form action="Proses_Tambah_Produk.php" method="post" enctype="multipart/form-data">
            Name of Product :
            <input type="text" name="nama_produk" value="" class="form-control" placeholder="Input Name of Product"
                required>
            Description :
            <input type="text" name="deskripsi" value="" class="form-control" placeholder="Input Description" required>
            Category :
            <input type="text" name="kategori" value="" class="form-control" placeholder="Input Category" required>
            Name of Brand :
            <input type="text" name="merek" value="" class="form-control" placeholder="Input Name of Brand" required>
            Price :
            <input type="text" name="harga" value="" class="form-control" placeholder="Input Price" required>
            Photo :
            <input type="file" name="foto_produk" value="" class="form-control" required><br>
            <input type="submit" name="simpan" value="Save" class="btn btn-outline-danger">
        </form>
    </div>
</div>
<?php
    include "Footer.php";
?>

<!-- agar file foto masih bisa diambil datanya -->