<?php

function getPDO($db, $root, $password)
{
    $pdo = new PDO('mysql:host=localhost;dbname=' . $db, $root, $password);
    return $pdo;
}