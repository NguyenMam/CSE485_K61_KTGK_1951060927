<?php include 'header.php' ?>

<br>

<form>
    <div class="container">
    <br>
    <a href="them.php" class="btn btn-primary"> Thêm Bệnh Nhân</a>
    <br><br>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th scope="col" style="width:12%">Họ đệm bệnh nhân </th>
                    <th scope="col" style="width:8%">Tên</th>
                    <th scope="col" style="width:7%">Số điện thoại</th>
                    <th scope="col" style="width:7%">Giới tính</th>
                    <th scope="col" style="width:10%">Ngày sinh</th>
                    <th scope="col" style="width:10%">Ghi Chú</th>

                </tr>

                <?php

                $sql = "SELECT * FROM patient";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['patientid']; 
              ?>

                        <tr>
                            <td><?php echo $row['lastname'] ?>. </td>
                            <td><?php echo $row['firstname'] ?>. </td>
                            <td><?php echo $row['mobile'] ?>. </td>
                            <td><?php if ($row['gender'] == 1) echo 'Nữ';
                                else echo 'Nam'; ?>. </td>
                            <td><?php echo $row['dateofbirth'] ?>. </td>
                            <td>
                                <a href="chitiet.php?id=<?php echo $id; ?>" class="btn btn-success">Chi tiết</a>
                            </td>


                        </tr>

                <?php

                    }
                }

                ?>

            </table>
        </div>
    </div>
</form>
</body>

</html>