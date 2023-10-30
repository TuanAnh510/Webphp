<body>
    <?php

    include("Layout_KhachHang_Header.php");

    if (isset($_GET['Ten']) && !empty($_GET['Ten'])) {
        $t = $_GET['Ten'];
        $query = "SELECT MaGiay,`TenGiay`, `GiaBan`,GiaBanCu, `AnhBia`,TenLoaiGiay FROM `sanpham`,danhmucsp where danhmucsp.MaLG= sanpham.MaLG and  GiaBan > 1000000 and HienThiSanPham=1 and (TenGiay like '%$t%' or GiaBan like '%$t%' )";
        $result = mysqli_query($con, $query);
        $row = mysqli_num_rows($result);
    } else {
        $query = "SELECT MaGiay,`TenGiay`, `GiaBan`,GiaBanCu, `AnhBia`,TenLoaiGiay FROM `sanpham`,danhmucsp where danhmucsp.MaLG= sanpham.MaLG and  GiaBan > 1000000  and HienThiSanPham=1";
        $result = mysqli_query($con, $query);
    }


    ?>
    <form action="" method="post">
        <!---start-wrap---->
        <!---start-header---->

        <!----//End-bottom-header---->
        <!---//End-header---->
        <!----start-image-slider---->
        <div class="img-slider">
            <div class="wrap">
                <ul id="jquery-demo">
                    <li>
                        <a href="#slide1">
                            <img src="images/baner1.jpg" alt="" />
                        </a>

                    </li>
                    <li>
                        <a href="#slide2">
                            <img src="images/baner2.jpg" alt="" />
                        </a>

                    </li>
                    <li>
                        <a href="#slide3">
                            <img src="images/baner3.jpg" alt="" />
                        </a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
        <!----//End-image-slider---->
        <!----start-price-rage--->

        <!----//End-price-rage--->
        <!--- start-content---->
        <div class="content">
            <div class="wrap">

                <style>
                    /* a {
                        flex-direction: column;
                        flex-wrap: wrap;
                    } */
                </style>
                <div class="title_product">
                    <p style="padding-top: 8px; padding-left: 10px;font-weight: bold">SẢN PHẨM HOT</p>
                </div>
                <div class="content-right">
                    <div class="product-grids" style="display:flex;flex-wrap: wrap;">

                        <script src="js/jstarbox.js"></script>
                        <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
                        <script type="text/javascript">
                            jQuery(function() {
                                jQuery('.starbox').each(function() {
                                    var starbox = jQuery(this);
                                    starbox.starbox({
                                        average: starbox.attr('data-start-value'),
                                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                                        ghosting: starbox.hasClass('ghosting'),
                                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                                        stars: starbox.attr('data-star-count') || 5
                                    }).bind('starbox-value-changed', function(event, value) {
                                        if (starbox.hasClass('random')) {
                                            var val = Math.random();
                                            starbox.next().text(' ' + val);
                                            return val;
                                        }
                                    })
                                });
                            });
                        </script>


                        <style>
                            s {
                                flex-direction: column;
                            }
                        </style>
                        <?php if (mysqli_num_rows($result) != 0) { ?>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <div style="cursor: pointer; display:flex;flex-direction: column;" onclick="location.href='details.php?MaGiay=<?php echo $row['MaGiay'] ?>';" class="product-grid fade">
                                    <div class="product-grid-head">
                                        <ul class="grid-social">
                                            <li><a class="facebook" href="#"><span> </span></a></li>
                                            <li><a class="twitter" href="#"><span> </span></a></li>
                                            <li><a class="googlep" href="#"><span> </span></a></li>
                                            <div class="clear"> </div>
                                        </ul>
                                        <div class="block">

                                        </div>
                                    </div>

                                    <div class="product-pic" style="display:flex;flex-direction: column;flex:1">

                                        <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" ?>
                                        <?php echo '<img class="hinh" src="../../Images/ImgProducts/' . $row['AnhBia'] . '" width="200px" height="150px">'; ?>
                                        <?php "</a>" ?>
                                        <style>
                                            .hinh {
                                                flex-shrink: 0;
                                            }
                                        </style>
                                        <p class="p" style="display:flex;flex-direction: column;flex:1">

                                            <?php echo "<a style='display:flex;flex-direction: column;flex:1'  href='details.php?MaGiay=" . $row['MaGiay'] . " '>" .  $row['TenGiay'] . "</a>" ?>

                                            <span style="color:blue;text-decoration-line:line-through;margin-top:auto"><?php echo number_format($row['GiaBanCu'], 0, ',', '.')  . ' VNĐ' ?></span>


                                        </p>
                                    </div>
                                    <div class="product-info" style="margin-top:auto">
                                        <div class="product-info-cust">
                                            <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" . 'Chi Tiết' . "</a>" ?>
                                        </div>
                                        <div class="product-info-price" style="">
                                            <?php echo "<a href='details.php?MaGiay=" . $row['MaGiay'] . " '>" . number_format($row['GiaBan'], 0, ',', '.') . 'Đ' . "</a>" ?>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>


                                </div>
                            <?php    } ?>
                        <?php } ?>
                    </div>



                </div>

                <!-- <div class="title_product">
                    <p style="padding-top: 8px; padding-left: 10px;font-weight: bold">SẢN PHẨM NAM</p>
                </div> -->
                <div class="content-right">
                    <div class="product-grids" style="display:flex;flex-wrap: wrap;">
                        <!--- start-rate---->
                        <script src="js/jstarbox.js"></script>
                        <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
                        <script type="text/javascript">
                            jQuery(function() {
                                jQuery('.starbox').each(function() {
                                    var starbox = jQuery(this);
                                    starbox.starbox({
                                        average: starbox.attr('data-start-value'),
                                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                                        ghosting: starbox.hasClass('ghosting'),
                                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                                        stars: starbox.attr('data-star-count') || 5
                                    }).bind('starbox-value-changed', function(event, value) {
                                        if (starbox.hasClass('random')) {
                                            var val = Math.random();
                                            starbox.next().text(' ' + val);
                                            return val;
                                        }
                                    })
                                });
                            });
                        </script>

                        <!---//End-rate---->
                        <!---caption-script---->
                        <!---//caption-script---->
                        <style>
                            s {
                                flex-direction: column;
                            }
                        </style>


                    </div>



                </div>




                <!---- //End-bottom-grids---->
                <!--- //End-content---->
                <!---start-footer---->
            </div>

        </div>
        <?php
        $sqlDanhMuc = "SELECT TenLoaiGiay FROM danhmucsp limit 3";
        $result = $con->query($sqlDanhMuc);
        $previousCategory = ""; // Biến này dùng để lưu giữ tên loại giày đã hiển thị trước đó

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tenLoaiGiay = $row["TenLoaiGiay"];
                $t = isset($_GET['Ten']) ? $_GET['Ten'] : ''; // Tránh lỗi nếu $_GET['Ten'] không được định nghĩa
                $query = "SELECT sp.* FROM sanpham sp INNER JOIN danhmucsp dm ON sp.MaLG = dm.MaLG WHERE dm.TenLoaiGiay = '$tenLoaiGiay' AND sp.HienThiSanPham = 1 AND (sp.TenGiay LIKE '%$t%') LIMIT 6";
                $sanPhamResult = $con->query($query);

                if ($sanPhamResult->num_rows > 0) {
                    // Kiểm tra xem tên loại giày đã được hiển thị trước đó chưa
                    if (empty($previousCategory) || $previousCategory != $tenLoaiGiay) {
                        // Nếu chưa, hiển thị tên loại giày
                        echo "<div class='title_product' style='width: 80%; margin:0px auto'>";
                        echo "<p style='padding-top: 10px; padding-left: 10px;font-weight: bold'>$tenLoaiGiay</p>";
                        echo "</div>";
                        echo "<div class='product-container' style='display: flex; flex-wrap: wrap;width: 80%;margin: 0px auto'>";
                    }

                    // Hiển thị thông tin sản phẩm
                    while ($rowSanPham = $sanPhamResult->fetch_assoc()) {
        ?>
                        <div style="cursor: pointer; display:flex;flex-direction: column;" onclick="location.href='details.php?MaGiay=<?php echo $rowSanPham['MaGiay'] ?>';" class="product-grid fade">
                            <div class="product-grid-head">
                                <ul class="grid-social">
                                    <li><a class="facebook" href="#"><span> </span></a></li>
                                    <li><a class="twitter" href="#"><span> </span></a></li>
                                    <li><a class="googlep" href="#"><span> </span></a></li>
                                    <div class="clear"> </div>
                                </ul>
                                <div class="block">

                                </div>
                            </div>

                            <div class="product-pic" style="display:flex;flex-direction: column;flex:1">

                                <?php echo "<a href='details.php?MaGiay=" . $rowSanPham['MaGiay'] . " '>" ?>
                                <?php echo '<img class="hinh" src="../../Images/ImgProducts/' . $rowSanPham['AnhBia'] . '" width="200px" height="150px">'; ?>
                                <?php "</a>" ?>
                                <style>
                                    .hinh {
                                        flex-shrink: 0;
                                    }
                                </style>
                                <p class="p" style="display:flex;flex-direction: column;flex:1">

                                    <?php echo "<a style='display:flex;flex-direction: column;flex:1'  href='details.php?MaGiay=" . $rowSanPham['MaGiay'] . " '>" .  $rowSanPham['TenGiay'] . "</a>" ?>

                                    <span style="color:blue;text-decoration-line:line-through;margin-top:auto"><?php echo number_format($rowSanPham['GiaBanCu'], 0, ',', '.')  . ' VNĐ' ?></span>


                                </p>
                            </div>
                            <div class="product-info" style="margin-top:auto">
                                <div class="product-info-cust">
                                    <?php echo "<a href='details.php?MaGiay=" . $rowSanPham['MaGiay'] . " '>" . 'Chi Tiết' . "</a>" ?>
                                </div>
                                <div class="product-info-price" style="">
                                    <?php echo "<a href='details.php?MaGiay=" . $rowSanPham['MaGiay'] . " '>" . number_format($rowSanPham['GiaBan'], 0, ',', '.') . 'Đ' . "</a>" ?>
                                </div>
                                <div class="clear"> </div>
                            </div>


                        </div>
        <?php
                    }

                    echo "</div>"; // Đóng product-container
                    $previousCategory = $tenLoaiGiay; // Lưu giữ tên loại giày để so sánh với các loại tiếp theo
                }
            }
        } else {
            echo "Không có sản phẩm nào trong cơ sở dữ liệu.";
        }
        ?>




        <?php include("Layout_KhachHang_Footer.php"); ?>

    </form>

</body>

</html>