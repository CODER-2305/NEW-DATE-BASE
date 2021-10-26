<?
include_once('./db.php');

$login = $_POST['login'];
$name =  $_POST['name'];
$pass =  $_POST['pass'];
// $imgPath = "../img/avatar/$login.$ext";
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

if ($ext) {
    $imgPath = "./img/avatar/$login.$ext";
}  else {
    $imgPath = "./img/avatar/vcbvcsre.png";
}

move_uploaded_file($_FILES['photo']['tmp_name'], "../img/avatar/$login.$ext");

userReg($login, $name, $pass, $imgPath);

header("Location: /");

?>