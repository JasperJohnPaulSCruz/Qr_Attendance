<?php
//
include "connect.php";



function totalStudent($conn){
    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];

    $t_query = "Select * from attendance_log where yr_sec = '$section' and group_no = '$group_no'";
    $t_result = mysqli_query($conn, $t_query);
    
    if(mysqli_num_rows($t_result)>0){
        return mysqli_num_rows($t_result);
    }else{
        return 0;
    }
}

function present($conn){
    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];
    
    $p_query = "Select * from attendance_log where status = 'present' and yr_sec = '$section' and group_no = '$group_no'";
    $p_result = mysqli_query($conn, $p_query);

    if(mysqli_num_rows($p_result)>0){
        return mysqli_num_rows($p_result);
    }else{
        return 0;
    }
}

function late($conn){
    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];
    
    $l_query = "Select * from attendance_log where status = 'late' and yr_sec = '$section' and group_no = '$group_no'";
    $l_result = mysqli_query($conn, $l_query);
    
    if(mysqli_num_rows($l_result)>0){
        return mysqli_num_rows($l_result);
    }else{
        return 0;
    }
}

function absent($conn){
    $section = $_SESSION['section'];
    $group_no = $_SESSION['groupnumber'];

    $a_query = "Select * from attendance_log where status = 'absent' and yr_sec = '$section' and group_no = '$group_no'";
    $a_result = mysqli_query($conn, $a_query);
    
    if(mysqli_num_rows($a_result)>0){
        return mysqli_num_rows($a_result);
    }else{
        return 0;
    }
}

function allItms($conn){

    $query = "SELECT id from items";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result)>0){
        return mysqli_num_rows($result);
    }else{
        return 0;
    }
}