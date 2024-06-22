<?php

session_start();

// sleep(3);

include "connect.php";

date_default_timezone_set('Asia/Manila');

// Generate userid for student
$origid = uniqid();
$hashedid = md5($origid);//hashed id

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $tempname = $_POST['fname']." ".$_POST['mname']." ".$_POST['lname']." ".$_POST['suffix'];
    $name = ucwords($tempname);
    $student_number = $_POST['idnumber'];
    $email = $_POST['email'];
    $section = $_POST['section'];
    $groupnumber = $_POST['groupnumber'];

    $currentDate = date("y-m-d h:i:s"); 

    // Check if the user is exist 
    $query = "SELECT name, email FROM student WHERE name = '$name' AND email = '$email' limit 1";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 0){
        echo "yeah";
        if(!empty($_FILES['studentavatar']['name'])){
            echo "here too ",$_FILES['studentavatar']['name'];
            $name = $_FILES['studentavatar']['name'];
            $type = $_FILES['studentavatar']['type'];
            $data = file_get_contents($_FILES['studentavatar']['tmp_name']);
        
            // Insert image data into database
            $query = "INSERT into avatar ( name, user_id, type, data, datetime) values ('$name', '$hashedid', '$type','$data','$currentDate')";
            $sql_result = mysqli_query($conn, $query);
        
            if ($sql_result) {
                echo "Image uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // $sql = "INSERT INTO `users`(`user_id`, `name`, `email`, `student_number`, `section`, `group_no`, `student`,`datetime`) VALUES ('$hashedid','$name ','$email','$student_number','$section','$groupnumber','1','$currentDate')";
        // $sql_result = mysqli_query($conn, $sql);

        // if ($sql_result) {

        //     if(isset($_POST['addstudent'])){
        //         if(isset($_SESSION['studentExist'])){
        //             unset($_SESSION['studentExist']);
        //         }
        //         header("Location: students");
        //         exit;
        //     }
        //     else if(isset($_POST['addanother'])){
        //         if(isset($_SESSION['studentExist'])){
        //             unset($_SESSION['studentExist']);
        //         }
        //         header("Location: addstudent");
        //         exit;
        //     }
                
        // }else{
        //     echo "Error: " . mysqli_error($conn);
        // }
    
    }else{
        $_SESSION['studentExist'] = "Student is already exist.";

        header("Location: addstudent");
        exit;
    }

    
    mysqli_close($conn);
}