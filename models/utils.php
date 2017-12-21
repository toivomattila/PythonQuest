<?php
session_start();
error_log("utils.php says hi");
$db = new PDO('mysql:host=localhost;dbname=PythonQuest;charset=utf8', 'PythonQuest', 'J2CovjA4HyzHGaHd');
$mem = new Memcached();
$mem->addServer("127.0.0.1", 11211) or die("Unable to connect");
