<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for register post data
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
    
        $password = $_POST['password'];
        $regno = $_POST['Regno'];
        $classs = $_POST['classs'];

        if ($username != ''  && $password != '' && $classs != '' ) {
            $pwd_hash = sha1($password);

            // Insert data into DB only as user (Admin: user_role = 1, Users: user_role = 0)
            $sql = "INSERT INTO users (username, password, user_role, Regno, class) VALUES ('$username', '$pwd_hash', 0, '$regno', '$classs')";
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
                <form action="register.php" method="POST">
                    <input type="text" name="username" placeholder="Student Name" >
                    <input type="text" name="Regno" placeholder="Registration Number" >
                    
       <select name="classs" id="">
    <option selected hidden value="">Select Level</option>
   
    <option value="ND2">ND2</option>
   
    <option value="HND2">HND2</option>
    
</select>
                    
                    <input type="password" name="password" placeholder="Password" >
                    <input type="submit" name="register" value="Register">   
                    
                    <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i><a href="login.php"> Have An Account? Log In</a></i></small>
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
    
    <script>
    const menuToggle = document.querySelector('.toggle')
    const showcase = document.querySelector('.showcase')
    const eml = document.querySelector('.em')

    console.log(eml)
    
    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('active')
        showcase.classList.toggle('active')
    })

    function validateForm() {
        const emailInput = document.getElementById('email');
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailPattern.test(emailInput.value)) {
            alert('Please enter a valid email address.');
            return false;
        }

        return true;
    }
    </script>
<?php 
    include("include/footer.php");
    endif
?>
