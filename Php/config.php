<?php
$conn = mysqli_connect("localhost", "root", "", "node_8");
if(!$conn){
    echo "Database Connected". mysqli_connect_error();
}

?>