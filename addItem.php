<?php session_start();
if (!isset($_SESSION["userName"])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
    <link rel="stylesheet" type="text/css" href="CSS/addItem.css">
    <link rel="stylesheet" type="text/css" href="CSS/footer.css">

    <title>Title</title>
</head>
<body>

<div class="GI grid-item-InnerHeader">
    <div class="GI grid-item-logo">
        <a href="home.php"><h1 class="TechieLogo">TechieLK</h1></a>
    </div>
    <div class="GI grid-item-Menu">
        <a href="#">Best Selling</a>
        <a href="#">Top Deals</a>
        <a href="#">Categories</a>
        <a href="#">Contact US</a>
    </div>
</div>

<div class="form-container">

    <table>
        <tbody>
        <form name="addItem" method="post" enctype="multipart/form-data">
            <tr>
                <th class="th1"></th>
                <th class="th2"></th>
            </tr>
            <tr>
                <td colspan="2"><h1 align="center">Add An Item</h1></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="txtProductName" id="txtProductName" required></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td><input type="text" name="txtBrand" id="txtBrand" required></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="txtCategory" id="txtCategory" required>
                        <option value="mouse">Mouse</option>
                        <option value="monitor">monitor</option>
                        <option value="laptop">laptop</option>
                        <option value="desktop">desktop</option>
                        <option value="keyboarad">keyboarad</option>
                        <option value="ram">ram</option>
                        <option value="vga">vga</option>
                        <option value="headphones">headphones</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td>Details</td>
                <td><input type="text" name="txtDetails" id="txtDetails" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="txtDescription" id="txtDescription" required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="txtPrice" id="txtPrice" required></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input class="inputFile" type="file" name="fileImage" id="fileImage" required></td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <button type="submit" id="btnSubmit" name="btnSubmit">Add Item</button>
                    <button type="reset" id="btnReset" name="btnReset">Clear</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="errorMessage">
                        <?php
                        if (isset($_POST['btnSubmit'])) {
                            $productName = $_POST['txtProductName'];
                            $brand = $_POST['txtBrand'];
                            $category = $_POST['txtCategory'];
                            $detail = $_POST['txtDetails'];
                            $description = $_POST['txtDescription'];
                            $price = $_POST['txtPrice'];
                            $image = "Images/products/".basename($_FILES["fileImage"]["name"]);
                            move_uploaded_file($_FILES["fileImage"]["tmp_name"], $image);

                            $con = mysqli_connect("localhost", "root", "kjkszpj", "techielk");
                            if (!$con) {
                                die ("Cant connect to Database Server");
                            }

                            $sql = "INSERT INTO techielk.products (pname, brand, category, Detail, Description, price, imgPath)VALUES ('" . $productName . "', '" . $brand . "', '" . $category . "', '" . $detail . "', '" . $description . "', " . $price . ", '" . $image . "');";

                            if (mysqli_query($con, $sql)) {
                                header('location:home.php');
                            } else {
                                echo "Something went wrong!";
                            }
                        }
                        ?>
                    </p>
                </td>
            </tr>

        </form>
        </tbody>
    </table>

</div>
</body>
</html>