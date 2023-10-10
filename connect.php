<?php
//$pdo=new PDO('mysql:host=localhost;port=3306;dbname=library', 'root', '');

$opttions=[
PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ

];
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=library', 'root', '', $opttions);

?>