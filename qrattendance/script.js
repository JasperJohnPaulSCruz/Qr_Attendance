document.addEventListener('DOMContentLoaded', function () {
    const profileDropdownBtn = document.getElementById('profileDropdownBtn');
    const profileDropdown = document.getElementById('profileDropdown');
  
    profileDropdownBtn.addEventListener('click', function () {
      profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
    });
  
    // Close the dropdown menu if the user clicks outside of it
    document.addEventListener('click', function (event) {
      if (!profileImage.contains(event.target) && !profileDropdown.contains(event.target)) {
        profileDropdown.style.display = 'none';
      }
    });
  });
  