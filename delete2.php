<?php 
    // Deleting an assignment from DB
 
    include("config/db.php"); // Include DB config
$alert="<script>alert('Deleted Succesfully')</script>";
    // Check for delete assignment post data (assignment id)
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
       

        $sql = "DELETE FROM users WHERE code = '1'";
        $query = $conn->query($sql);

        if ($query) {
           echo $alert;
        }
    }