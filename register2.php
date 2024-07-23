<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for register post data
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $classs = $_POST['classs'];

        if ($username != ''  && $password != '' && $classs != '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $pwd_hash = sha1($password);

            // Insert data into DB only as user (Admin: user_role = 1, Users: user_role = 0)
            $sql = "INSERT INTO teacher (username, password, email, class) VALUES ('$username', '$pwd_hash', '$email', '$classs')";
            $query = $conn->query($sql);

            if ($query) {
                header('Location:teacherslogin.php');
            } else {
                $error = 'Failed to register user';
            }
        } else {
            $error = 'Please fill all the details correctly or provide a valid email address!';
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
                <form action="register2.php" method="POST">
                    <input type="text" name="username" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <select name="classs" required>
                        <option selected hidden value="">Select Level</option>
                        <option value="ND2">ND2</option>
                        <option value="HND2">HND2</option>
                    </select>
                    <input type="hidden" name="code" value="1" placeholder="Phone number ">            
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="register" value="Register">  
                    
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i><a href="teacherslogin.php"> Have An Account? Log In</a></i></small> 
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