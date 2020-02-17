


<!DOCTYPE html>
<html>
<head>

<style>


input[type=email],input[type=password],input[type=text] {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  /*border-radius: 4px;*/
  resize: vertical;
  
  border: 1px solid #333;
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: none;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size: 16px;
   color: #000000;
}

input[type=submit],input[type=button]{
  background-image: linear-gradient(45deg,#5489ff,#8e60ff);
  color: white;
  padding: 12px 40px;
  margin: 20px;
  /*margin-right: 100px;*/
  /*align-items: center;*/
  
  border-radius: 4px;
  border: none;
  cursor: pointer;
  float: left;

}

input[type=submit],input[type=button]:hover {
  background-color: #45a049;
}

.container1 {
  border-radius: 5px;
  /*background-color: #f2f2f2;*/
 /* padding: 100px;*/
 padding-top: 10px; 
  padding-bottom: 10px;
  /*padding-right: 20px;*/
  padding-left: 450px;
}

.col-26 {
  float: right;
  width: 20%;
  margin-top: 6px;
  font-size: 16px;
}

.col-76 {
  float: right;
  width: 55%;
  margin-top: 6px;
  font-size: 16px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  height: 10px;
 width: 50%;
}

.photo
{
  padding-left: 50%;
  padding-right: 45%;
  border: 2px;
  width: 20px;
  height: 20px;
  color:black;

}
.commit
{
  padding-right: 300px;
  padding-left: 80.400px;
}





.avatarWrapper {
  position: relative;
  margin: 0 auto;
  width: 258px;
}


.avatar {
  background-color: #edebe1;
  border-radius: 100%;
  height: 216px;
  width: 216px;
  padding: 8px 8px 8px 8px;
  &.active {
    border-radius: 100% 0px  20px 100%;
    background-color: $red;
  }

  .cursor-pointer {
  cursor: pointer;

}
img {
    border-radius: 100%;
    width: 200px;
    margin-left:8px;
  }








/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-26, .col-76, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>


<?php  
try
{
session_start();
if (!isset($_SESSION['email']))
{
  header("location:index.php");
  die;
}
require("head.php");

if(isset($_SESSION['email']))
{
try 
{ 
    require("connection.php");
    $sql = "SELECT id,profilepicture,first_name,last_name,email FROM user_table WHERE email='".$_SESSION['email']."'"; 
    $res = $pdo->query($sql); 
    
    if ($res->rowCount() > 0) 
    { 
    $row = $res->fetch();
    $_SESSION["firstname"]=$row['first_name'];
    $_SESSION["lastname"]=$row['last_name'];
    $_SESSION["email"]=$row['email'];
    $_SESSION["id"]=$row['id'];
    $_SESSION["profilepicture"]=$row['profilepicture'];
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
}

}
catch(Exception $e)
{
  echo $e;
} 
?>  




<div class="avatarWrapper">
<!-- <div class="avatar cursor-pointer"> -->

<!-- <div class="uploadOverlay"><i class="fa fa-cloud-upload"></i></div> -->
<form action="account/updatecheck.php" method="POST" enctype="multipart/form-data">
<img src=<?php if(isset($_SESSION['profilepicture'])){ if($_SESSION['profilepicture']==null){echo "profilepicture/image.svg";} else{echo "".$_SESSION['profilepicture'];}}?> class='avatar cursor-pointer' width='100px' height='100px'>
<input type="file" name="profilepicture" >
<script type="text/javascript">

</script>
</div>
<!-- </div> -->

</div>


<!-- <div class="photo">
  <input type="file" name="file">
</div> -->
<div class="container1">

<?php
           // session_start();
            //print_r($_SESSION);

            if(isset($_SESSION) && !empty($_SESSION["error"])){
              //session_start();
              //echo "hello";
              
              $i=0;
              $error=array();
              $error=$_SESSION["error"]; 
              //print_r($_SESSION);
              //echo $error[i]; 
              $count=sizeof($error);
              echo "<fieldset><legend>Error encountered</legend>";
              while($i<$count)
              {
              global $i;
              $er=$error[$i];
              echo "<style=\"color:red;\">*".$er."</style><br>";
              global $i;
              $i++;
              }
              echo "</fieldset>";
              echo "<br>";
              unset($er);
            //   //session_destroy();
               }
               else
               {
               
               }
          //print_r($_SESSION); 
 
          ?>
  <!-- <form action="account/updatecheck.php" method="POST"> -->
      <p style="color: red;width: 50%" >
      
      <?php 
      //session_start();
      if(!empty($_SESSION["message"]))  
          {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
          }
      
      ?>
        
      </p>
  <div class="row">
    <div class="col-26">
      <label for="fname">First Name</label>
    </div>
    <div class="col-76">
      <input type="text" id="fname" name="firstname" placeholder="Your name.." value="<?php echo $row['first_name']; ?>" readonly><img src="edit-button.svg" height="15%" width="15%" onclick="editfirstname()" >
    </div>
  </div>
<script type="text/javascript">
  function editfirstname()
  {
    document.getElementById("fname").focus();
    document.getElementById("fname").removeAttribute("readonly");
  }
  function editlastname()
  {
    document.getElementById("lname").focus();
    document.getElementById("lname").removeAttribute("readonly");
  }
</script>
  <div class="row">
    <div class="col-26">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-76">
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." value="<?php echo $row['last_name']; ?>" readonly><img src="edit-button.svg" height="15%" width="15%" onclick="editlastname()">
    </div>
  </div>

  <div class="row">
    <div class="col-26">
      <label for="emailid">Email - Id</label>
    </div>
    <div class="col-76">
      <input type="email" id="emailid" name="email" placeholder="Your email id.." value="<?php echo $row['email']; ?>">
      <a href="<?php echo "account/changeemailid.php"; ?>"><img src="edit-button.svg" height="15%" width="15%"></a>
      
    </div>
  </div>
  
  <div class="row">
    <div class="col-26">
      <label for="password">Password</label>
    </div>
    <div class="col-76">
      <input type="password" id="password" name="password" placeholder="*****************" readonly>
      <a href="<?php echo "account/changepassword.php";?>"><img src="edit-button.svg" height="15%" width="15%"></a>
    </div>
  </div>



 <div class="row">
    <div class=commit>
    <input type="submit" value="Save">
    <a href="<?php echo "index.php"; ?>"><input type="button" value="Cancel"></a>
   
    
    </div>
  </div>
  
  </form>

</div>
<?php //die;?>
</body>
</html>




