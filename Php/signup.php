<?php
session_start();
 include_once "config.php";
 $fname = mysqli_real_escape_string($conn, $_POST['fname']);
 $lname = mysqli_real_escape_string($conn, $_POST['lname']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);
  

 if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    // Verifying the validity of the email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //  First let's check if the email already exists in the database
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email ='{$email}'");

        if(mysqli_num_rows( $sql) > 0){
            echo "$email - Already exists!";
        }else{
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                // $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                // Preffered image extension required
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpeg', 'jpg', 'svg'];
                if(in_array($img_ext, $extensions) === true){
                   $time = time();
                   $new_img_name = $time.$img_name;

                if(move_uploaded_file($tmp_name , "images/".$new_img_name)){
                    $random_id = rand(time(), 100000000);
                    // Insertion of user inputs into our table inthe database
                    $sql2 = mysqli_query($conn, "INSERT INTO  users (unique_id, fname, lname, email, password, img)                   
                         VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}')");

                         if($sql2){
                            $sql3 = mysqli_query($conn, "SELECT * FROM  users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0){
                               $row = mysqli_fetch_assoc($sql3);
                               $_SESSION['unique_id'] = $row['unique_id'];
                               echo "Successful";
                            }

                         }else{
                            echo "Something went wrong!";
                         }
                 }

                }else{
                    echo "Please choose an image file - png, jpeg, jpg, svg!";
                }

            }else{
                echo "Please choose an Image file!";
            }
        }

    }else{
        $email - " is not a valid email";
    }

 }else{
    echo "All input fields are required";
 }

?>