<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location:index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<?php
//session_start();
require("head.php");
?>
    <!-- Header -->
    <!-- <section class="hero space-md">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <div class="title-content-warpper">
                        <h1>Get our best marketing resources straight to your inbox!</h1>
                    </div>
                    <h4 class="mt-3 mb-3"> Join over 100,000 people who get our Hints & Tips email newsletter.</h4>
                    <?php
                    if (!isset($_SESSION['email']))
                    {
                        echo "<p><a href=\"login/index.php\" class=\"btn btn-lg btn-gradient\" >Signup/login for trial</a></p>";
                        
                    }
                
                     ?>
                     
                </div>
            </div>
        </div>
    </section> -->

    

    <section class="text-center w-90 border-bottom border-left border-right">
        <div class="container">
            <div class="row">
            
        </div>
        <!--end of container-->
    </section>
    <!-- Pricing section -->
    <div class="space-md" id="pricing">
        <div class="container">
           
            <div class="row">
              



 <?php
try
{
    require("connection.php");
    $sql="SELECT plan_id from subscription where user_id=".$_SESSION['id'];
    $rows = $pdo->query($sql); 

    foreach ($rows as $row)
    {
    
    $sql="SELECT name,cost,description from plans where id=".$row['plan_id'];
    $cols = $pdo->query($sql);
        
        echo "<div class=\"col-md-4\">  
                    <div class=\"card pricing-v3 p-md-5 p-sm-3 text-center\">
                        <div class=\"v3-row\">";

        foreach ($cols as $col)
        {

        echo "<p class=\"mb-3\">".$col['name']."</p>";
        echo "<h3 class=\"display-3 font-weight-bold\">$".$col['cost']."</h3></div>"; 
        echo "<div class=\"mt-4\"><p class=\"\">".$col['description']."</p></div></div></div>";
        
        }
        

    }
   
}
catch(Exception $e)
{
    echo $e;
}
?>



            </div>
        </div>
    </div>

    </section> 
    <!-- Footer -->
    <footer class="pt-5 pb-1 bg-dark">
        <div class="container">
            <div class="row">
              

                <div class="col-12">
                    <hr class="my-2">
                </div>
                <div class="col-lg-auto mt-4">
                    <h5 class="mb-4 text-white"><a href="http://www.vkreate.in/">visit vkreate.in</a></h5>
                </div>

                <div class="col-lg-auto ml-lg-auto mt-4"><a class="d-inline-block mb-3 mr-4 text-light" href="#pricing">Pricing</a><a class="d-inline-block mb-3 mr-4 text-light" href="#">About</a>
                    <a class="color-4 mr-4" href="#"></a>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </footer>
    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container"> </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/style.min.js"></script>



<!-- $db    = new MySql();
...
$rows  = $db->query("SELECT * FROM book WHERE chapter='$url' && verse='$verse'");
foreach ($rows as $row)
{
    $summary = $row['text'];
    echo $summary;
}
 -->



</body>

</html>