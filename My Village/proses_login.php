<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>proses</title>
  </head>
  <body>
<?php
		$username=$_POST['nama'];
		$password=$_POST['password'];

if ($username == "") {
  header("location:login.php");
}
else {
  $pdo = new PDO('mysql:host=localhost;dbname=webdesa','root','');
  $exec=$pdo->prepare("SELECT * FROM user WHERE nama = :username AND password = :password");
  $exec->execute([
    'username' => $username,
    'password' => $password
  ]);
  $exec->setFetchMode(PDO::FETCH_ASSOC);
  $data = $exec->fetchAll();
  if (count($data) > 0) {
  $data = $data[0];
  header("location: webdesa.php");
  }else{
    header("location: login.php?error=1");
  }
  exit;

  if ($data=="") {
    header("location:webdesa.php");
  }

  else {
    $query = 'SELECT * from user where password ="'.$password.'"';
    $hasil_p = mysql_query($query);
    $data_p = mysql_fetch_array($hasil);
    $data_p[0];

    if ($data_p=="") {
      header("location:webdesa.php");
    }

    else {
      session_start();
      $_SESSION["user"] = $user;
      header("location:webdesa.php");
    }
  }
  mysql_close($connect);
}

 ?>

  </body>
</html>
