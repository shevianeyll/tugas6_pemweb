<?php 
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $harga = $_POST['harga'];
    $temp = $_FILES ['foto_produk']['tmp_name']; //karena upload jd menggunakan variabel FILES [tmp_name merupakan file itu sendiri]
    $type = $_FILES ['foto_produk']['type'];
    $size = $_FILES ['foto_produk']['size'];
    $name = rand(0,9999).$_FILES['foto_produk']['name']; //upload nama dari foto tsb
    $folder = "../img/";
    include "../Koneksi.php";
    if ($size < 2048000 and ($type =='image/jpeg' or $type =='image/png' or $type =='image/jpg')){ 
        move_uploaded_file($temp,$folder.$name); //[$file itu sendiri,$destinasi tujuan folder akan disimpan.$namafilenya]
        $input = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, kategori, merek, harga, foto_produk) VALUES ('".$nama_produk."','".$deskripsi."','".$kategori."','".$merek."','".$harga."','".$name."')");
        if ($input){
            echo "<script>alert('Berhasil Menambahkan produk');location.href='Produk.php';</script>";
        }else{
            echo "<script>alert('Gagal Menambahkan produk');location.href='Produk.php';</script>";
        }
    }
?>