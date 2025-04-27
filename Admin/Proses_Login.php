<?php
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');
            location.href='Login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');
            location.href='Login.php';</script>";
        } else {
            include "../Koneksi.php";
            $qry_login=mysqli_query($conn,"SELECT * from petugas where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_petugas']=$dt_login['id_petugas'];
                $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                $_SESSION['status_login']=true;
                header("location: Home.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');
                location.href='Login.php';</script>";
            }
        }
    }
?>