<?php

include 'pdo.php';
$pdo = getPDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
$date = $_POST['date'];
$midi_soir = $_POST['midi_soir'];

$query1 = $pdo->prepare('DELETE FROM menu 
WHERE date=:date AND midi_soir=:midi_soir 
');
$query1->bindValue('date', $date, PDO::PARAM_STR);
$query1->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
$query1->execute();

$query2 = $pdo->prepare('DELETE FROM aliments
WHERE date=:date AND midi_soir=:midi_soir 
');
$query2->bindValue('date', $date, PDO::PARAM_STR);
$query2->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
$query2->execute();

$query3 = $pdo->prepare('DELETE FROM cat_bio
WHERE date=:date AND midi_soir=:midi_soir 
');
$query3->bindValue('date', $date, PDO::PARAM_STR);
$query3->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
$query3->execute();

$query4 = $pdo->prepare('DELETE FROM cat_maison
WHERE date=:date AND midi_soir=:midi_soir 
');
$query4->bindValue('date', $date, PDO::PARAM_STR);
$query4->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
$query4->execute();

$query5 = $pdo->prepare('DELETE FROM cat_europe
WHERE date=:date AND midi_soir=:midi_soir 
');
$query5->bindValue('date', $date, PDO::PARAM_STR);
$query5->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
$query5->execute();

header('Location: /?menu=deleted');
