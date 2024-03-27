<?php
declare(strict_types=1);
function is_input_empty(string $name,string $last_name,string $password)
{
    if (empty($name)||empty($last_name)||empty($password)) {
        return true;
    }
    else{
        return false;
    }
}
function isEmailTaken(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result !== false;
}
function isNameandlastNameTaken(object $pdo, string $name, string $last_name)
{
    $query = "SELECT name FROM users WHERE name = :name AND last_name=last_name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name",$name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result !== false;
}