<!-- menampilkan data produk yang akan diubah menggunakan value -->
<?php
    $id_produk = $_POST["id_produk"];
    $nama_produk = $_POST["nama_produk"];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $harga = $_POST['harga'];

    include "../Koneksi.php";
    if ($_FILES['foto_produk']['tmp_name']) {
        $temp = $_FILES['foto_produk']['tmp_name'];
        $type = $_FILES['foto_produk']['type'];
        $size = $_FILES['foto_produk']['size'];
        $name = rand(0, 9999) . $_FILES['foto_produk']['name'];
        $folder = "../img/";

        if ($size < 2048000 and ($type == 'image/jpeg' or $type == 'image/png')) {
            $query_foto = mysqli_query($conn, "SELECT * FROM produk where id_produk = '" . $_POST['id_produk'] . "'");
            $data_foto = mysqli_fetch_array($query_foto);
            unlink('../img/' . $data_foto['foto_produk']); //remove foto yang ada difolder lalu diganti foto yang baru diup

            move_uploaded_file($temp, $folder . $name);
            $input = mysqli_query($conn, "UPDATE produk SET 
                nama_produk='" . $nama_produk . "', deskripsi='" . $deskripsi . "',
                kategori='" . $kategori . "',merek='" . $merek . "',harga='" . $harga . "', foto_produk='" . $name . "'
                where id_produk='" . $id_produk . "'");

            if ($input) {
                echo "<script>alert('Success to Edit This Product');location.href='Produk.php';</script>";
            } else {
                echo "<script>alert('Failed Edit this Product');location.href='Produk.php';</script>";
            }
        }
    } else {
        $input = mysqli_query($conn, "UPDATE produk SET 
            nama_produk='" . $nama_produk . "', deskripsi='" . $deskripsi . "',
            kategori='" . $kategori . "',merek='" . $merek . "',harga='" . $harga . "', foto_produk='" . $name . "'
            where id_produk='" . $id_produk . "'");

        if ($input) {
            echo "<script>alert('Success to Edit This Product');location.href='Produk.php';</script>";
        } else {
            echo "<script>alert('Failed Edit this Product');location.href='Produk.php';</script>";
        }
    }

?>