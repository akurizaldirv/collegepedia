<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
} 

require '../functions.php';
$id = $_GET["id"];

if (restoreTempKategori($id)>0){
    echo "
        <script>
        alert ('data berhasil dipulihkan');
        document.location.href ='kategori.php';
        </script>
        ";
} else{
    echo "
        <script>
        alert ('data gagal dipulihkan');
        document.location.href ='kategori.php';
        </script>
        ";
}
 ?>
