<?

include_once('../functions.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('./db.php');
    userSign($_POST['login'], $_POST['pass']);
} else {
    session_destroy();
};

header("Location: /");


