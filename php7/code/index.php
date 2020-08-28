<?php

$dsn = 'mysql:host=db;port=3306'; // host=db,这里的db其实是mysql的服务名
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    print_r($dbh);
} catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
}
$redis = new Redis();
$redis->pconnect('redis', 6379);

$key = 'first';
$redis->incr($key);

echo '页面浏览了：'.$redis->get($key); 
echo phpinfo();
