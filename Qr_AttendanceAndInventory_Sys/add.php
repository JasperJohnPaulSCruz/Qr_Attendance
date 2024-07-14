<?php
session_start();

include "connect.php";
include "sendmail.php";
include "qrGenerator.php";


date_default_timezone_set('Asia/Manila');

// Generate userid for student
$origid = uniqid();
$hashedid = md5($origid);//hashed id
$currentDate = date("y-m-d h:i:s"); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['addstudent']) || isset($_POST['addanother'])){
        $tempname = $_POST['fname']." ".$_POST['mname']." ".$_POST['lname']." ".$_POST['suffix'];
        $name = ucwords($tempname);
        $student_number = $_POST['idnumber'];
        $email = $_POST['email'];
        $section = $_POST['section'];
        $groupnumber = $_POST['groupnumber'];

        // Check if the user is exist 
        $query = "SELECT name, email FROM student WHERE name = '$name' AND email = '$email' limit 1";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 0){

            if (!empty($_FILES['studentavatar']['name'])) {
                $filename = $_FILES['studentavatar']['name'];
                $type = $_FILES['studentavatar']['type'];
                $tmp_name = $_FILES['studentavatar']['tmp_name'];
            
                // Directory where uploaded images will be saved
                $uploadDirectory = "avatar/student/$hashedid/";
                $targetPath = "";

                if (mkdir($uploadDirectory, 0777, true)) {
                    $targetPath = $uploadDirectory . $filename;
                }
                
                if (move_uploaded_file($tmp_name, $targetPath)) {
                    // Set permissions to 775
                    if (chmod($targetPath, 0755)) {
                        echo "Permissions set to 755 successfully for $targetPath";
                    } 
                    // Image uploaded successfully, now insert into database
                    $q = "INSERT INTO `avatar` (user_id, name,  path, datetime) VALUES ('$origid', '$filename', '$uploadDirectory', '$currentDate')";
                    $q_result = mysqli_query($conn, $q);
            
                    if ($q_result) {
                        echo "Image uploaded and data inserted into database successfully.";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Failed to move uploaded file.";
                }
            }

            $facultyId = $_SESSION['faculty_id'];
        
            $sql = "INSERT INTO `student`(user_id, name, email, student_number, yr_sec, group_no, faculty_id, datetime) VALUES ('$origid','$name ','$email','$student_number','$section','$groupnumber', '$facultyId', '$currentDate')";
            $sql_result = mysqli_query($conn, $sql);

            if ($sql_result) {

                sendMail($email, $hashedid, $name);

                if(isset($_POST['addstudent'])){

                    if(isset($_SESSION['studentExist'])){
                        unset($_SESSION['studentExist']);
                    }
                    header("Location: students");
                    exit;
                }
                
                else if(isset($_POST['addanother'])){

                    if(isset($_SESSION['studentExist'])){
                        unset($_SESSION['studentExist']);
                    }
                    header("Location: addstudent");
                    exit;

                }
                    
            }else{
                echo "Error: " . mysqli_error($conn);
            }
        
        }else{
            $_SESSION['studentExist'] = "Student is already exist.";

            header("Location: addstudent");
            exit;
        }
    }
    else if (isset($_POST['adduser'])){

        $tempname = $_POST['fname']." ".$_POST['lname'];
        $name = ucwords($tempname);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        // Check if the user is exist 
        $query = "SELECT name, email FROM user_acount WHERE name = '$name' AND email = '$email' limit 1";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 0){

            $sql = "INSERT INTO `user_acount`(userid, name, email, password, admin, datetime) VALUES ('$origid','$name ','$email','$hashedpwd','N','$currentDate')";
            $sql_result = mysqli_query($conn, $sql);

            if ($sql_result) {

                sendCredentials($email, $password, $name);

                if(isset($_SESSION['userExist'])){
                    unset($_SESSION['userExist']);
                }

                header("Location: users");
                exit;
                    
            }else{
                echo "Error: " . mysqli_error($conn);
            }
        
        }else{
            $_SESSION['userExist'] = "Faculty is already exist. Please submit New Faculty";

            header("Location: users");
            exit;
        }

    }
    else if (isset($_POST['additem'])){

        if (!empty($_FILES['itempic']['name'])) {

            $filename = $_FILES['itempic']['name'];
            $type = $_FILES['itempic']['type'];
            $tmp_name = $_FILES['itempic']['tmp_name'];
        
            // Directory where uploaded images will be saved
            $uploadDirectory = "avatar/faculty/items/$hashedid/";
            $targetPath = "";

            if (mkdir($uploadDirectory, 0777, true)) {// Create folder 
                $targetPath = $uploadDirectory . $filename;
            }
            
            if (move_uploaded_file($tmp_name, $targetPath)) {
                // Set permissions to 775
                if (chmod($targetPath, 0755)) {
                    echo "Permissions set to 755 successfully for $targetPath";
                } 
                // Image uploaded successfully, now insert into database
                $q = "INSERT INTO `inventory` (item_id, name,  path, datetime) VALUES ('$origid', '$filename', '$uploadDirectory', '$currentDate')";
                $q_result = mysqli_query($conn, $q);
        
                if ($q_result) {
                    echo "Image uploaded and data inserted into database successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        }

        $tempname = $_POST['name'];
        $name = ucwords($tempname);
        $quantity = $_POST['quantity'];
        $facultyId = $_POST['facultyId'];

        $sql = "INSERT INTO `items`(item_id, faculty_id, item_name, quantity, datetime, modified) VALUES ('$origid','$facultyId','$name ','$quantity','$currentDate','$currentDate')";
        $sql_result = mysqli_query($conn, $sql);

        if ($sql_result) {

            $directory = 'avatar/faculty/qrs/'.$origid.'/';
            $imageName = $name.'.png';

            $addqr = "INSERT INTO `qr_code`( item_id, path, name, datetime) VALUES ('$origid','$directory','$imageName','$currentDate')";
            $res = mysqli_query($conn, $addqr);

            if($res){

                qrGenerate($origid, $name);

                // sendCredentials($email, $password, $name);
                if(isset($_SESSION['userExist'])){
                   unset($_SESSION['userExist']);
                }
    
                header("Location: additem");
                exit;
            }
                    
        }else{
            echo "Error: " . mysqli_error($conn);
        }

    }

    
    mysqli_close($conn);
}