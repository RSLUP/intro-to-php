<?php
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = getUser($_POST["email"], $_POST["password"]);

    if (isset($user)) {
        session_start();
        $_SESSION["email"] = $user["email"];
        header("Location: home.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

function getUser($email, $password)
{
    // Create connection
    $conn = new mysqli(DB_SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("SELECT * FROM user WHERE user.email = ? AND user.password = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_assoc();
}
