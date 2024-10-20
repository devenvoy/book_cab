<?php
include ("connect.php");
session_start();
if (!isset($_SESSION['useremail'])) {
    header('location:login.php');
}

if (isset($_GET['carid'])) {
    $id = $_GET['carid'];
    $select = "select * from tbl_car where car_id=$id";
    $result = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($result);
}
if (isset($_POST['btnsubmit'])) {
    $carname = $_POST['txtcarname'];
    $carcompany = $_POST['txtcarcompany'];
    $cardetail = $_POST['txtdetail'];
    $carprice = $_POST['txtprice'];
    $caryear = $_POST['txtyear'];
    $query = "update tbl_car set car_name='$carname',car_company='$carcompany',car_detail='$cardetail',car_price=$carprice,launch_year=$caryear where car_id=$_GET[carid]";
    if (mysqli_query($connect, $query)) {
        header("location: home.php?upmsg=success");
    } else {
        echo mysqli_error($connect);
    }
}
?>
<html>

<head>
    <title>Car Project</title>
</head>

<body>
    <center>
        Welcome <?php echo $_SESSION['useremail']; ?> | <a href="logout.php">Logout</a><br />
        <a href="home.php">Back</a>
        <h2>-- Edit Car Details --</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Enter Car Name:</td>
                    <td><input type="text" name="txtcarname" value="<?php echo $data['car_name']; ?>" /></td>
                </tr>
                <tr>
                    <td>Enter Car Company Name:</td>
                    <td><input type="text" name="txtcarcompany" value="<?php echo $data['car_company']; ?>" /></td>
                </tr>

                <tr>
                    <td>Enter Detail:</td>
                    <td><textarea cols="25" rows="3" name="txtdetail"><?php echo $data['car_detail']; ?></textarea></td>
                </tr>

                <tr>
                    <td>Enter Price:</td>
                    <td><input type="text" name="txtprice" value="<?php echo $data['car_price']; ?>" /></td>
                </tr>

                <tr>
                    <td>Enter Launch Year:</td>
                    <td><input type="text" name="txtyear" value="<?php echo $data['launch_year']; ?>" /></td>
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