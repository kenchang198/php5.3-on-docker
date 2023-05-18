<?php

// host サービス名
define('DSN', 'mysql:host=db;port=3306;dbname=prefecture;');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');

try {
    $db = new PDO(
        'mysql:host=db;port=3306;dbname=prefecture;',
        'root',
        'password',
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`"
        )
    );

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

$stmt = $db->query("SELECT * FROM prefectures ORDER BY id ASC");
$prefectures = $stmt->fetchAll(PDO::FETCH_ASSOC);

function escape($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>docker-compose example</title>
</head>
<body>
    <p>docker-compose example</p>
    <ul>
    <?php foreach ($prefectures as $prefecture) : ?>
        <li><?= escape($prefecture['name']); ?></li>
    <?php endforeach; ?>
    </ul>
</body>

</html>