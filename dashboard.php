<?php 
    session_start();
    include("config/db.php"); // Include DB config

    if (!$_SESSION['username']):
        header('Location: login.php');
    else:
        include("admindashp.php");
?>
    <div class="container" id="data">
        <!-- View for Admin -->
        <?php if ($_SESSION['id'] == 1): ?>
            <h3>Welcome back <?php echo $_SESSION['username']; ?></h3>

            <div class="cards">
               <div class="card">
                    <a href="view-students.php" style="color: #ff4200">
                        <img src="images/student.jpg" alt="">
                        REGISTER STUDENT
                    </a>
                </div>
                 <div class="card">
                    <a href="viewteacher.php" style="color: #ff4200">
                        <img src="images/lecturer.png" alt="">
                  REGISTER LECTURER
                    </a>
                </div>
                <div class="card">
                    <a href="uploadpp.php" style="color: #ff4200">
                        <img src="images/project.png" alt="">
                      ADD PROJECT
                    </a>
                </div>
                
               
                
                
            </div>
        <?php else: ?> 
        
        <!-- View for Users -->
        <div class="user">
            <h1>Welcome <?php echo $_SESSION['username']; ?>,</h1>
            <a class="link-btn" href="s.php">Your are now Eligible to Upload and Retreive Project.<br>
            <br>
            <br>
              Click to continue</a>            
        </div>
        <?php 
  

        include("config/db.php");
        ;
?>
   <h1>ANNOUNCEMENT!!!</h1>
    <div class="container">
        <?php
            $sql = "SELECT * FROM assignment WHERE user_role = 1";
            $result = mysqli_query($conn, $sql) or die('Error');
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $duedate = $row['duedate'];
                    $description = $row['description'];
        ?>
            <div class="assignment-card" id="data">
                <h2><?php echo $title; ?></h2>
                <h4>Announcement Date: <?php echo $duedate; ?></h4>

                <div class="buttons">
                    <?php if ($_SESSION['id'] == 1): ?>
                        <a class="green" href="view.php?id=<?php echo $id; ?>">View</a>
                        <a class="blue" href="edit.php?id=<?php echo $id; ?>">Edit</a>
                    
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    
                    <?php else: ?>
                        <a class="green" href="?id=<?php echo $id; ?>">View</a>
                    <?php endif ?>
                </div>
            </div>
        <?php            
                }
            }
            else {
                $error = 'No assignments';
            }
        ?>


        <?php endif ?>
    </div>
<?php 
    include("include/footer.php");
    endif
?>
