<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Daftar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script> -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
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
        li {
            list-style-type: none;
            margin: 15px 15px 15px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5); 
        }
        a {
            text-decoration: none;
            font-family: Quicksand, sans-serif;
            color: #aeb2b7;
            display: block;
            padding: 19px 0px 18px 5px;
            margin-right: 5px;
            transition: all 200ms;
        }
        a:hover{
            text-decoration: none;
            color: #1abc9c;
        }
        a:visited{
            text-decoration: none;
            color: #fff;
        }
        body {
            background-color: #293949;
        }
        ul {
            margin-top: 10px;
            padding: 0;
        }
        i{
            margin-right: 7px;
        }
    
    </style>

</head>
<body>
    <ul>
        <li class="has_sub"><a href="dashboard.php" target="isi" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span></a></li>
        <li><a href="kategori.php" target="isi" class="waves-effect"><i class="mdi mdi-view-list"></i><span> Category</span></a></li>
        <li><a href="post.php" target="isi" class="waves-effect"><i class="mdi mdi-file"></i>Post</a></li>
        <li><a href="managecomment.php" target="isi" class="waves-effect"><i class="mdi mdi-comment"></i><span> Comment</span></a></li>
        <li><a href="changepas.php" target="isi" class="waves-effect"><i class="mdi mdi-key-change"></i><span>Change Password</span></a></li>
        <li><a href="logout.php" target=_top class="waves-effect"><i class="mdi mdi-logout"></i><span>Logout</span></a></li>
    </ul>
</body>
</html>