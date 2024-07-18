
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

<?php 

  session_start();

  include "sidebar.php";
  include "./connect.php";
?>

<nav class="absolute pt-3 w-full border-gray-200  px-[130px]">
  <div class=" px-[50px]  bg-white rounded-lg flex items-center justify-between mx-auto shadow-md shadow-red-200">
    <div class=" w-auto flex justify-center items-center" id="navbar-multi-level">
      <p id="pathName" class="font-extrabold tracking-wide text-gray-900 text-[18px]"></p>
    </div>

    <div class="flex items-center flex-between font-poppins">
      
        <div class="flex w-full mr-5 gap-5">
            <!-- dropdown section -->
            <select name="section" id="section" class="cursor-pointer px-5 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 hover:bg-gray-50 w-[180px] py-2">
                <option selected disabled>Year&Section</option>
                <?php
                  $ys_query = "SELECT * From yr_sec";
                  $ys_result = mysqli_query($conn, $ys_query);

                  if(mysqli_num_rows($ys_result)>0){
                    while($ys_row = mysqli_fetch_assoc($ys_result)){
                      ?>
                        <option value="<?php echo $ys_row['id']; ?>" <?php echo $_SESSION['section'] == $ys_row['id'] ? 'selected' : '';?> ><?php echo $ys_row['year_and_sec']; ?></option>
                      <?php
                    }
                  }
                ?>
            </select>
             <!-- dropdown group -->
            <select name="groupnumber" id="groupnumber" class="cursor-pointer px-5 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 hover:bg-gray-50 w-[130px] py-2">
                <option selected disabled>Group</option>
                <?php
                  $gn_query = "SELECT * From group_no";
                  $gn_result = mysqli_query($conn, $gn_query);

                  if(mysqli_num_rows($gn_result)>0){
                    while($gn_row = mysqli_fetch_assoc($gn_result)){
                      ?>
                        <option value="<?php echo $gn_row['id']; ?>" <?php echo $_SESSION['groupnumber'] == $gn_row['id'] ? 'selected' : '';?> ><?php echo $gn_row['group_number']; ?></option>
                      <?php
                    }
                  }
                ?>
            </select>

        </div>
      
      <div class="border border-gray-300 content-none h-[30px] mr-[20px]"></div>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

        <button type="button" class=" py-2 flex justify-between align-center items-center text-sm rounded-full w-full" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <img class="w-12 h-12 rounded-full" src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" alt="user photo">
          <div class="px-3 text-nowrap">
            <p class="font-bold tracking-wide text-[16px] text-gray-900 text-start w-full"><?php echo $_SESSION['name'];?></p>
            <p class="text-gray-500 tracking-wide text-start font-medium "><?php echo $_SESSION['role'];?></p>
          </div>
        </button>

        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded-lg shadow-md bg-emerald-950" id="user-dropdown">
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-10 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-800">Profile</a>
            </li>
            <li>
              <a href="#" class="block px-10 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-800">Change Password</a>
            </li>
            <li>
              <a href="logout.php" class="block px-10 py-2 text-gray-200 hover:bg-gray-100 hover:text-gray-800">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- For route name and display -->
<script>

const route = window.location.pathname;
var routeName = route.replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '');

function upperInitial(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

if(routeName === "addstudent"){
  routeName = 'Add Student';
} 
else if(routeName === "attendanceoverview"){
  routeName = 'Attendance Overview';
} 
else if(routeName === "inventoryadmin"){
  routeName = 'Inventory Management';
} 
else if(routeName === "additem"){
  routeName = 'Add Item';
} 

  let titleName = upperInitial(routeName);
  var titlePage = document.getElementById('pathName');


  titlePage.innerText = titleName;

</script>


<!-- If the dropdown is change create a session for it -->
<script>

function updateSession(selectedElementId, newValue) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'session.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(selectedElementId + '=' + encodeURIComponent(newValue));

    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log('Session variable set successfully for ' + selectedElementId);
            console.log(xhr.responseText);
        } else {
            console.error('Error setting session variable.');
        }
    };
}

function reloadTable() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'attendanceLogs.php', true);

    xhr.readyState = function() {
      console.log(xhr.statusText);
        if (xhr.status == 200) {
            console.log('Table reloaded succesfully');
        } else {
            console.error('Error setting session variable.');
        }
    };
}

document.addEventListener('DOMContentLoaded', function() {
    // Select the first select element
    var selectedSection = document.getElementById('section');

    // Add change event listener
    selectedSection.addEventListener('change', function() {
        var selectedOption = selectedSection.value;
        updateSession('section', selectedOption);
        reloadTable();
    });

    // Select the second select element
    var selectedGroup = document.getElementById('groupnumber');

    // Add change event listener
    selectedGroup.addEventListener('change', function() {
        var selectedOption = selectedGroup.value;
        updateSession('groupnumber', selectedOption);
        reloadTable();
    });
});
</script>


