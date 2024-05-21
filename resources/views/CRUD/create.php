<?php

include 'pdo.php';
$pdo = getPDO($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
$date = $_POST['date'];
$midi_soir = $_POST['midi_soir'];

echo "You shouldn't see this";

if (!empty($_POST)) {
	$errors = [];

	if (!$errors) {

		// Create menus Database
		$query1 = $pdo->prepare(
			'INSERT INTO menus (date, midi_soir,
            entree1, entree2, entree3, entree4, 
            plat1, plat2, plat3, plat4, 
            accomp1, accomp2, accomp3, 
            fromage1, fromage2, fromage3, fromage4, 
            dessert1, dessert2, dessert3, dessert4, 
            fruit1, fruit2,
			ab_entree1, ab_entree2, ab_entree3, ab_entree4, 
            ab_plat1, ab_plat2, ab_plat3, ab_plat4, 
            ab_accomp1, ab_accomp2, ab_accomp3, 
            ab_fromage1, ab_fromage2, ab_fromage3, ab_fromage4, 
            ab_dessert1, ab_dessert2, ab_dessert3, ab_dessert4, 
            ab_fruit1, ab_fruit2,
			toque_entree1, toque_entree2, toque_entree3, toque_entree4, 
            toque_plat1, toque_plat2, toque_plat3, toque_plat4, 
            toque_accomp1, toque_accomp2, toque_accomp3, 
            toque_dessert1, toque_dessert2, toque_dessert3, toque_dessert4,
			europe_fromage1, europe_fromage2, europe_fromage3, europe_fromage4, 
            europe_dessert1, europe_dessert2, europe_dessert3, europe_dessert4, 
            europe_fruit1, europe_fruit2) 
        VALUES (:date, :midi_soir,
            :entree1, :entree2, :entree3, :entree4, 
            :plat1, :plat2, :plat3, :plat4, 
            :accomp1, :accomp2, :accomp3, 
            :fromage1, :fromage2, :fromage3, :fromage4, 
            :dessert1, :dessert2, :dessert3, :dessert4, 
            :fruit1, :fruit2,
			:ab_entree1, :ab_entree2, :ab_entree3, :ab_entree4, 
            :ab_plat1, :ab_plat2, :ab_plat3, :ab_plat4, 
            :ab_accomp1, :ab_accomp2, :ab_accomp3, 
            :ab_fromage1, :ab_fromage2, :ab_fromage3, :ab_fromage4, 
            :ab_dessert1, :ab_dessert2, :ab_dessert3, :ab_dessert4, 
            :ab_fruit1, :ab_fruit2,
			:toque_entree1, :toque_entree2, :toque_entree3, :toque_entree4, 
            :toque_plat1, :toque_plat2, :toque_plat3, :toque_plat4, 
            :toque_accomp1, :toque_accomp2, :toque_accomp3, 
            :toque_dessert1, :toque_dessert2, :toque_dessert3, :toque_dessert4,
			:europe_fromage1, :europe_fromage2, :europe_fromage3, :europe_fromage4, 
            :europe_dessert1, :europe_dessert2, :europe_dessert3, :europe_dessert4, 
            :europe_fruit1, :europe_fruit2)'
		);
		$query1->bindValue('date', $date, PDO::PARAM_STR);
		$query1->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
		$query1->bindValue('entree1', $_POST['entree1'], PDO::PARAM_STR);
		$query1->bindValue('entree2', $_POST['entree2'], PDO::PARAM_STR);
		$query1->bindValue('entree3', $_POST['entree3'], PDO::PARAM_STR);
		$query1->bindValue('entree4', $_POST['entree4'], PDO::PARAM_STR);
		$query1->bindValue('plat1', $_POST['plat1'], PDO::PARAM_STR);
		$query1->bindValue('plat2', $_POST['plat2'], PDO::PARAM_STR);
		$query1->bindValue('plat3', $_POST['plat3'], PDO::PARAM_STR);
		$query1->bindValue('plat4', $_POST['plat4'], PDO::PARAM_STR);
		$query1->bindValue('accomp1', $_POST['accomp1'], PDO::PARAM_STR);
		$query1->bindValue('accomp2', $_POST['accomp2'], PDO::PARAM_STR);
		$query1->bindValue('accomp3', $_POST['accomp3'], PDO::PARAM_STR);
		$query1->bindValue('fromage1', $_POST['fromage1'], PDO::PARAM_STR);
		$query1->bindValue('fromage2', $_POST['fromage2'], PDO::PARAM_STR);
		$query1->bindValue('fromage3', $_POST['fromage3'], PDO::PARAM_STR);
		$query1->bindValue('fromage4', $_POST['fromage4'], PDO::PARAM_STR);
		$query1->bindValue('dessert1', $_POST['dessert1'], PDO::PARAM_STR);
		$query1->bindValue('dessert2', $_POST['dessert2'], PDO::PARAM_STR);
		$query1->bindValue('dessert3', $_POST['dessert3'], PDO::PARAM_STR);
		$query1->bindValue('dessert4', $_POST['dessert4'], PDO::PARAM_STR);
		$query1->bindValue('fruit1', $_POST['fruit1'], PDO::PARAM_STR);
		$query1->bindValue('fruit2', $_POST['fruit2'], PDO::PARAM_STR);
		$query1->bindValue('ab_entree1', $_POST['ab_entree1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_entree2', $_POST['ab_entree2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_entree3', $_POST['ab_entree3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_entree4', $_POST['ab_entree4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_plat1', $_POST['ab_plat1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_plat2', $_POST['ab_plat2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_plat3', $_POST['ab_plat3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_plat4', $_POST['ab_plat4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_accomp1', $_POST['ab_accomp1'] ?? 0, PDO::PARAM_STR);
		$query1->bindValue('ab_accomp2', $_POST['ab_accomp2'] ?? 0, PDO::PARAM_STR);
		$query1->bindValue('ab_accomp3', $_POST['ab_accomp3'] ?? 0, PDO::PARAM_STR);
		$query1->bindValue('ab_fromage1', $_POST['ab_fromage1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_fromage2', $_POST['ab_fromage2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_fromage3', $_POST['ab_fromage3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_fromage4', $_POST['ab_fromage4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_dessert1', $_POST['ab_dessert1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_dessert2', $_POST['ab_dessert2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_dessert3', $_POST['ab_dessert3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_dessert4', $_POST['ab_dessert4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_fruit1', $_POST['ab_fruit1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('ab_fruit2', $_POST['ab_fruit2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_entree1', $_POST['toque_entree1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_entree2', $_POST['toque_entree2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_entree3', $_POST['toque_entree3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_entree4', $_POST['toque_entree4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_plat1', $_POST['toque_plat1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_plat2', $_POST['toque_plat2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_plat3', $_POST['toque_plat3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_plat4', $_POST['toque_plat4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_accomp1', $_POST['toque_accomp1'] ?? 0, PDO::PARAM_STR);
		$query1->bindValue('toque_accomp2', $_POST['toque_accomp2'] ?? 0, PDO::PARAM_STR);
		$query1->bindValue('toque_accomp3', $_POST['toque_accomp3'] ?? 0, PDO::PARAM_STR);
		$query1->bindValue('toque_dessert1', $_POST['toque_dessert1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_dessert2', $_POST['toque_dessert2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_dessert3', $_POST['toque_dessert3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('toque_dessert4', $_POST['toque_dessert4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_fromage1', $_POST['europe_fromage1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_fromage2', $_POST['europe_fromage2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_fromage3', $_POST['europe_fromage3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_fromage4', $_POST['europe_fromage4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_dessert1', $_POST['europe_dessert1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_dessert2', $_POST['europe_dessert2'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_dessert3', $_POST['europe_dessert3'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_dessert4', $_POST['europe_dessert4'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_fruit1', $_POST['europe_fruit1'] ?? 0, PDO::PARAM_INT);
		$query1->bindValue('europe_fruit2', $_POST['europe_fruit2'] ?? 0, PDO::PARAM_INT);
		$query1->execute();
	}
}
