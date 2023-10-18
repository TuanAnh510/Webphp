<?php
include("./Function/Manager/Check_login.php");
include("./Function/Sup/Success.php");
include("./Function/PendingOrders/Handle.php");
?>

<?php
$query = "SELECT *,Sum(chitietdathang.SoLuong) as 'TongSanPham' FROM dondathang join KhachHang on dondathang.MaKH = KhachHang.MaKH join chitietdathang ON chitietdathang.SoDH = dondathang.SoDH  WHERE dondathang.TinhTrangGiaoHang = 'Chờ xác nhận'  GROUP BY dondathang.SoDH";
$query_run = mysqli_query($conn, $query);
?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">




<div class="container-fluid ">

    <div class="card p-3">
        <h1 class="font-weight-bold text-center"> ĐƠN ĐẶT HÀNG CHỜ XÁC NHẬN</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <?php
            $index = 1;
            ?>
            <table id="data-table" class="table table-bordered table-secondary table-hover display">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Số đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số sản phẩm</th>
                        <th>Ngày đặt</th>
                        <th>Địa chỉ giao</th>
                        <th>Điện thoại</th>
                        <th>Tình trạng</th>
                        <th>Chức năng </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query_run) != 0) {
                        while ($row = mysqli_fetch_array($query_run)) { ?>
                            <tr>
                                <td> <?php echo $index;
                                        $index++; ?></td>
                                <td> <?php echo $row['SoDH']; ?></td>
                                <td> <?php echo $row['HoTen']; ?> </td>
                                <td> <?php echo $row['TongSanPham']; ?> </td>
                                <td> <?php echo $row['NgayDat']; ?> </td>
                                <td> <?php echo $row['DiaChiGiaoHang']; ?> </td>
                                <td> <?php echo $row['DienThoaiKH']; ?> </td>
                                <td> <?php echo $row['TinhTrangGiaoHang']; ?> </td>


                                <td>
                                    <!-- DETAIL  -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_Detail<?php echo $row['SoDH']; ?>">
                                        Chi tiết
                                    </button>
                                    <div class="modal fade" id="Modal_Detail<?php echo $row['SoDH']; ?>" tabindex="-1" aria-labelledby="LabelModal" aria-hidden="true">
                                        <div class="modal-dialog modal-xl ">
                                            <!-- modal-xl -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="LabelModal">Chi tiết</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <?php $query_run_chitiet = mysqli_query($conn, "select * from chitietdathang JOIN dondathang ON chitietdathang.SoDH = dondathang.SoDH join giay ON chitietdathang.MaGiay = giay.MaGiay where chitietdathang.SoDH = '$row[SoDH]'"); ?>
                                                    <table class="table table-bordered table-secondary table-hover display text-center">
                                                        <thead class="thead-dark">
                                                            <th>#</th>
                                                            <th>Số đơn hàng</th>
                                                            <th>Mã giày</th>
                                                            <th>Tên giày</th>
                                                            <th>Size</th>
                                                            <th>Màu</th>
                                                            <th>Số lượng</th>
                                                            <th>Đơn giá</th>
                                                            <th>Tổng tiền</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $index1 = 1;
                                                            ?>
                                                            <?php if (mysqli_num_rows($query_run_chitiet) != 0) {
                                                                while ($r = mysqli_fetch_array($query_run_chitiet)) { ?>
                                                                    <tr>
                                                                        <td> <?php echo $index1;
                                                                                $index1++; ?></td>
                                                                        <td><?php echo $r["SoDH"] ?></td>
                                                                        <td><?php echo $r["MaGiay"] ?></td>
                                                                        <td><?php echo $r["TenGiay"] ?></td>
                                                                        <td><?php echo $r["Sizegiay"] ?></td>
                                                                        <td><?php echo $r["Maugiay"] ?></td>
                                                                        <td><?php echo $r["SoLuong"] ?></td>
                                                                        <td><?php echo number_format($r["DonGia"], 0, ',', '.'); ?></td>
                                                                        <td><?php echo number_format($r["SoLuong"] * $r["DonGia"], 0, ',', '.'); ?></td>

                                                                    </tr>

                                                            <?php  }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php $qr_tongtien = mysqli_query($conn, "select *,sum(SoLuong * DonGia) as 'tong' from chitietdathang where SoDH = '$row[SoDH]'");

                                                    $row_tongtien = mysqli_fetch_array($qr_tongtien);
                                                    ?>

                                                    <p style="font-size:20px ;" class="text-end">Tổng tiền: <strong class="text-primary"><?php echo number_format($row_tongtien["tong"], 0, ',', '.'); ?></strong> đồng</p>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END-DETAIL  -->
                                    <form  method="post">
                                        <input type="hidden" name="sodh" value="<?php echo $row["SoDH"] ?>">
                                         <button type="submit" name="getProSuccess" class="btn btn-danger btn-sm">
                                        Xác nhận
                                    </button>
                                    </form>
                                 

                                    <!-- EDIT  -->



                                    <!-- END-DELETE  -->

                                </td>
                              
                            </tr>

                    <?php  }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>



</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
            language: {
                lengthMenu: 'Hiển thị _MENU_ trường một trang',
                zeroRecords: 'Không tìm thấy dữ liệu !',
                info: 'Đang hiển thị trang _PAGE_ / _PAGES_',
                infoEmpty: 'Không có bản ghi nào',
                infoFiltered: '(được lọc từ _MAX_ bản ghi)',
                "search": "Tìm kiếm:",
                searchPlaceholder: "Nhập từ khoá !",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Sau",
                    "previous": "Trước"
                },
            },
        });
    });
</script>





<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
</script>
