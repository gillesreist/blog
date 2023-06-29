<?php $host = '127.0.0.1';
$db   = 'blog';
$user = 'damabiah';
$pass = '1234';
$port = "3306";
$charset = 'utf8mb4';

$options = [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = "SELECT * FROM authors";
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
    // output data of each row
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "id : " . $row["id"]. " - Pseudo : " . $row["pseudonyme"]. " - Nom : " . $row["firstname"]. " - Prénom : " . $row["surname"]. "<br>";
    }
} else {
    echo "0 results";
}

