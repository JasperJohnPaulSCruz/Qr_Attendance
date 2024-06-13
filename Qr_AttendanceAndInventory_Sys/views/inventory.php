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

<!-- <div class="flex justify-around h-screen w-screen bg-[url('assets/img/bsulandscape.jpg')] bg-cover bg-center font-poppins">
    <div class="flex justify-center items-center h-full w-full bg-green-800 bg-opacity-75">    
        <p class="displa-2">HOMEPAGE</p>
    </div>
</div> -->

<?php include "components/topbar.php"; ?>

</body>
</html>
