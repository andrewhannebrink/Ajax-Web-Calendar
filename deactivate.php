<?php
    session_start();
    require 'databaseAccess.php';

    $stmt = $mysqli->prepare("delete from users where username=?");
    $stmt->bind_param('s', $_SESSION['user']);
    $stmt->execute();
    session_destroy();
    echo "Account deleted.";
    header("Location: index.php?loginErrorWarning=dx");
        exit;
?>