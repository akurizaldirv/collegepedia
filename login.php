<?php 
session_start();
if(isset($_SESSION["login"])){
    header("Location: admin/index.php");
    exit;
}
require 'functions.php';
if (isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            // set seasion
            $_SESSION["login"] = true; 

            header("Location: admin/index.php");
            exit;
        }
    }

    $error = true;
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Login</title>

    <style>
        .border {
            margin: 170pt 350pt 100pt 350pt;
            /* border: 2pt solid salmon; */
            border: none;
            background-color: lightgray;
            border-radius: 15pt;
            padding: 10pt;
        }
        .uname, .pwd, .bck, .btn {
            margin: 5pt;
            padding: 7pt;
            width: 93%;
            border: none;
            border-radius: 5pt;
            
        }
        table {
            width: 100%;
        }
        .btn {
            background-color: gray;
            color: white;
            font-weight: bold;
            letter-spacing: 3pt;
            font-family: Arial, Helvetica, sans-serif;
        }
        .btn:hover {
            background-color: salmon;
        }
        .bck {
            background-color: grey;
            color: white;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif; 
        }
    </style>

</head>
<body>
    <?php if (isset($error)) :?>
    <p style="color : red; font-style: italic;">username / password salah</p>
<?php endif; ?>
<form method="post" action="">
    <div class="border">
        <table border="0">           
                <tr>
                    <td colspan="2"><input type="text" class="uname" name="username" placeholder="Masukan Username..."></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" class="pwd" name="password" placeholder="Masukan Password..."></td>
                </tr>
                <tr>
                    <td style="width: 50pt;"><a href="index.php" class="bck"><<</a></td>
                    <td><button type="submit" name="login" class="btn">LOGIN</button></td>
                </tr>
            
        </table>
    </div>
</form>
</body>
</html>