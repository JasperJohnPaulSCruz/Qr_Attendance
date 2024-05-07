<?php
// session_start();
include 'db.php';

if(isset($_POST['text'])){

    
    $text = $_POST['text'];
    $currentDate = date("Y-m-d");
    $sql_query = "SELECT * FROM student_record WHERE Name ='$text' AND DATE(TIME) = '$currentDate'";
    $result=$conn->query($sql_query);
    
    if($result->num_rows > 0){
        //$voice = new COM("SAPI.SpVoice");
        $message1 = "Sorry".$text."duplicate entry is not allowed.";
        //$voice->speak($message1);
    } else {
        //$voice = new COM("SAPI.SpVoice");
    $message = "Hi".$text. "your attendance has been recorded";
 // Insert student info into table

    $sql = "INSERT INTO student_record (Name,Time) VALUES ('$text', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Your Attendance has been recorded";
        // $voice->speak($message);
    }else{
        $_SESSION['error'] ="$conn->error";
    }
    }

    
    
    

header("location: index.php");

}
// Close the database connection
$conn->close();
?>
