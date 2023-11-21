<?php
// Start the session
session_start();

// Check if the user is already logged in, then redirect to admin page
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: home.php");
    exit;
}

// Check if the login form is submitted
if (isset($_POST['username'])) {
    // Retrieve the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the input fields
    if (!empty($username) && !empty($password)) {
        // Connect to the database
       include'inc\database_conn.php';


        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            $result = mysqli_fetch_assoc($result);

            $_SESSION['is_logged_in'] = true;

            header("Location: home.php");
        } else {
            
            // Display an error message if login fails
            $loginError = "Invalid username or password.";
        }

        
    }

}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login Page</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="admins">
            <div class="admin">
                <?php if (isset($loginError)) : ?>
                    <p><?php echo $loginError; ?></p>
                <?php endif; ?>
                <form action="login.php" method="post">
                    <fieldset class="login">
                        <legend>Login as Admin User</legend>
                        <input type="text" name="username" id="name" placeholder="Username" required><br><br>
                        <input type="password" name="password" id="pass" placeholder="Password" required><br><br>
                        <button type="submit" id="submit">Login</button>
                        <p>Forgot your password?</p><br>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
