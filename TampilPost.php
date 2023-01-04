<?php 

require 'functions.php';//parameter koneksi, 

$id = $_GET['id'];

$kategori = query("SELECT * FROM kategori");
$postingan = query("SELECT * FROM postingan");

$show = query("SELECT * FROM postingan WHERE id = $id")[0];

$komentar = query("SELECT * FROM komentar WHERE post = $id");

if (isset($_POST["cari"])) {
    // // $postingan = cari($_POST["keyword"]);
    $keyword = $_POST['keyword'];
    // $postingan = query("SELECT * FROM postingan WHERE isi LIKE $keyword");
    // var_dump($keyword);
    header("Location: TampilSearch.php?keyword=$keyword");
}

if (isset($_POST["submit"]) ){
    
    if (addKomen($_POST, $id)>0){
        echo"
        <script>
        alert ('data berhasil di tambahkan');
        window.location.href ='tampilpost.php?id=$id';
        </script>
        ";
    }else{
        echo"
        <script>
        alert ('data gagal di tambahkan');
        window.location.href ='tampilpost.php?id=$id';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title>CollegePedia</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: gainsboro;">
    <div class="badan-utama">
        <header>
            <img class="navbar-brand" src="img/logo.png" class="logo" width="300px">
        </header>
        <form action="" method="post">
            <ul class="khususul">
                <li><a href="index.php">Home</a></li>
                <li class="dropdownn"><a href="#1" class="dropbtn">Kategori</a>
                    <div class="dropdown-content">
                        <?php foreach ($kategori as $row) :?>
                        <a href="tampilkategori.php?namakategori=<?=$row['namakategori']?>"><?=$row["namakategori"]  ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="admin"><a class="khususa" href="login.php"><img src="img/user.png" width="25px"></a></li>
                <li class="admin" style="margin-top: 5px;">
                    <button type="submit" name="cari" class="btn btn-secondary">Search</button>
                </li>
                <li class="admin" style="margin-top: 5px;">
                        <input type="text" name="keyword" class="form-control"placeholder="Search here ..." autofocus placeholder="masukan keyword pencarian" autocomplete="off">        
                </li>  
            </ul>
        </form>
        <div class="card my-4">
            <div class="card-body">
                <h2 class="card-title"><?php echo $show['judul'];?></h2>
                <b>Tanggal Post: </b><?php echo $show['waktu'];?>
                </p>
                <img class="img-fluid rounded" style="display: block;margin-left: auto;margin-right: auto;width: 50%;" src="admin/img_post/<?= $show['gambar'] ?>">
                <p class="card-text"><?php echo $show['isi'];?></p>
            </div>
            <div class="card-footer text-muted"></div>  
        </div>
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form name="Comment" method="post">
                        <div class="form-group">
                            <input type="text" name="Nama" class="form-control" placeholder="Enter your fullname" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="Email" class="form-control" placeholder="Enter your Valid email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="Comment" rows="3" placeholder="Comment" required></textarea>
                        </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>

        <div>
        <?php $i = 1; ?>
            <?php foreach ($komentar as $row) :?>
            <p>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="img/usericon.png" alt="">
                    <div class="media-body">
                        <h5 class="mt-0"><?=$row["Nama"]  ?><br>
                        <span style="font-size:11px;"><?=$row["Email"]  ?></span></h5>
                       <?=$row["Comment"]  ?>
                   </div>
                </div>
           <?php $i++; ?>
           <?php endforeach; ?>
           </p>
        </div>
        <footer>
            @copyright 2020
        </footer>
 
    </div>
</body>
</html>