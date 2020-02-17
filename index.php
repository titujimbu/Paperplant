
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
session_start();
require("head.php");
?>
    <!-- Header -->
    <section class="hero space-md">
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
    </section>

    

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
 $i=1;   

function printResultSet(&$rowset, $i)
{  
  $key=0; 
    foreach ($rowset as $row) 
    {   
         $count=1;
        echo "<div class=\"col-md-4\">  
                    <div class=\"card pricing-v3 p-md-5 p-sm-3 text-center\">
                        <div class=\"v3-row\">";

                         //<a href=\"plandetail.php?id=".$key."\">

       foreach ($row as $col) 
       {    
            if($count==1)
            {
                echo "<p class=\"mb-3\">".$col."</p>";
                $count++;
                continue;
            }
            if($count==2)
            {
                echo "<h3 class=\"display-3 font-weight-bold\">$".$col."</h3></div>"; 
                $count++;
            // echo "<a class=\"btn btn-outline-primary\" href=\"#\">Start Free Trial</a>";
                continue;
            }
            if($count==3)
            {
                if(isset($_SESSION['email']))
                {
                echo "<a class=\"btn btn-outline-primary\" href=\"planinfo.php?id=".$col."\">Start Free Trial</a>";
                // echo "<a class=\"btn btn-outline-primary\" href=\"planinfo.php?id=".$col."\">Details</a>";
                }
                if(!isset($_SESSION['email']))
                {
                echo "<a class=\"btn btn-outline-primary\" href=\"login/index.php\">Start Free Trial</a>";  
                }
                $count++;
                //$key=$col;
                continue;
            }
            if($count==4)
            {
                echo "<div class=\"mt-4\"><p class=\"\">".$col."</p></div></div></div>";
                continue;
            }
       }
       //echo "</a>";
    
    }
}

try
{
  //  $i=0;
    require("connection.php");
    $sql="SELECT name,cost,id,description from plans where status=1";
    $stmt = $pdo->query($sql); 

    do
    {
        $rowset = $stmt->fetchAll(PDO::FETCH_NUM);
        
        if ($rowset) 
        {
        printResultSet($rowset, $i);
        //echo $i;
        }
        $i++;

    }
    while ($stmt->nextRowset());

}   
catch(Exception $e)
{
    echo $e;
}
?>



            </div>
        </div>
    </div>

    <!-- </section>  -->
    <!-- Footer -->
    <footer class="pt-5 pb-1 bg-dark">
        <div class="container">
            <div class="row">
              

                <div class="col-12">
                    <hr class="my-2">
                </div>
                <div class="col-lg-auto mt-4">
                    <h5 class="mb-4 text-white"><a href="http://www.github.com/rounaksarda/dev-evengersproject">Visit my site</a></h5>
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
</body>

</html>