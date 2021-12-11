<?php

require __DIR__ . '/../config/db.php';
session_start();

if (
    isset($_POST['agentAdd']) &&
    !empty($_POST['agentName']) &&
    !empty($_POST['agentNumber']) &&
    !empty($_POST['agentPassword']) &&
    !empty($_POST['agentEmail'])
) {

    if (empty($_FILES['agentImage']['name'])) {
        $fileImage =  "no-image.png";
    } else {
        $fileImage =  $_FILES['agentImage']['name'];
    }

    if ($_POST['agentPopup'] == 'on') {
        $_POST['agentPopup'] = "1";
    } else {
        $_POST['agentPopup'] = "0";
    }


    $stmt = $db->prepare("INSERT INTO agents (name, image, number, password, email, popup) VALUES ( :agentName , :agentImage , :agentNumber , :agentPassword , :agentEmail , :agentPopup)");
    $stmt->execute([
        ":agentImage" => $fileImage,
        ":agentName" => $_POST['agentName'],
        ":agentNumber" => $_POST['agentNumber'],
        ":agentPassword" => $_POST['agentPassword'],
        ":agentEmail" => $_POST['agentEmail'],
        ":agentPopup" => $_POST['agentPopup']
    ]);
    $_SESSION["success_agents"][] = "Kullanıcı ekleme işi başarılı oldu";

    header('Location:/agents.php');

    exit;
} else {
    $_SESSION["error_agents"][] = "Kullanıcı ekleme işi başarısız oldu. Eksik alan girmeyiniz.";
}

header('Location:/agents.php');
exit;
