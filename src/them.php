<?php include 'header.php' ?>

<main class="container">
    <br>
        <h2>Thêm Bệnh Nhân</h2>
        <form action="them.php" method="post">
        <table class="tbl-30">
                <tr>
                    <td>Họ đệm: </td>
                    <td>
                        <input type="text" name="ho" value="">
                    </td>
                </tr>
                <tr>
                    <td>Tên: </td>
                    <td>
                        <input type="text" name="ten" value="">
                    </td>
                </tr>
                <tr>
                    <td>Ngày sinh: </td>
                    <td>
                        <input type="text" name="ngaysinh" value="">
                    </td>
                </tr>
                <tr>
                    <td>Giới Tính: </td>
                    <td>
                        <input type="text" name="gioitinh" value="">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="email" value="">
                    </td>
                </tr>

                <tr>
                    <td>Số điện thoại: </td>
                    <td>
                        <input type="text" name="phone" value="">
                    </td>
                </tr>

                <tr>
                    <td>Cân nặng: </td>
                    <td>
                        <input value="" type="text" name="can">
                    </td>
                </tr>

                <tr>
                    <td>Chiều cao: </td>
                    <td>
                        <input type="text" name="cao" value="">
                    </td>
                </tr>

                <tr>
                    <td>Nhóm máu: </td>
                    <td>
                        <input type="text" name="mau" value="">
                    </td>
                </tr>
                <tr>
                    <td>Ngày lập sổ: </td>
                    <td>
                        <input type="text" name="ngaylapso" value="">
                    </td>
                </tr>
                <tr>
                    <td>Ngày cập nhật: </td>
                    <td>
                        <input type="text" name="ngaycapnhat" value="">
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" name="submit" value="Thêm" class="btn-danger">
                        <br>
                    </td>
                </tr>


            </table>

        </form>
</main>
<br>

<?php
 if(isset($_POST['submit']))
 {
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

    // Bước 02:
    $sql = "INSERT INTO patient(o_name, o_phone, o_fax, o_email, o_web, o_address, o_parent)
    VALUES ('$name','$phone','$fax','$email','$web','$diachi','$office')";
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        $_SESSION['add'] = "<div class='success'>Updated Successfully.</div>";
        header("Location: index.php");
    }else{
        echo "Lỗi!";
    }

    //Bước 04: Đóng kết nối
    mysqli_close($conn);

 }
?>
