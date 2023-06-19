<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CSS/register.css" rel="stylesheet" type="text/css">
    <title>Login</title>

</head>
<body>
<div class="triangle"></div>
<h1 class="logo">TECHIE.LK</h1>
<div class="baseContainer">

    <div class="form-container">

        <table>
            <tbody>
            <form name="register" method="post" action="register.php">
                <tr>
                    <th class="th1"></th>
                    <th class="th2"></th>
                </tr>
                <tr>
                    <td colspan="2"><h1 align="center">Create An Account</h1></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="txtName" id="txtName" required></td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="txtFullName" id="txtFullName" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="txtEmail" id="txtEmail" required></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="txtAddress" id="txtAddress" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td class="radio">
                        <input type="radio" id="male" name="gender" value="male" checked><label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"><label for="female">Female</label>
                    </td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="number" name="txtPhone" id="txtPhone" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="txtPassword" id="txtPassword" required></td>
                </tr>
                <tr>
                    <td>Re-Enter Password</td>
                    <td><input type="password" name="txtPassword2" id="txtPassword2" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <button type="submit" id="btnSubmit" name="btnSubmit">Register</button>
                        <button type="reset" id="btnReset" name="btnReset">Clear</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="errorMessage">
                            <?php
                            if (isset($_POST["btnSubmit"])) {
                                $name = $_POST["txtName"];
                                $fullName = $_POST["txtFullName"];
                                $email = $_POST["txtEmail"];
                                $address = $_POST["txtAddress"];
                                $gender = $_POST["gender"];
                                $phone = $_POST["txtPhone"];
                                $password = $_POST["txtPassword"];
                                $password1 = $_POST["txtPassword2"];

                                if ($password == $password1){
                                    $con = mysqli_connect("localhost", "root", "kjkszpj", "techielk");
                                    if (!$con) {
                                        die ("Cant connect to Database Server");
                                    }

                                    $sql = "INSERT INTO user (Name, fullName, address, gender, pno, email, password)VALUES ('".$name."', '".$fullName."', '".$address."', '".$gender."', ".$phone.", '".$email."', '".$password."');";
                                    mysqli_query($con, $sql);

                                    header('Location:login.php');
                                } else {
                                    echo "Password Doesn't Match!";
                                }

                                }


                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="login.php">
                            <p>Already Have an Account? Login</p>
                        </a>
                    </td>
                </tr>
            </form>
            </tbody>
        </table>

    </div>
</div>


</body>
</html>