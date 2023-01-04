<?php 

require 'functions.php';//parameter koneksi, 

// $id = $_GET['id'];
// konfigurasi pagination
$jumlahBeritaPerhalaman = 3;
$jumlahBerita = count(query("SELECT * FROM postingan"));
$jumlahHalaman = ceil($jumlahBerita / $jumlahBeritaPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalBerita = ( $jumlahBeritaPerhalaman * $halamanAktif ) - $jumlahBeritaPerhalaman;

$kategori = query("SELECT * FROM kategori");
$postingan = query("SELECT * FROM postingan ORDER BY id DESC LIMIT $awalBerita, $jumlahBeritaPerhalaman");

$show = query("SELECT * FROM postingan");

if (isset($_POST["cari"])) {
    // // $postingan = cari($_POST["keyword"]);
    $keyword = $_POST['keyword'];
    // $postingan = query("SELECT * FROM postingan WHERE isi LIKE $keyword");
    // var_dump($keyword);
    header("Location: TampilSearch.php?keyword=$keyword");
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
        <form action="" method="post" >
            <ul class="khususul">
                <li><a href="index.php">Home</a></li>
                <li class="dropdownn"><a href="#1" class="dropbtn">Kategori</a>
                    <div class="dropdown-content">
                        <?php foreach ($kategori as $row) :?>
                        <a href="tampilkategori.php?namakategori=<?=$row['namakategori']?>"><?=$row["namakategori"]  ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>                
                <li class="admin"><a href="login.php"><img src="img/user.png" width="25px"></a></li>
                <li class="admin" style="margin-top: 5px;">
                    <button type="submit" name="cari" class="btn btn-secondary">Search</button>
                </li>
                <li class="admin" style="margin-top: 5px;">
                    <input type="text" name="keyword" class="form-control"  placeholder="Search here ..." autofocus placeholder="masukan keyword pencarian" autocomplete="off">        
                </li> 
                
            </ul>
        </form> 

<div class="container">
<div class="content">
      <div class="left" id="left">
        <h3>Sticky Sidebar</h3>
        <ul>
          <li><a class="active" href="javascript:void(0)">Home</a></li>
          <li><a href="javascript:void(0)">News</a></li>
          <li><a href="javascript:void(0)">Contact</a></li>
        </ul>
      </div>

     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
            <?php foreach ($postingan as $row) : ?>
            <div class="card my-4">
                <img class="card-img-top" style="display: block;margin-left: auto;margin-right: auto;width: 70%;" src="admin/img_post/<?= $row['gambar'] ?>" alt="<?= $row['judul']; ?>">
                <div class="card-body">
                    <h2 class="card-title"><?= $row['judul']; ?></h2>
                    <p><b>Category : </b> <a href="tampilkategori.php?namakategori=<?=$row['info_kategori']?>"><?php echo $row  ['info_kategori'];?></a> </p>
                    <p>
                         <?php 
                            $a = $row['isi'];
                            // echo $a;
                            if (strlen($a) > 250) {
                                echo substr($a, 0, 250), " (...)";
                            } else {
                                echo $a;
                            }
                        ?>
                    </p>
                    <a href="tampilpost.php?id=<?=$row['id']?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">Posted on <?php echo $row['waktu'];?></div>
            </div>
          <?php endforeach; ?>
      </div>

        </div>

<!-- bagian pagination -->
    <div>
        <span>Halaman : </span>
        <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
            <?php if($halamanAktif != $i) : ?>
                <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: black;"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>

        <footer>
            @copyright 2020
        </footer>
 
    </div>
 <script>
window.onscroll = function() {myFunction()};

var left = document.getElementById("left");
var sticky = left.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    left.classList.add("sticky")
  } else {
    left.classList.remove("sticky");
  }
}
</script>
</body>
</html>