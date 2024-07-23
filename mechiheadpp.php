<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/kpoly.jpeg">
    <title>Kano State Polytechnic</title>
   <link rel="stylesheet" href="css/mechi.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="nav-items">
                <a class="brand"> <img src="images/kpoly.jpeg"  class="hedd"></a>
                <ul>
                    <li><a href='homepage.php'>Dashoard</a></li>
<!--                    <li><a href='about.php'>About</a></li>-->

                    <!-- Displaying routes depending upon the user session -->
                    <?php
                        if (isset($_SESSION['username'])):
                    ?>
                        <li><a href='teacherslogin.php'>Dashboard</a></li>
                        <li><a href='logout.php'>Log Out</a></li>
                    <?php else: ?>
<!--                        <li><a href='register.php'>Register</a></li>-->
<!--                        <li><a href='login.php'>About us </a></li>-->
                      
    
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </header>
    </body>
</html>
    
    