<?php
// session_start();

// // Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }
require_once "./server/db_connect.php";
$name = $age = $email = "";
$errors = array('name' => '', 'age' => '', 'email' => '');

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        echo "Name is required";
    } else {
        $name = htmlspecialchars($_POST["name"]);
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = "name must be letters and spaces only";
        }
    }

    if (empty($_POST["age"])) {
        echo "Age is required";
    } else {
        $age = htmlspecialchars($_POST["age"]);
    }

    if (empty($_POST["email"])) {
        echo "Name is required";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "EMAIL MUST BE VALID";
        }
    }

    if (array_filter($errors)) {
        //something
    } else {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $age = mysqli_real_escape_string($conn, $_POST["age"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        $sql = "INSERT INTO users (name, age, email) VALUES ('$name', $age, '$email')";

        //save into mysql db

        if (mysqli_query($conn, $sql)) {
            //success
            header("Location: index.php");
        } else {
            //error
            echo "query error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<!-- The reason why the header and body tags aren't included is beacause they are in the footer and header tempales-->
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a worker</title>
    <!-- Compiled and minified CSS From Materlize Framework-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        .brand-text {
            color: black !important;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<body class="grey lighten-4">

    <?php include("templates/navbar.php"); ?>

    <section class="container grey-text">
        <h4 class="center"> Add a user</h4>
        <form action="add.php" class="white" method="POST">
            <label for="name">Your name</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required>
            <div class="red-text"><?php echo $errors["name"]; ?></div>
            <label for="age">Your Age</label>
            <input type="number" name="age" min="18" max="30" value="<?php echo $age; ?>" required>
            <label for="email">Your Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required>
            <div class="red-text"><?php echo $errors["email"]; ?></div>
            <div class="center">
                <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include("templates/footer.php"); ?>

</body>

</html>