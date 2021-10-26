<?

include_once('./db.php');

updateComment($_POST['id'], $_POST['descr']);

header("Location: /?route=guest");