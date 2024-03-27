<?php
declare(strict_types=1);
function get_user(object $pdo,string $name,string $last_name)
{
    $query="SELECT *FROM users WHERE name = :name AND last_name = :last_name;";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":last_name",$last_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}