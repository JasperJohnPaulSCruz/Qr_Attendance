<?php
// Start the PHP session (assuming you've already started sessions in your application)
session_start();
include('db.php');
// // Sample data for user session (replace with actual data)
if (!isset($_SESSION["name"])) {
    header("Location: login.php");
    exit();
}


    $name = $_SESSION['name'];
    $section = $_SESSION['section'];
    $group = $_SESSION['group'];


// $_SESSION['username'] = 'John Doe';
$_SESSION['profile_image'] = 'profile.jpg';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Instascan -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS Styles  -->
    <link rel="stylesheet" href="styles.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    

    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <!-- <div class="container"> -->
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                            Welcome, <?php echo $name; ?>
                            <img src="img/jesse_pic.bmp" alt="Profile Photo" width="30" class="ml-2 rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">Edit Photo</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        <!-- </div> -->
    </nav>

    <!-- Header -->
    <header class="py-4 bg-primary bg-gradient text-white">
            <div class="container px-4 text-center">
                <h1 class="fw-bolder">Student Attendance</h1>
                
            </div>
</header>

    <!-- Content -->
    <div class="container mt-4 content-container">
        <!-- Left Division (QR Code Scanning) -->
        <div class="content-item" style="overflow:hidden!important;">
            <div class="py-2" style="font-size:x-large; text-align:center">
                    <i class="fa fa-camera" aria-hidden="true"></i>Scan Here
            </div>
            <div class="camera-container">
                <div class="camera" >
                    <video id="preview" ></video>
                    <svg class="scan-region-highlight-svg" viewBox="0 0 238 238" preserveAspectRatio="none">
                                <path d="M31 2H10a8 8 0 0 0-8 8v21M207 2h21a8 8 0 0 1 8 8v21m0 176v21a8 8 0 0 1-8 8h-21m-176 0H10a8 8 0 0 1-8-8v-21"></path>
                            </svg>
                </div>
            </div>
        </div>

        <!-- Right Division (Search and Attendance Table) -->
        <div class="content-item">
            <form class="search-form" action="insert.php" method="post">
                <div class="input-group py-2">
                    
                        <input type="text" name="text" id="searchInput" class="form-control search-input" placeholder="QR Code Entry">
                        <div class="input-group-append">
                            <button class="btn btn-dark search-button" type="button" onkeyup="myFunction()">SEARCH</button>
                        </div>  
                </div>
            </form>
            
            <table class="table table-bordered" id="studTable">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $currentDate = date("Y-m-d");
                    $sql = "SELECT Name, Time from student_record WHERE Date(Time) = '$currentDate' ORDER BY Name ASC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            ?>
                                        <tr>
                                            <td style="text-align:left"><?php echo $row['Name'];?></td>
                                            <td><?php echo $row['Time'];?></td>
                                        </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">

        
        let scanner = new Instascan.Scanner({video: document.getElementById("preview")});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.length > 0 ){
                scanner.start(cameras[0]);
            } else {
                alert("No Camera Found");
            }
        }).catch(function(e){
            console.error(e);
        });

        scanner.addListener('scan',function(c){
            document.getElementById("searchInput").value=c;
            document.forms[0].submit();
        });

        $(document).ready( function () {
            new DataTable('#studTable',{
                paging: false,
                scrollCollapse: true,
                scrollY: '35vh',
                searching: false, // Enable search field
                ordering: true, // Enable sorting
                // responsive: true, // Enable responsive design
                "pageLength": 5,
                "language":{
                "lengthMenu": "Display _MENU_ records per page",
                        "zeroRecords": "No Data found",
                        // "info": "Page _PAGE_ of _PAGES_",
                        "infoEmpty": "No available records",
                "infoFiltered": ""
                },
            });

        });

        function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("studTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
    </script>



    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
