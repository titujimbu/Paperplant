<?php

try 
{ 
   require("connection.php");
    $sql = "SELECT remember_tocken FROM user_table"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
     
        while ($row = $res->fetch()) { 
            echo "hello";
            //  echo "".$row['remember_tocken'].""; 
            if ( $_GET['remember_tocken']==$row['remember_tocken'])
            {
                $sql = "UPDATE user_table SET status=1, remember_tocken=null WHERE remember_tocken='".$_GET['remember_tocken']."'"; 
                $pdo->exec($sql); 
                session_start();
                $_SESSION["verified"]="You are successfully verified your account ! Now you can login." ;
                header("location:login/index.php");
            }
        } 
        unset($res); 
    } 
    else 
    { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e)
{ 
    die("ERROR: Could not able to execute $sql. " .$e->getMessage()); 
} 
unset($pdo); 
?> 



