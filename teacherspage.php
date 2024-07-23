<?php 
   
    
    session_start();
    include("config/db.php"); // Include DB config

    if (!$_SESSION['username']):
        header('Location: login.php');
    else:
        include("teachersdashvv.php");


?>
           
           <div class="scheme">
                <marquee bgcolor="white" style="color: black; height:50px; padding: 3px; margin-top:20px;  font-family:cursive; font-size:20px;" >
              Welcome <?php echo $_SESSION['username']; ?>, You are now Eligible to View and Retrieve Project.
               </marquee>
           </div>
            
             <br>
              
               
                       
            <br>
            <br>
            <br>
            <br>
             <br>
               <div class="container" id="data">
               <div class="cards">
               
                 <div class="card">
                    <a href="vvvproject.php" style="color: #ff4200">
                        <br>
                        <br>                  
                        <img src="images/view.JPG" alt="">
                        <br>
                     View Available Projects
                    </a>
                </div>

                 <div class="card">
                    <a href="uploadppp.php" style="color: #ff4200">
                        <br>
                        <br>
                        <img src="images/upload2.jpg" alt="">
                        <br>
                       Upload projects
                    </a>
                </div>

               
                
               
            </div>
               </div>
             <?php 
    include("include/footer.php");
    endif
?>