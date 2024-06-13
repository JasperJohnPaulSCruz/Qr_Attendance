

<nav class="absolute w-full bg-white border-gray-200 shadow-lg">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto">
    <div class=" w-auto block" id="navbar-multi-level">
      <ul class="flex flex-col font-medium p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="home" class="menu block py-2 px-3 text-gray-900 rounded">Home</a>
        </li>
        <li>
          <a href="students" class="menu block py-2 px-3 text-gray-900 rounded">Students</a>
        </li>
        <li>
          <a href="inventory" class="menu block py-2 px-3 text-gray-900 rounded">Inventory</a>
        </li>
        <li>
          <a href="#" class="menu block py-2 px-3 text-gray-900 rounded">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>

const path = window.location.pathname;
const pathName = path.replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '');

const links = document.querySelectorAll("a.menu");
links.forEach(link => {
  console.log(link.getAttribute('href'));

    if (link.getAttribute('href') === pathName) {

        link.classList.add("text-white", "bg-lime-700", "hover:bg-lime-500");
    } else {
        link.classList.add("text-gray-900", "hover:bg-gray-100" , "hover:text-lime-700");
    }
    console.log('.');
});


</script>
