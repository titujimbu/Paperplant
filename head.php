<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- top bar -->
  <!--  <div class="top-bar">  -->
        <div class="container">
            <div class="row">
<!--<div class="col-md-9">Have you heard?&nbsp;Our new show <strong><em>Scale or Die</em></strong><em> </em>is trending Apple's New &amp; Noteworthy 7 weeks in a row!</div>-->
            </div>
      <!--  </div> -->
    </div>
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-expand-lg navbar-light"> 
        <div class="container"> <a class="navbar-brand js-scroll-trigger" href="index.php">
        <?php
            //session_start();
            if(isset($_SESSION) && !empty($_SESSION["email"]))
              {  
              echo "HELLO , ".strtoupper($_SESSION["firstname"]." ".$_SESSION["lastname"]) ;
              $_SESSION['em']=$_SESSION['email'] ;
              }
              else 
              {
                echo "VKREATE";
              }
        ?>
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#">Intro</a> </li>
                    <!-- <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#service">Services</a> </li> -->
                    <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="index.php#pricing">Pricing</a> </li>
                  <!--  <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="#signup">Sign up</a> </li> -->
                </ul>
            </div> 
                    <?php

                    if (isset($_SESSION) && !empty($_SESSION["email"]))
                    {
                    ?>
        

                    <body>
                    <link href="account/dropdownstyle.css" rel="stylesheet" type="text/css">
                    <div class="dropdown">
                    <img class="dropbtn" src="account/image.svg" width="150%" height="150%">
                    <!--<img src="account/imagedown.png" width="20%" height="20%">-->
                    <!--<button class="dropbtn">Account </button>-->
                    <div class="dropdown-content">
            <!--        <a href="#">Profile</a> -->
                    <a href="editprofile.php">Profile</a>
                    <a href="subscription.php">Subscription</a>
                    <a href="logout.php" onclick="index" > Logout</a>

                    <script type="text/javascript">

                        
                    </script>
                    </div>
                    </div>

                    </body>


                    <?php
                    unset($_SESSION['status']);

                    //echo "<a class=\"btn btn-light bg-light border ml-4\" href=\"login/index.php\">Logout</a>";
                   // session_destroy();
                    }  
                    else 
                    { 
                    echo "<a class=\"btn btn-light bg-light border ml-4\" href=\"signup/signup.php\">Signup</a>";
					echo "<a class=\"btn btn-light bg-light border ml-4\" href=\"login/index.php\">Login </a>" ;
                    }                    
                ?>
        </div>
    </nav>