<?php 
$conn = mysqli_connect("localhost", "root", "", "collegepedia");

function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function hitung_baris($tabel) {
	global $conn;
	$string = "SELECT * FROM $tabel";
	$result = mysqli_query($conn, $string);
	return mysqli_num_rows($result);
}

function tambah($data){
	global $conn;
	$nama =  htmlspecialchars($data["nama"]);
	$deskripsi =  htmlspecialchars($data["deskripsi"]);

	//querry insert data
	$query = "INSERT INTO kategori (id, namakategori, deskripsi) VALUES ('', '$nama', '$deskripsi')"; 

	$deleted = query("SELECT * FROM kategori WHERE id = $id")[0];

	$namakategori = $deleted['namakategori'];
	$deskripsi = $deleted['deskripsi'];
	$tanggalpost = $deleted['tanggalpost'];

	mysqli_query($conn, "INSERT INTO tempkategori VALUES ('', '$namakategori', '$deskripsi', '$tanggalpost')");

	mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data){
	global $conn;
	$id = $data["id"];
	$nama =  htmlspecialchars($data["nama"]);
	$deskripsi =  htmlspecialchars($data["deskripsi"]);

	//querry insert data
	$query = "UPDATE kategori SET namakategori = '$nama', deskripsi = '$deskripsi'  WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;

	$id = $_GET['id'];

	$deleted = query("SELECT * FROM kategori WHERE id = $id")[0];
	$namakategori = $deleted['namakategori'];
	$deskripsi = $deleted['deskripsi'];
	$tanggal = $deleted['tanggalpost'];

	mysqli_query($conn, "INSERT INTO tempkategori VALUES ('', '$namakategori', '$deskripsi', '$tanggal')");

	mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM postingan WHERE judul LIKE '%$keyword%' OR isi LIKE '%$keyword%";
	return query($query);
}


function delTempKategori($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM tempkategori WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function regristrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek usernmae udh ada
	$result =mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)){
		echo "<script>
		alert('username sudah terdaftar')
		</script>";
		return false;
	}


	// cek konfirmasi password
	if ($password !== $password2){
		echo "<script>
		alert('konfirmasi password tidak sesuai!')
		</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);


}

function ubahpas($data){
	global $conn;
	$oldpas = $data["passwordlama"];
	$newpas = $data["password"];
	$newpas2 = $data["password2"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE id = 'admin'");
	$row = mysqli_fetch_assoc($result);
	
	if (password_verify($oldpas, $row['password'])) {
		if ($newpas != $newpas2) {
			echo "<script>
				alert('konfirmasi password tidak Sesuai!')
				</script>
				";
			return false;
		}
	} else {
		echo "<script>
			alert('recent password tidak sesuai!')
			</script>
			";
		return false;
	}
	
	
	// if ($newpas != $newpas2) {
	// 		echo "<script>
	// 			alert('konfirmasi password tidak sesuai!')
	// 			</script>
	// 			";
	// 		return false;
	// 	}

	$newpas = password_hash($newpas, PASSWORD_DEFAULT);

	mysqli_query($conn, "UPDATE user SET password = '$newpas' WHERE id = 'admin'");

	return mysqli_affected_rows($conn);
	
}


function restoreTempKategori($id){
	global $conn;

	$id = $_GET['id'];

	$deleted = query("SELECT * FROM tempkategori WHERE id = $id")[0];

	$namakategori = $deleted['namakategori'];
	$deskripsi = $deleted['deskripsi'];
	$tanggalpost = $deleted['tanggalpost'];

	mysqli_query($conn, "INSERT INTO kategori VALUES ('', '$namakategori', '$deskripsi', '$tanggalpost')");

	mysqli_query($conn, "DELETE FROM tempkategori WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function addPost($data){
	global $conn;
	$judul =  $data["judul"];
	$isi =  $data["ckeditor"];
	$info_kategori = ($data["info_kategori"]);

	// upload gambar
	$gambar = upload();
	if (!$gambar){
		return false;
	}

	//querry insert data
	$query = "INSERT INTO postingan (id, judul, isi, info_kategori, gambar) VALUES ('', '$judul', '$isi', '$info_kategori', '$gambar')";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}



function upload(){
	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];	

	// cek apaakadah  ada gambar yg di upload
	if ($error === 4){
		echo "<script>
				alert('pilih gambar terlebih dahulu');
				</script>
				";
	}
	// cek apakah yang di uypload gambar
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if (!in_array($ekstensigambar, $ekstensigambarvalid)){
		echo "<script>
				alert('yang anda upload bukan gambar');
				</script>
				";
		return false;
	}

	// cek ukuran gambar 
	if ($ukuranfile > 1000000){
		echo "<script>
				alert('ukuran gambar terlalu besar');
				</script>
				";
		return false;
	}
	// generate nama file
	$namafilebaru = uniqid();
	$namafilebaru .=  '.';
	$namafilebaru .= $ekstensigambar;
	// lolos pengecekan semua
	move_uploaded_file($tmpname, 'img_post/' . $namafilebaru);

	return $namafilebaru;


}





function delPost($id){
	global $conn;

	$id = $_GET['id'];

	$deleted = query("SELECT * FROM postingan WHERE id = $id")[0];
	$judul = $deleted['judul'];
	$isi = $deleted['isi'];
	$info_kategori = $deleted['info_kategori'];
	$gambar = $deleted['gambar'];
	$waktu = $deleted['waktu'];

	mysqli_query($conn, "INSERT INTO temppost VALUES ('', '$judul', '$isi', '$info_kategori', '$gambar', '$waktu')");

	mysqli_query($conn, "DELETE FROM postingan WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function editPost($data){
	global $conn;

	$id = $data["id"];
	$judul =  htmlspecialchars($data["judul"]);
	$isi =  htmlspecialchars($data["isi"]);
	$info_kategori = htmlspecialchars($data["info_kategori"]);
	
	$gambar = upload();
	if (!$gambar){
		return false;
	}

	//querry insert data
	$query = "UPDATE postingan SET judul = '$judul', isi = '$isi', info_kategori = '$info_kategori', gambar = '$gambar'  WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function delTempPost($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM temppost WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function restoreTempPost($id){
	global $conn;

	$id = $_GET['id'];

	$deleted = query("SELECT * FROM temppost WHERE id = $id")[0];

	$judul = $deleted['judul'];
	$isi = $deleted['isi'];
	$info_kategori = $deleted['info_kategori'];
	$gambar = $deleted['gambar'];
	$waktu = $deleted['waktu'];

	mysqli_query($conn, "INSERT INTO postingan VALUES ('', '$judul', '$isi', '$info_kategori', '$gambar', '$waktu')");

	mysqli_query($conn, "DELETE FROM temppost WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function addKomen($data, $idComment){
	global $conn;
	$Nama =  htmlspecialchars($data["Nama"]);
	$Email =  htmlspecialchars($data["Email"]);
	$Comment = htmlspecialchars($data["Comment"]);
	$Post= htmlspecialchars($idComment);




	//querry insert data
	$query = "INSERT INTO komentar (No, Nama, Email, Comment,Post) VALUES ('', '$Nama', '$Email', '$Comment','$idComment')";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}
function delComment($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM komentar WHERE No = $id");

	return mysqli_affected_rows($conn);
}


?>