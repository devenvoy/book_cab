<?php
include("connect.php");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <center>
        <h1>Car Project</h1>
        <a href="login.php" class="btn btn-link">Login</a>
        <h2>-- Registration --</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Enter First Name:</td>
                    <td><input class="form-control" type="text" name="txtfirstname" /></td>
                </tr>
                <tr>
                    <td>Enter Last Name:</td>
                    <td><input class="form-control" type="text" name="txtlastname" /></td>
                </tr>

                <tr>
                    <td>Enter Address:</td>
                    <td><textarea class="form-control" cols="25" rows="3" name="txtaddress"></textarea></td>
                </tr>

                <tr>
                    <td>Enter Mobile No:</td>
                    <td><input class="form-control" type="text" name="txtmobile" /></td>
                </tr>

                <tr>
                    <td>Enter Email:</td>
                    <td><input class="form-control" type="text" name="txtemail" /></td>
                </tr>

                <tr>
                    <td>Enter Password:</td>
                    <td><input class="form-control" type="password" name="txtpassword" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" name="btnsubmit" value="Submit" />
                        <input class="btn btn-success" type="reset" name="btnReset" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>