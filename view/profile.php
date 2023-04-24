<?php

/*-----------------------------------*/

$go_out = false;

if (!empty($_SESSION['user_id'])) {

    $params = [
        $_SESSION['user_id']
    ];

    // get user
    $connect = connect();
    $request = $connect->prepare("SELECT * FROM user WHERE id = ?");
    $request->execute($params);
    $user = $request->fetchObject();

    if (!is_object($user)) {
        $go_out = true;
    }
} else {
    $go_out = true;
}

if ($go_out) {
    header('Location: index.php?view=view/login');
    die;
}



$output = '<br><h2>Profil:</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Intitulé</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>';

if (!empty($user)) {
    foreach ($user as $key => $value) {
        if ($key == 'country' && !empty($value)) {
            $value = getCountry($value);
        } elseif ($key == 'pwd') {
            continue;
        }
        $output .= '<tr><th scope="col">' . $key . '</th><td>' . $value . '</td></tr>';
    }
}
$output .= '</tbody></table>';

echo $output;