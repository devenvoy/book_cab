<?php
include("connect.php");
session_start();
if (!isset($_SESSION['useremail'])) {
    header('location:login.php');
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete = "delete from tbl_car where car_id=$id";
    if (mysqli_query($connect, $delete)) {
        $msg = "Success: Record Deleted Successfully";
    } else {
        echo mysqli_error($connect);
    }
}
?>
<html>

<head>
</head>

<body>
    <center>
        Welcome <?php echo $_SESSION['useremail']; ?> | <a href="logout.php">Logout</a><br />
        <a href="addcar.php">Add New Car</a><br />
        <?php
        if (isset($_GET['msg']))
            echo "Success: Record saved successfully";
        if (isset($msg))
            echo $msg;
        ?>
        <br />
        <h2>-- Car Details --</h2>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Car name</th>
                <th>Car Company</th>
                <th>Car Detail</th>
                <th>Car Price</th>
                <th>Car Launch Year</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $i = 1;
            $select = "select * from tbl_car order by car_id desc";
            $result = mysqli_query($connect, $select);
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data[1]; ?></td>
                    <td><?php echo $data[2]; ?></td>
                    <td><?php echo $data[3]; ?></td>
                    <td><?php echo $data[4]; ?></td>
                    <td><?php echo $data[5]; ?></td>
                    <td><img src="<?php echo $data[6]; ?>" width="100" height="100" /></td>
                    <td><a href="addcar.php?carid=<?php echo $data[0]; ?>">Edit</a></td>
                    <td><a href="home.php?deleteid=<?php echo $data[0]; ?>"
                            onclick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>
    </center>

</body>

</html>