<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
} 
require '../functions.php';
$id = $_GET["id"];

if (restoreTempPost($id)>0){
    echo "
        <script>
        alert ('data berhasil dipulihkan');
        document.location.href ='post.php';
        </script>
        ";
} else{
    echo "
        <script>
        alert ('data gagal dipulihkan');
        document.location.href ='post.php';
        </script>
        ";
}
 ?>
