<?php
include("connect.php");
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
    if (empty($_FILES['file']['name'])) {
        $fileUploadName = $_POST['oldimagename'];
    } else {
        if (isset($_POST['oldimagename'])) {
            unlink($_POST['oldimagename']);
        }
        $fileUploadName = "./uploads/" . $_FILES['file']['name'];
        $filTempName = $_FILES['file']['tmp_name'];
        move_uploaded_file($filTempName, $fileUploadName);
    }
    if (isset($_GET['carid'])) {
        $query = "update tbl_car set car_name='$carname',car_company='$carcompany',car_detail='$cardetail',car_price=$carprice,launch_year=$caryear,car_image='$fileUploadName' where car_id=$_GET[carid]";
    } else {
        $query = "insert into tbl_car values(0,'$carname','$carcompany','$cardetail',$carprice,$caryear,'$fileUploadName')";
    }
    if (mysqli_query($connect, $query)) {
        header("location: home.php?msg=success");
    } else {
        echo mysqli_error($connect);
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
        Welcome <?php echo $_SESSION['useremail']; ?> | <a href="logout.php">Logout</a><br />
        <a href="home.php">Back</a>
        <h2>-- <?php
                if (isset($_GET['carid']))
                    echo "Edit Car Details";
                else {
                    echo "Add Car Details";
                }
                ?> --</h2>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Enter Car Name:</td>
                    <td><input class="form-control" type="text" name="txtcarname" value="
                    <?php if (isset($_GET['carid'])) {
                        echo $data['car_name'];
                    } ?>" /></td>
                </tr>
                <tr>
                    <td>Enter Car Company Name:</td>
                    <td><input class="form-control" type="text" name="txtcarcompany"
                            value="<?php if (isset($_GET['carid'])) {
                                        echo $data['car_company'];
                                    } ?>" /></td>
                </tr>

                <tr>
                    <td>Enter Detail:</td>
                    <td><textarea class="form-control" cols="25" rows="3" name="txtdetail">
                        <?php if (isset($_GET['carid'])) {
                            echo $data['car_detail'];
                        } ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Enter Price:</td>
                    <td><input class="form-control" type="text" name="txtprice"
                            value="<?php if (isset($_GET['carid']))
                                        echo $data['car_price']; ?>" /></td>
                </tr>

                <tr>
                    <td>Enter Launch Year:</td>
                    <td><input class="form-control" type="text" name="txtyear"
                            value="<?php if (isset($_GET['carid']))
                                        echo $data['launch_year']; ?>" /></td>
                </tr>
                <tr>
                    <td>Select Image::</td>
                    <td><input class="form-control" type="file" name="file" />
                        <?php
                        if (isset($_GET['carid'])) {
                        ?>
                            <br />
                            <input type="hidden" name="oldimagename" value="<?php echo $data['car_image']; ?>" />
                            <img src="<?php echo $data['car_image']; ?>" width="100" height="100" />
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td><input class="btn btn-success" type="submit" name="btnsubmit" value="Submit" /></td>
                </tr>
            </table>
        </form>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>