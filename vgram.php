<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for register post data
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
    
        $password = $_POST['password'];
        $email = $_POST['email'];
      

        if ($username != ''  && $password != '' ) {
            $pwd_hash = sha1($password);

            // Insert data into DB only as user (Admin: user_role = 1, Users: user_role = 0)
            $sql = "INSERT INTO superadmin (username, password, user_role, email) VALUES ('$username', '$pwd_hash', 1, '$email')";
            $query = $conn->query($sql);

            if ($query) {
                header('Location:login.php');
            }
            else {
                $error = 'Failed to register user';
            }
        }
        else {
            $error = 'Please fill all the details!';
        }
    }
?>
<?php 
    if (isset($_SESSION['username'])): 
        header('Location:dashboard.php');        
    else:
        include("mechihead.php");
?>
    <div class="container">
        <div class="forms">
           <div class="info-box">
                <img id="asset" src="images/registration.jpg" alt="">
            </div>
            <div id="data" class="info-box">
                <h1>Create an Account</h1>
                <form action="vgram.php" method="POST">
                    <input type="text" name="username" placeholder="Full Name" >
                    <input type="email" name="email" placeholder="E-mail" >            
                    <input type="password" name="password" placeholder="Password" >
                    <input type="submit" name="register" value="Register">   
                    <div class="alert">
                        <?php 
                            if (isset($_POST['register'])) {
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
