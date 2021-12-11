<?php
require __DIR__ . '/../config/db.php';
session_start();

if (isset($_GET["agent_id"])) {
    $stmt = $db->prepare("DELETE FROM agents WHERE id = :id");
    $stmt->execute([
        ":id" => $_GET["agent_id"],
    ]);


    if ($stmt->rowCount() > 0) {
        $_SESSION["success_agents"][] = "Agent başarılı bir şekilde silindi";

        header('Location:/agents.php');
        exit;
    } else {
        $_SESSION["error_agents"][] = "Agent silmede bir hata oluştu";

        header('Location:/agents.php');
        exit;
    }
}

header('Location:/agents.php');
exit;
