<?
 function pdo() {
     $dbname = 'db_guruh';
     $dbuser = 'root';
     $pass = '';
     $host = 'localhost';

return new PDO("mysql:host=$host; dbname=$dbname",$dbuser,$pass);
}
//  structured query language = SQL
function userReg($login, $name, $pass, $photo){
    
    $pdo = pdo();
    
    $name = htmlspecialchars($name);
    $login = htmlspecialchars($login);
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (login, name, pass, photo) VALUES (?,?,?,?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$login,$name,$pass,$photo]);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}


function userSign($login, $pass) {
    $pdo = pdo();

    $query = "SELECT * FROM users WHERE login = ?";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$login]);
    $user = $driver->fetch(PDO::FETCH_ASSOC);

    if ($user['login'] == $login && password_verify($pass, $user['pass'])) {
        $_SESSION['login'] = $user['login'];
        $_SESSION['photo'] = $user['photo'];
        
        return true;
    } else {
        return false;

    }
}

function getComment(){
    $pdo = pdo();

    $query = "SELECT * FROM comments";
    $driver = $pdo->prepare($query);
    $result = $driver->execute();
    $comments = $driver->fetchAll(PDO::FETCH_ASSOC);

    return $comments;
}

function writeComment($login, $photo, $text){
    $pdo = pdo();
    
    $query = "INSERT INTO comments (`login`, `photo`, `comment`) VALUES (?,?,?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$login,$photo,$text]);

    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $result;
}

function olComment($id) {
    $pdo = pdo();
    $query = "SELECT comment FROM comments WHERE id=(?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$id]);
    $comment = $driver->fetch(PDO::FETCH_ASSOC);
    if ($driver->errorInfo()[0] != '00000') {
        var_dump($driver->errorInfo());
    }
    return $comment;
}

// bugungi codelar

function updateComment($id, $comment){
 $pdo = pdo();
 $query = "UPDATE comments SET comment = '$comment' WHERE id=(?)";
 $driver = $pdo->prepare($query);
 $result = $driver->execute([$id]);


 if ($driver->errorInfo()[0] != '00000') {
    var_dump($driver->errorInfo());
}

return $result;

}
?>