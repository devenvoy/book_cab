<?php
include ("connect.php");

if (isset($_POST['btnsubmit'])) {
    $fname = $_POST['txtfirstname'];
    $lname = $_POST['txtlastname'];
    $address = $_POST['txtaddress'];
    $mobile = $_POST['txtmobile'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    
    $insert = "insert into tbl_registration values(0,'$fname','$lname','$address',$mobile,'$email','$password')";
    if (mysqli_query($connect, $insert))
        echo "Success: Registeration done successfully";
    else {
        echo "Error" or die(mysqli_error($connect));
    }
}
?>
<html>

<head>
    <title>Car Project</title>
</head>

<body>
    <center>
        <h1>Car Project</h1>
        <a href="login.php">Login</a>
        <h2>-- Registration --</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Enter First Name:</td>
                    <td><input type="text" name="txtfirstname" /></td>
                </tr>
                <tr>
                    <td>Enter Last Name:</td>
                    <td><input type="text" name="txtlastname" /></td>
                </tr>

                <tr>
                    <td>Enter Address:</td>
                    <td><textarea cols="25" rows="3" name="txtaddress"></textarea></td>
                </tr>

                <tr>
                    <td>Enter Mobile No:</td>
                    <td><input type="text" name="txtmobile" /></td>
                </tr>

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