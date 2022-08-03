 <?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password)){
 
    // Matching the user inputs to the data in our Database
    $sql = mysqli_query($conn, "SELECT * FROM  users WHERE email  = '{$email}' AND password = '{$password}'");
    
    // If user credential match then, this piece of code be executed.
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "Successful";  
    }else{
        echo "Email or Password is Incorrect!";
    }

}else{
    echo "All input fields are required!";
}

?>