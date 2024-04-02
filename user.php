<?php
function getuserbyID($id,$db){
    $sql=" SELECT * FROM profilechanges WHERE id=?";
    $stmt=$db->prepare($sql);
    $stmt->execute([$id]);
    $user=$stmt->fetch();
    return $user;

}