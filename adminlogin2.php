<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for login post data
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($password != '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $passwd = sha1($password);

            $sql = "SELECT * FROM superadmin WHERE email = '$email' AND password = '$passwd'";
            $result = mysqli_query($conn, $sql) or die('Error');

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $password = $row['password'];

                    // Create session id's for the database values
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;

                    header('Location:dashboardp.php');
                }
            }
            else {
                $error = 'invalid email or password';
            }
        }
        else {
            $error = 'invalid email or password!!!';
        }
    }
?>
<?php 
    // Check if the session for the logged in user is created or not and redirect accordingly 
    if (isset($_SESSION['username'])): 
        header('Location:dashboardp.php');        
    else:
        include("admindash.php");
?>
    <div class="container">
        <div class="forms">
            <div class="info-box">
                <img id="asset" src="images/ksp%203.jpeg" alt="">
            </div>
            <div id="data" class="info-box">
                <h1>H.O.D login</h1>
                <form action="adminlogin2.php" method="POST">
                    <input type="email" name="email" placeholder="E-mail" >
                    <input type="password" name="password" placeholder="Password" >

                    <input type="submit" name="login" value="Log In">

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
