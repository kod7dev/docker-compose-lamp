<?php

require __DIR__ . '/../config/db.php';
session_start();


if (
    isset($_POST['agentEdit']) &&
    !empty($_POST['agentName']) &&
    !empty($_POST['agentNumber']) &&
    !empty($_POST['agentPassword']) &&
    !empty($_POST['agentEmail'])
) {
    var_dump($_POST);

    if (empty($_FILES['agentImage']['name'])) {
        $fileImage =  "no-image.png";
    } else {
        $fileImage =  "no-image-edit.png";
    }

    if ($_POST['agentPopup'] == 'on') {
        $_POST['agentPopup'] = "1";
    } else {
        $_POST['agentPopup'] = "0";
    }


    $stmt = $db->prepare("UPDATE agents SET name = :agentName, image = :agentImage, number = :agentNumber, password = :agentPassword, email = :agentEmail, popup = :agentPopup WHERE id = :userId");
    $stmt->execute([
        ":agentImage" => $fileImage,
        ":agentName" => $_POST['agentName'],
        ":agentNumber" => $_POST['agentNumber'],
        ":agentPassword" => $_POST['agentPassword'],
        ":agentEmail" => $_POST['agentEmail'],
        ":agentPopup" => $_POST['agentPopup'],
        ":userId" => $_POST['agentId']
    ]);

    header('Location:/agents.php');

    exit;
} else {
    $_SESSION["error_agents"][] = "Kullanıcı güncelleme işi başarısız oldu.";
}

header('Location:/agents.php');
exit;
