<?php
// データベースの接続情報
define('DB_USER',   'Keisuke Okuma');      // MySQLのユーザ名（マイページのアカウント情報を参照）
define('DB_PASSWD', 'selfex626');    // MySQLのパスワード（マイページのアカウント情報を参
define('DB_NAME', 'self-ex'); // MySQLのDB名(このコースではMySQLのユーザ名と同じで
define('DB_CHARSET', 'SET NAMES utf8');  // MySQLのcharset
if($_SERVER['SERVER_ADDR'] === '118.27.4.157'){
    $host = 'localhost';
}elseif($_SERVER['SERVER_ADDR'] === '172.18.0.4'){
    $host = 'mysql';
}
// define('DSN', 'mysql:dbname='.DB_NAME.';host='.print $host.';port=3306;charset=utf8');
define('DSN', 'mysql:dbname='.DB_NAME.";host=$host;port=3306;charset=utf8");  // データベースのDSN情報