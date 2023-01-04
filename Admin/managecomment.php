<?php 
require '../functions.php';//parameter koneksi, 
$komentar = query("SELECT * FROM komentar");


?>

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Manage Comment</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
       form{
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
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
    </style>
    <body>
    	<h1>Manage Comment</h1>
		<form method="POST" action="">
			<h2>Comentar</h2>
        </form>

        <form method="POST" action="">
        	<div>
        		<table class="tablesetting">
	               <tr>
	                   <th>No.</th>
	                   <th>Nama</th>
	                   <th>Email</th>
	                   <th>Comment</th>
	                   <th>Post</th>
                       <th>Date Post</th>
                       <th>Action</th>
	               </tr> 
                   <?php $i = 1; ?>
                        <?php foreach ($komentar as $row) :?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?=$row["Nama"]  ?></td>
                            <td><?=$row["Email"]  ?></td>
                            <td><?=$row["Comment"]  ?></td>
                            <td><?=$row["Post"] ?></td>
                            <td><?=$row["DatePost"]?></td>
                            <td><a href="delComment.php?id=<?= $row["No"] ?>" onclick="return confirm('yakin?')"><img src="img/logoTrash.png" width="20"></td>

                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                </table>



        	</div>

        </form>




    </body>
</head>
</html>