<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  include "applications_db.php";
    session_start();
    $id_job=$_POST["id_job"];
    $applications=get_applications($id_job);
   var_dump($applications);


    ?>


</body>
</html>