<?php 
if(isset($_POST["submit"])) {
    $cv=$_FILES['cv'];
    var_dump($cv);
    $tmpExtension=explode('.',$cv['name']);
    $extension=strtolower(end($tmpExtension));
    if($cv['error']===0){
    if($extension=='pdf'){
        
        if ($cv['size']<15000000){
            $suffix=$_POST["suffix"];
            move_uploaded_file($cv['tmp_name'],"../cvs/cv".$suffix.$extension);
            header("./index.php");
        }
        else{
            echo'file too big';}

        }
    else{
        echo'please upload a pdf file';
    }


}}