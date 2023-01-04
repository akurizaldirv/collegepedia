<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
} 
require '../functions.php';//parameter koneksi, 

if (isset($_POST["submit"]) ){
    
    if (tambah($_POST)>0){
        echo "
        <script>
        alert ('data berhasil di tambahkan');
        document.location.href ='index.php';
        </script>
        ";
    }else{
        echo"
        <script>
        alert ('data gagal di tambahkan');
        </script>
        ";
    }
}
 ?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>kategori</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<style type="text/css">
	html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }
        /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure, 
    footer, header, hgroup, menu, nav, section {
        display: block;
    }
    body {
        line-height: 1;
    }
    ol, ul {
        list-style: none;
    }
    blockquote, q {
        quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
    }


        /* CSS Reset End */
	body{
        font-family: Quicksand, sans-serif;
    }
    h1 {
        margin: 20px 20px 10px 20px;
        font-size: 30px;
        font-family: Arial, Helvetica, sans-serif;
    }
    h2 {
        font-size: 20px;
        margin: 20px 20px 10px 40px;
        font-family: Arial, Helvetica, sans-serif;
    }
    div {
        border: solid 1px grey;
        margin: 20px 20px 10px 40px;
        padding: 20px;
        border-radius: 20px;
    }
    input, textarea, table {
        width: 100%;
    }
	input[type=submit],input[type=reset] {
            font-family: sans-serif;
            font-size: 15px;
            background: #22a4cf;
            color: white;
            border: white 3px solid;
            border-radius: 5px;
            padding: 12px 20px;
            /*margin-top: 10px;*/
            align-items: right;
            width: 250px;
        }
     input[type=submit]:hover, input[type=reset]:hover{
            opacity:0.9;
        }
    .col1 {
        width: 200px;
    }
    .col3 {
        width: 75px;
        text-align: center;
        text-decoration: none;
    }
    tr, td {
        padding: 5px;
    }
    table, tr, td {
        /*border: 1px solid grey;*/
        border: none;
    }
    .tablesetting{
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
        border: 2px solid #35A9DB;
    }
    .tablesetting tr th{
        background-color: #35A9DB;
        color: #fff;
        font-weight: normal;
    }
    .tablesetting, th, td{
        padding : 8px;
        text-align: left;
    }
    .tablesetting tr:hover {
        background-color: #f5f5f5;
    }
 
    .tablesetting tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    h2{
        color: #505458;
        font-size: 20px;
    }
    .tablesetting2{
        border-collapse: collapse;
        width: 100%;
        border: 1px solid#a80024;
    }
    .tablesetting2 tr th{
        background-color: #ff6961;
        color: #fff;
        font-weight: normal;
    }
    .tablesetting2 tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .fas{
        color:blue;
        
    }
    input[type=text], textarea {
        margin-top: 10px;
    }
</style>
<body>
	<h1>Manage Category</h1>
	<form method="POST" action="">
        <h2>Add Category</h2>
        <div>
            <label for="nama">Categori :</label>
            <input type="text" name="nama" id="nama" required="">
            <label for="deskripsi">Category Description :</label>
            <input type="text" name="deskripsi" id="deskripsi" required="">
            <input type="submit" name="submit">
        </div>
    </form>
</body>
</html>

