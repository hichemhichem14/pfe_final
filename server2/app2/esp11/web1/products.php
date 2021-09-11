<?php

// Initialize the session
// session_start();

// // Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }

require_once "./server/db_connect.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Products</title>
    <style>
        table {
            margin: 25px;
        }

        .brand-text {
            color: black !important;
        }
    </style>
</head>

<body class="grey lighten-4">
    <?php include("./templates/navbar.php"); ?>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = $link->query("SELECT * FROM Products");
                if ($query->num_rows > 0) {

                    /* fetch associative array */
                    while ($row = $query->fetch_assoc()) {
                        echo "<tr><td>" . $row["productID"] . "</td><td>" . $row["productName"]
                            . "</td><td>" . $row["productBrand"] . "</td><td>" . $row["productQty"] . "</td><td>" . $row["Price"] . "</td></tr>";
                    }
                } else {
                    echo "0";
                }
                $link->close();
                ?>
            </tbody>
        </table>
        <a class="btn-floating btn-large waves-effect waves-light red" href="addProducts.php">+</a>
    </div>
</body>

</html>