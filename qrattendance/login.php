<?
// session_start();
// $_SESSION['authenticated'] = true;

// //Redirect to the main.php page
// header("Location: login.php");
// exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        
                    <?php
                    // Display error message here (if needed)
                    if (isset($_GET['error']) && $_GET['error'] === 'failed') {
                        echo '<p style="color: red;text-align:center">Incorrect username or password.</p>';
                    }
                    ?>             
                        <form action="verify.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                        <input type="checkbox" id="showPassword"> Show
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section">Section:</label>
                                
                                <select id="section" name="section"  required >
                                    <option value="IT-4A">IT-4A</option>
                                    <option value="IT-4B">IT-4B</option>
                                    <option value="IT-4C">IT-4C</option>
                                </select>
                                <label for="group">Group:</label>
                                <select id="group" name="group" required>
                                    <option value="G1">Group 1</option>
                                    <option value="G2">Group 2</option>
                                    <!-- Add more options as needed -->
                                </select><br>

                            </div>
                           

                            
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="forgot_password.html">Forgotten Password?</a>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        Don't have an account? <a href="signup.html">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery links (required for some Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add Font Awesome for the eye icon -->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

    <script>
        // Show/hide password functionality
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordField = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function () {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>
</html>
