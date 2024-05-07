<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
    <title>Edit Profile</title>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="updateprofile.php" method="POST" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>

            <label for="profileImage">Profile Image:</label>
            <input type="file" id="profileImage" name="profileImage">
            <br>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>
