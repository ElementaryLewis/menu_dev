<?php

function getMenu($pdo, $date, $midi_soir)
{
    $query = $pdo->prepare('SELECT *
        FROM menu m
        LEFT JOIN aliments a ON m.date = a.date AND m.midi_soir = a.midi_soir
        LEFT JOIN cat_bio b ON m.date = b.date AND m.midi_soir = b.midi_soir
        LEFT JOIN cat_maison t ON m.date = t.date AND m.midi_soir = t.midi_soir
        LEFT JOIN cat_europe e ON m.date = e.date AND m.midi_soir = e.midi_soir
        WHERE m.date=:date AND m.midi_soir=:midi_soir
      ');
    $query->bindValue('date', $date, PDO::PARAM_STR);
    $query->bindValue('midi_soir', $midi_soir, PDO::PARAM_STR);
    $query->execute();
    $menu = $query->fetchAll(PDO::FETCH_ASSOC);

    return $menu;
}

function getDateMenu($pdo)
{
    date_default_timezone_set('Europe/Paris');
    $present = date('Y-m-d');
    $future = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 14, date('Y')));

    $query = $pdo->prepare('SELECT date, midi_soir
        FROM menu
        WHERE date BETWEEN :present AND :future
        ORDER BY date, midi_soir
      ');
    $query->bindValue('present', $present, PDO::PARAM_STR);
    $query->bindValue('future', $future, PDO::PARAM_STR);
    $query->execute();
    $dates = $query->fetchAll(PDO::FETCH_ASSOC);

    return $dates;
}
