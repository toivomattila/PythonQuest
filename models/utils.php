<?php
session_start();
//Connect to db
$db = new PDO('mysql:host=localhost;dbname=PythonQuest;charset=utf8', 'PythonQuest', 'J2CovjA4HyzHGaHd');
//Connect to memcached
$mem = new Memcached();
$mem->addServer("127.0.0.1", 11211) or die("Unable to connect");
