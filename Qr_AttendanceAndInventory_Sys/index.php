<?php
    session_start();

    // if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true")
    // {
    //     header("Location: login.php");
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="assets/img/bulsuhag.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/img/bulsuhag.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>

    <?php include "components/topbar.php"; ?>

    <div class="flex justify-around h-screen w-screen bg-[url('assets/img/maingate.png')] bg-cover bg-center font-poppins">
        <div class="flex justify-around items-center w-full bg-green-800 bg-opacity-75">    
            <div class="h-full w-full pt-20 flex flex-col justify-center items-center">
                <img class="border-4 border-white rounded mb-3" src="assets/img/dummy-image.jpg" width="200px" alt="dummy">
                <div class="bg-white p-5 rounded">
                    <p class="font-bold uppercase">Name <span class="font-normal normal-case">Juan Dela Cruz</span></p>
                    <p class="font-bold uppercase">Id number <span class="font-normal normal-case">Juan Dela Cruz</span></p>
                    <p class="font-bold uppercase">Section <span class="font-normal normal-case">Juan Dela Cruz</span></p>
                    <p class="font-bold uppercase">Group <span class="font-normal normal-case">Juan Dela Cruz</span></p>
                </div>
                
            </div>
            <div class="h-full w-full pt-20">

            </div>
        </div>
    </div>

</body>
</html>