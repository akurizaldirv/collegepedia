<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: ../index.php");
exit;

 ?>


<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Daftar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'> -->
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script> -->

    <!-- <style>
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
        table, tr, td {
            border: none;
        }
        input, table {
            width: 100%;
        }
        tr, td {
            padding: 5px;
            border: none;
        }
        input[type=submit]{
            font-family: sans-serif;
            font-size: 15px;
            background: #22a4cf;
            color: white;
            border: white 3px solid;
            border-radius: 5px;
            padding: 12px 20px;
            margin-top: 10px;
            width: 250px;
        }
        input[type=submit]:hover{
            opacity:0.9;
        }
    </style>

</head>
<body>
     <script type="text/javascript">
        var confirmLogout = confirm("You will logout from admin page, are you sure?");
        
        if (confirmLogout == true) {
            window.location.replace("../index.php");
        } else {
            window.location.href = "index.php";
        }

     </script>
</body>
</html> -->