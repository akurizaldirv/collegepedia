<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}  

require '../functions.php';//parameter koneksi, 

$jumlah_postingan = hitung_baris("postingan");
$jumlah_kategori = hitung_baris("kategori");
$jumlah_komentar = hitung_baris("komentar");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Daftar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script> -->

    <style>
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
            margin: 20px 20px 30px 30px;
            font-size: 40px;
            font-family: Quicksand, sans-serif;
        }
        .post, .category, .komentar {
            
            border: 1px solid grey;
            margin: 30px 60px 30px 60px;
            padding: 10px;
            border-radius: 20px;
        }
        a {
            text-decoration: none;
            font-size: 20px;
            font-family: Quicksand, sans-serif;
            color: black;
        }

        .jml {
            font-size: 100px;
            margin: 50px 10px 0px 10px;
        }
    </style>
    <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

</head>
<body>
<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="kategori.php">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Listed Categories</p>
                        <h2><?php echo $jumlah_kategori ?><small></small></h2>                    
                    </div>
                </div>
            </div>
            </a>
            <a href="post.php">                       
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-layers widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Listed Post</p>
                        <h2><?php echo $jumlah_postingan ?><small></small></h2>
                    </div>
                </div>
            </div>
            <a href="managecomment.php">                       
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-layers widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Listed Comments</p>
                        <h2><?php echo $jumlah_komentar ?><small></small></h2>
                    </div>
                </div>
            </div>
        </a>
    </a>
</div>
</div>
</div>
</body>
</html>