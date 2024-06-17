<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

<?php include "sidebar.php";?>

<nav class="absolute pt-3 w-full border-gray-200 ">
  <div class="max-w-screen-xl px-7  bg-white rounded-lg flex flex-wrap items-center justify-between mx-auto shadow-md shadow-green-200">
    <div class=" w-auto flex justify-center items-center" id="navbar-multi-level">
      
      <p id="pathName" class="font-extrabold tracking-wide text-gray-900 text-[18px]"></p>
    </div>

    <div class="flex items-center font-poppins">
      
        <div class="flex mr-5 gap-5">
            <!-- dropdown section -->
            <select id="section" class="px-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 w-full py-2">
                <option selected>Year&Section</option>
                <option value="1a">1A</option>
                <option value="2a">2A</option>
                <option value="2b">2B</option>
                <option value="3a">3A</option>
                <option value="4a">4A</option>
            </select>
             <!-- dropdown group -->
            <select id="group" class="px-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 w-full py-2">
                <option selected>Group</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

        </div>


      
      <div class="border border-gray-300 content-none h-[30px] mr-[20px]"></div>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

        <button type="button" class="px-1 py-2 flex justify-between align-center items-center text-sm rounded-full md:me-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <img class="w-12 h-12 rounded-full" src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" alt="user photo">
          <div class="px-3">
            <p class="font-bold tracking-wide text-[16px] text-gray-900 text-start">Juan Dela Cruz Jr.</p>
            <p class="text-gray-500 tracking-wide text-start font-medium ">Faculty</p>
          </div>
        </button>

        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none divide-y divide-gray-100 rounded-lg shadow-md bg-emerald-950" id="user-dropdown">
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="#" class="block px-10 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <a href="#" class="block px-10 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Change Password</a>
            </li>
            <li>
              <a href="#" class="block px-10 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>


<script>

const route = window.location.pathname;
const  routeName = path.replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '');

function upperInitial(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

var pageName = "";

if(routeName === "addstudent"){
  var pageName = 'Add Student';

}
let titleName = upperInitial(pageName);
var titlePage = document.getElementById('pathName');


titlePage.innerText = titleName;

</script>
