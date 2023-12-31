<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Trang Quản Trị</title>

  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  </script>
  <!----webfonts---->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!----//webfonts---->
  <!----start-alert-scroller---->
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#demo').hide();
      $('.vticker').easyTicker();
    });
  </script>
  <!----start-alert-scroller---->
  <!-- start menu -->
  <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="js/megamenu.js"></script>
  <script>
    $(document).ready(function() {
      $(".megamenu").megamenu();
    });
  </script>
  <script src="js/menu_jquery.js"></script>
  <!-- //End menu -->
  <!---slider---->
  <link rel="stylesheet" href="css/slippry.css">
  <script src="js/jquery-ui.js" type="text/javascript"></script>
  <script src="js/scripts-f0e4e0c2.js" type="text/javascript"></script>
  <script>
    jQuery('#jquery-demo').slippry({
      // general elements & wrapper
      slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
      // options
      adaptiveHeight: false, // height of the sliders adapts to current slide
      useCSS: false, // true, false -> fallback to js if no browser support
      autoHover: false,
      transition: 'fade'
    });
  </script>
  <!----start-pricerage-seletion---->
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <script type='text/javascript'>
    //<![CDATA[
    $(window).load(function() {
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [100, 400],
        slide: function(event, ui) {
          $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
      });
      $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values",
        1));

    }); //]]>
  </script>
  <!----//End-pricerage-seletion---->
  <!---move-top-top---->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1200);
      });
    });
  </script>
  <!---//move-top-top---->

</head>

<body>
  <?php

  include("connection.php");

  $query1 = "SELECT * FROM danhmucsp";
  $result1 = mysqli_query($con, $query1);
  ?>

  <!---start-wrap---->
  <!---start-header---->
  <div class="header">
    <div class="top-header" style="padding: 5px 0px;position: fixed;z-index:100000000;width:100%;">
      <div class="" style="width:80%; margin: 0px auto">

        <div class="top-header-center">
          <div class="top-header-center-alert-left">
            <h3>CỬA HÀNG PHỤ KIỆN ĐIỆN THOẠI PKStore</h3>
          </div>
          <div class="top-header-center-alert-right">
            <div class="vticker">
              <ul>
                <li>Cung cấp những mặt hàng tốt nhất!!! <label>Hãy đến với chúng tôi.</label></li>
              </ul>
            </div>
          </div>
          <div class="clear"> </div>
        </div>
        <div class="top-header-right">
          <ul>
            <?php
            if (isset($_SESSION['MaKH'])) {
              $MaKH = $_SESSION["MaKH"];
              $qr = "select * from KhachHang where MaKH = '$MaKH'";
              $qr_run = mysqli_query($con, $qr);
              $r = mysqli_fetch_array($qr_run);
            ?>
              <li class="dropdown o">
                <img src="./imgKH/<?php echo $r["AnhKH"] ?>" alt="<?php echo $r["AnhKH"] ?>" srcset="" class="custom-image">
                <button class="nut_dropdown"><?php echo $r["HoTen"] ?></button>
                <div class="noidung_dropdown">
                  <a style="color:black;" href="profileKH.php">Xem thông tin</a>
                  <a style="color:black;" href="orderlist.php">Xem đơn hàng</a>
                  <a style="color:black;" href="history_Cart.php">Xem lịch sử</a>
                  <a style="color:black" href="changepwd.php">Đổi mật khẩu</a>
                  <a style="color:black" href="logout.php">Đăng xuất</a>
                </div>

              </li>
            <?php
            } else {
            ?>
              <li><a href="login.php" style="font-size: 13px;">Đăng nhập</a><span> </span></li>
              <li><a href="register.php" style="font-size: 13px;">Đăng ký</a></li>
            <?php
            }
            ?>
          </ul>
        </div>
        <div class=" clear">
        </div>
      </div>
    </div>
    <!----start-mid-head---->
    <div class="mid-header" style="padding-top: 40px;">
      <div class="" style="width:80%; margin: 0px auto">
        <div class="mid-grid-left">
          <a class="" href="index.php">
            <img src="images/logopk.png" style="width: 100px; height: 80px" alt="">

          </a>
        </div>
        <div class="mid-grid-right" style="display: flex; gap: 40px;">
          <div style="margin-left: 50px;">
            <form>
              <input type="text" name="Ten" value="<?php if (isset($_GET['Ten'])) echo $_GET['Ten'];  ?>" placeholder="Tìm kiếm" />
            </form>
          </div>

          <div class="top-header-left">
            <ul>
              <!---cart-tonggle-script---->
              <script type="text/javascript">
                $(function() {
                  var $cart = $('#cart');
                  $('#clickme').click(function(e) {
                    e.stopPropagation();
                    if ($cart.is(":hidden")) {
                      $cart.slideDown("slow");
                    } else {
                      $cart.slideUp("slow");
                    }
                  });
                  $(document.body).click(function() {
                    if ($cart.not(":hidden")) {
                      $cart.slideUp("slow");
                    }
                  });
                });
              </script>
              <!---//cart-tonggle-script---->
              <?php
              if (isset($_SESSION['MaKH'])) {
                $MaKH = $_SESSION['MaKH'];
                $countQuery = "SELECT COUNT(id) FROM giohang WHERE MaKH = '$MaKH'";
                $qr_count = mysqli_query($con, $countQuery);
                if ($qr_count) {
                  $countRow = mysqli_fetch_row($qr_count);
                  if ($countRow[0] > 0) {
              ?>
                    <a class="" style="position: relative;" href="cart2.php">
                      <span id="clickme">
                        <img src="./images/shopping-bag.png" alt="" style="width: 30px; height: 30px;margin-top: 5px;">
                      </span>
                      <p class="badge"><?php echo ($countRow[0]) ?></p>
                    </a>
                  <?php
                  } else {
                  ?>
                    <a class="" style="position: relative;" href="cart2.php">
                      <span id="clickme">
                        <img src="./images/shopping-bag.png" alt="" style="width: 30px; height: 30px;margin-top: 5px;">
                      </span>
                    </a>
                  <?php
                  }
                  ?>

                <?php
                } else {
                ?>
                  <a class="" style="position: relative;" href="cart2.php">
                    <span id="clickme">
                      <img src="./images/shopping-bag.png" alt="" style="width: 30px; height: 30px;margin-top: 5px;">
                    </span>
                  </a>
                <?php
                }
              } else {
                ?>
                <a class="" style="position: relative;" href="cart2.php">
                  <span id="clickme">
                    <img src="./images/shopping-bag.png" alt="" style="width: 30px; height: 30px;margin-top: 5px;">
                  </span>
                </a>
              <?php
              }
              ?>


            </ul>
          </div>

        </div>
        <div class="clear"> </div>
      </div>
    </div>
    <!----//End-mid-head---->
    <!----start-bottom-header---->
    <div class="header-bottom">
      <div style="margin-bottom:20px ;">
        <ul class="megamenu skyblue">
          <li class="grid"><a class="color2" href="index.php">TRANG CHỦ</a>
          <li class="grid"><a class="color2" href="LOAISANPHAM.php">SẢN PHẨM</a>
          <li class="grid"><a class="color2" href="VeChungToi.php">VỀ CHÚNG TÔI</a>
          <li class="grid"><a class="color2" href="contact.php">LIÊN HỆ</a>
        </ul>
      </div>
    </div>

  </div>
  <!----//End-bottom-header---->
  <!---//End-header---->
  <!----start-image-slider---->
  <div class="clear"> </div>
  <!----//End-image-slider---->
  <!----start-price-rage--->

  <!----//End-price-rage--->
  <!--- start-content---->
  <div></div>
  <div></div>


</body>

</html>
<style>
  /* Nút Dropdown*/
  .nut_dropdown {
    background: black;
    color: white;

    font-size: 16px;
    border: none;
  }

  /* Thiết lập vị trí cho thẻ div với class dropdown*/
  .dropdown {
    position: absolute;
    display: inline-block;
    z-index: 100000;
  }

  /* Nội dung Dropdown */
  .noidung_dropdown {
    /*Ẩn nội dụng các đường dẫn*/
    display: none;
    position: absolute;
    color: black;
    background: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);


  }


  /* Thiết kế style cho các đường dẫn tronng Dropdown */
  .noidung_dropdown a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;

  }

  /* thay đổi màu background khi hover vào đường dẫn */
  .noidung_dropdown a:hover {
    background-color: #ddd;

  }

  /* hiển thị nội dung dropdown khi hover */

  /* Thay đổi màu background cho nút khi được hover */
  .dropdown:hover .noidung_dropdown {
    display: block;
    z-index: 1000000000000;
  }

  /*Dùng Để hiển thị nội dung*/
  .hienThi {
    display: block;
  }

  .o {

    top: 12px;
    position: absolute;
    right: 230px;
  }

  .o img {
    width: 20px;
    height: 20px;
    border-radius: 50%;

  }
</style>