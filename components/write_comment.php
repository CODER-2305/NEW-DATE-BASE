<?

include_once('../functions.php');
include_once('./db.php');

$login = $_SESSION['login'];
$photo = $_SESSION['photo'];
$text = $_POST['descr'];

writeComment($login, $photo, $text);
header("Location: /?route=guest");