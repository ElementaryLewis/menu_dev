<?php

function getPDO($host, $db, $root, $password)
{
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $root, $password);

    return $pdo;
}
