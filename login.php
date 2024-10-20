<?php
session_start();
include ('connect.php');

function login($email, $password)
{
    global $connect;
    $select = "select * from tbl_registration where email='$email' and password='$password'";
    $result = mysqli_query($connect, $select);
    $checkRecord = mysqli_num_rows($result);
    if ($checkRecord > 0) {
        $_SESSION['useremail'] = $email;
        header("location: home.php");
    } else {
        $error = "Either email or password wrong";
        return $error;
    }
}
if (isset($_POST['btnsubmit'])) {
    $error = login($_POST['txtemail'], $_POST['txtpassword']);
}
?>
<html>

<head>
    <title>Login program</title>
</head>

<body>
    <center>

        <h1>Car Project</h1>
        <a href="index.php">Registration</a>
        <h2>Login</h2>
        <p style="color:red;"><?php if (isset($error))
            echo $error; ?></p>
        <form method="post">
            <table>
                <tr>
                    <td>Enter Email:</td>
                    <td><input type="text" name="txtemail" /></td>
                </tr>
                <tr>
                    <td>Enter Password:</td>
                    <td><input type="password" name="txtpassword" /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Submit" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>