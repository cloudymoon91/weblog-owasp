<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>cloudymoon</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />


  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>


<body>
    <?php
    include 'db.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute a query to check if the user exists
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        // Close the connection when you're done with it
        $conn->close();
        // Authentication successful, set a session variable
        setcookie("username", $row["username"], time() + 3600 * 7, "/");
        setcookie("is_logged", 'true', time() + 3600 * 7, "/");
        setcookie("user_id", $row['user_id'], time() + 3600 * 7, "/");

        // Redirect to a protected page or home page
        header("Location: user_panel.php"); // Redirect to a welcome page or dashboard
    } else {
        // Authentication failed, show an error message
        $error_message = "Invalid username or password";
    }
}
?>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <!-- footer section -->
    
  <?php
  if (!is_null($error_message)) {
      echo "<p>$error_message</p>";
  }
  ?>
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2023 All Rights Reserved By
      <a href="http://cloudymmon.top/">cloudymmon</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>
