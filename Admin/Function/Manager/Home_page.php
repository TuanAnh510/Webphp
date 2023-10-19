<?php
include("Check_login.php");
?>


<!-- ======= Header ======= -->
<?php
include("Header.php");
?>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    

    

    
    <li class="nav-heading">Quản lí</li>
    <li class="nav-item" >
      <a class="nav-link collapsed" href="?thamso=sanpham" style="color: black">
    
        <span >Sản phẩm</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="?thamso=thuonghieu" style="color: black">
       
        <span>Thương hiệu</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="?thamso=danhmucsp" style="color: black">
        
        <span>Danh mục sản phẩm</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="?thamso=nhacungcap" style="color: black">
    
        <span>Nhà cung cấp</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="?thamso=khachhang" style="color: black">
    
        <span>Khách hàng</span>
      </a>
    </li><!-- End Register Page Nav -->

    <?php if($_SESSION["QuanLi"] == true) { ?>
      <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#" style="color: black">
        <span>Nhân viên</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?thamso=quantrivien" style="color: black">
            <span>Nhân viên quản trị</span>
          </a>
        </li>
        <li>
          <a href="?thamso=nhanviengiaohang" style="color: black">
           <span>Nhân viên giao hàng</span>
          </a>
        </li>

      </ul>
    </li><!-- End Forms Nav -->
      <?php }
    ?>


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" style="color: black">
      </i><span>Đơn hàng</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="?thamso=hangchoxacnhan">
           </i><span>Chờ xác nhận</span>
          </a>
        </li>
        <li>
          <a href="?thamso=hangdangxuli">
            </i><span>Đã xác nhận</span>
          </a>
        </li>
        <li>
          <a href="?thamso=giaohangthanhcong">
          </i><span>Đã giao</span>
          </a>
        </li>
      </ul>
    </li><!-- End Charts Nav -->
    <li class="nav-item" >
      <a class="nav-link collapsed" href="?thamso=thongke" style="color: black">
       
        <span>Thống kê</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
  <?php
  include("./Function/Manager/Control.php");
  ?>
</main><!-- End #main -->

<?php
include("Footer.php");
?>
<!-- ======= Footer ======= -->