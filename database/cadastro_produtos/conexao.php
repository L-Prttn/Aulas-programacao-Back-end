<?php

$host='127.0.0.1'; //localhost
$port='5432';
$dbname='postgres';
$user='postgres';
$password='postgres';

$conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");



?>