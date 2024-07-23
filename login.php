<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for login post data
    if (isset($_POST['login'])) {
        $regno = $_POST['Regno'];
        $password = $_POST['password'];

        if ($regno != '' && $password != '') {
            $passwd = sha1($password);

            $sql = "SELECT * FROM users WHERE Regno = '$regno' AND password = '$passwd'";
            $result = mysqli_query($conn, $sql) or die('Error');

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $regno = $row['Regno'];
                    $password = $row['password'];

                    // Create session id's for the database values
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['Regno'] = $regno;
                    $_SESSION['password'] = $password;

                    header('Location:dashboard.php');
                }
            }
            else {
                $error = 'Username or Password incorrect';
            }
        }
        else {
            $error = 'Please fill all the details!';
        }
    }
?>
<?php 
    // Check if the session for the logged in user is created or not and redirect accordingly 
    if (isset($_SESSION['username'])): 
        header('Location:s.php');        
    else:
        include("mechihead.php");
?>
    <div class="container">
        <div class="forms">
        <div class="info-box">
                <img id="asset" src="images/ksp%208.jpeg" alt="">
            </div>
    
            <div id="data" class="info-box">
               <h1> Student's  Log In</h1>
                <form action="login.php" method="POST">
                    <input type="text" name="Regno" placeholder="Registration Number" >
                    <input type="password" name="password" placeholder="Password" >

                    <input type="submit" name="login" value="Log In">
                      <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i><a href="register.php"> Create An Account...</a></i></small>

                    <div class="alert">
                        <?php 
                            if (isset($_POST['login'])) {
                                echo $error;
                            }
                        ?>
                    </div>
                </form>
            </div>    
        </div>
    </div>
<?php 
    include("include/footer.php");
    endif
?>
