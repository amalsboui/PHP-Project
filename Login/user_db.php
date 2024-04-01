<?php

/*ken chena7iw fazet l verification mtaa name w last name lezemhom unique nwaliw n identifiw l user bel 
email el haja l unique donc l function hedhi tetbadal twali tejbed m db bel $email */ 

function get_user(object $pdo,string $name,string $last_name)
{
    $query="SELECT * FROM users WHERE name = :name AND last_name = :last_name;";
    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":last_name",$last_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}