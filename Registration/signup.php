<?php
function get_user(object $pdo, string $email) {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ;
}
if($_SERVER["REQUEST_METHOD"] === "POST")
{
        $name=$_POST["name"];
        $last_name=$_POST["last_name"];
        $user_type=$_POST["user_type"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirm=$_POST["confirm"];

    try {
        
        require_once '../repeated_files/connexion_db.php';
        
        $pdo = connectDB::getInstance();
        session_start();

        $error="";
        if(get_user($pdo,$email)!==false){  
            $error="Email already taken !" ;
            /*echo "<script>alert('This email is already taken'); 
            window.location.href = 'index.php';</script>";
            exit();*/
            /* kif l user yclicki al ok mtaa l alert yaawed yredirectih lel page mtaa registration*/ 
        }
             
        if($error!=""){
           $_SESSION["error_signup"]=$error;
           header("Location: index.php");
            die();
        }
        else{
        $sql = "INSERT INTO users (name, last_name, user_type, email, password) VALUES (:name, :last_name, :user_type, :email, :password)";
        $stmt = $pdo->prepare($sql);

        
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":last_name", $last_name);
        $stmt->bindParam(":user_type", $user_type); 
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPwd);
        
        //echo "SQL Query: $sql<br>";
        $stmt->execute();


        if($_SESSION["user_type"]=='admin')
        {
            echo "<script>alert('User added successfully');
            window.location.href = '../Admin Dashboard/users/index.php';</script>";
        }
        else{
        $user=get_user($pdo,$email);
        $_SESSION["user_id"]=$user["id_user"];
        $_SESSION["user_type"]=$result["user_type"];
        $_SESSION["user_name"]=htmlspecialchars($user["name"]);
        $_SESSION["user_last_name"]=htmlspecialchars($user["last_name"]);

        //header("Location:index.php?registration=success");


        echo "<script>alert('Registered successfully');
         window.location.href = '../homePage/index.php';</script>";}
        exit();

        $pdo=null;
        $stmt=null;
        }
    }catch(PDOException $e)
        {
            error_log("PDOException: " . $e->getMessage());         
        }
    }else{

        header("Location:index.php");
        die();
    }