<?php
// session_start();

// // Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }

require_once "./server/db_connect.php";
$productBrand = $productID = $productName = $productQty = $price = "";

if (isset($_POST["submit"])) {

    $productName = htmlspecialchars($_POST["productName"]);
    $productBrand = htmlspecialchars($_POST["productBrand"]);
    $productID = htmlspecialchars($_POST["productID"]);
    $productQty = htmlspecialchars($_POST["productQty"]);

    $price = htmlspecialchars($_POST["Price"]);


    $productName = $link->real_escape_string($_POST["productName"]);
    $productBrand = $link->real_escape_string($_POST["productBrand"]);
    $productID = $link->real_escape_string($_POST["productID"]);
    $productQty = $link->real_escape_string($_POST["productQty"]);
    $price = $link->real_escape_string($_POST["Price"]);


    $sql = "INSERT INTO Products (productID, productName, productBrand, productQty, Price) 
                    VALUES ('$productID', '$productName', '$productBrand', '$productQty', '$price')";

    //save into mysql db

    if ($link->query($sql)) {
        //success
        echo "success";
        header("Location: index.php");
    } else {
        //error
        echo "query error: " . $link->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Product</title>
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
    <?php include("./templates/navbar.php"); ?>
    <div class="container">
        <section class="container grey-text">
            <h4 class="center"> Add a Product</h4>
            <form action="addProducts.php" class="white" method="POST">

                <label for="productName">Product Name</label>
                <input type="text" name="productName" value="<?php echo $productName; ?>" required>

                <label for="productBrand">Product Brand</label>
                <input type="text" name="productBrand" value="<?php echo $productBrand; ?>" required>

                <label for="productID">Product ID</label>
                <input type="number" name="productID" value="<?php echo $productID; ?>" required>

                <label for="productQty">Product Ouantity</label>
                <input type="number" name="productQty" value="<?php echo $productQty; ?>" required>

                <label for="Price">Price</label>
                <input type="number" name="Price" value="<?php echo $price; ?>" required>

                <div class="center">
                    <input type="submit" value="submit" name="submit" class="btn brand z-depth-0">
                </div>
            </form>
        </section>
    </div>
</body>

</html>