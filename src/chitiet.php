<?php include 'header.php' ?>

<div class="main-content">
    <div class="container">
        <br>
        <h1><b>Thông tin chi tiết Bệnh Nhân</b></h1>

        <br>

        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM patient WHERE patientid=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $ten1 = $row['firstname'];
                $ho1 = $row['lastname'];
                $ngaysinh1 = $row['dateofbirth'];
                $gioitinh1 = $row['gender'];
                $phone1 = $row['mobile'];
                $email1 = $row['email'];
                $can1 = $row['height'];
                $cao1 = $row['weight'];
                $mau1 = $row['blood_type'];
                $ngaylapso1 = $row['created_on'];
                $ngaycapnhat1 = $row['modified_on'];
            } else {
                $_SESSION['no-office-found'] = "<div class='error'>Not Found.</div>";
                header('location:index.php');
            }
        } else {
            header('location:index.php');
        }

        ?>

        <form action="chitiet.php" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Họ đệm: </td>
                    <td>
                        <input type="text" name="ho" value="<?php echo $ho1; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tên: </td>
                    <td>
                        <input type="text" name="ten" value="<?php echo $ten1; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh: </td>
                    <td>
                        <input type="text" name="ngaysinh" value="<?php echo $ngaysinh1; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Giới Tính: </td>
                    <td>
                        <input type="text" name="gioitinh" value="<?php if ($gioitinh1 == 1) echo 'Nữ';
                                                                    else echo 'Nam'; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="email" value="<?php echo $email1; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Số điện thoại: </td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $phone1; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Cân nặng: </td>
                    <td>
                        <input value="<?php echo $can1; ?>" type="text" name="can">
                    </td>
                </tr>

                <tr>
                    <td>Chiều cao: </td>
                    <td>
                        <input type="text" name="cao" value="<?php echo $cao1; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Nhóm máu: </td>
                    <td>
                        <input type="text" name="mau" value="<?php echo $mau1; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ngày lập sổ: </td>
                    <td>
                        <input type="text" name="ngaylapso" value="<?php echo $ngaylapso1; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Ngày cập nhật: </td>
                    <td>
                        <input type="text" name="ngaycapnhat" value="<?php echo $ngaycapnhat1; ?>">
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="2">
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Sửa" class="btn-warning">
                        <input type="submit" name="submit1" value="Xóa" class="btn-danger">
                        <br>
                    </td>
                </tr>


            </table>

        </form>
        <br>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $phone = $_POST['phone'];
    $ho = $_POST['ho'];
    $email = $_POST['email'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $can = $_POST['can'];
    $cao = $_POST['cao'];
    $mau = $_POST['mau'];
    $ngaylapso = $_POST['ngaylapso'];
    $ngaycapnhat = $_POST['ngaycapnhat'];

    $sql2 = "UPDATE patient SET 
                    firstname = '$ten',
                    lastname = '$ho',
                    dateofbirth = '$ngaysinh',
                    if ($gioitinh == 'Nữ') gender =1 else gender =0,
                    mobile = '$phone',
                    email =  '$email,
                    height = '$cao',
                    weight = '$can',
                    blood_type = '$mau',
                    created_on = '$ngaylapso',
                    modified_on = '$ngaycapnhat'
                    WHERE patientid=$id
                ";

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //4. REdirect to Manage Category with MEssage
    //CHeck whether executed or not
    if ($res2 == true) {
        //Category Updated
        $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
        header('Location: index.php');
    } else {
        //failed to update category
        echo "Chưa sửa thành công!";
    }
}

?>

<?php
if (isset($_POST['submit1'])) {
    $sql = "DELETE FROM patient WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['delete'] = "<div class='success'>Deleted Successfully.</div>";
        header('location: index.php');
    } else {
        echo 'Bạn chưa xóa được';
    }
}
?>

</body>

</html>