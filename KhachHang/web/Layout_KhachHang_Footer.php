<footer class="footer">
    <div class="container-footer">
        <div class="row-footer">
            <div class="footer-col">
                <a class="" href="index.php">
                    <img src="images/logopk.png" style="width: 150px; height: 120px; margin-left: 50px;" alt="">
                </a>
                <div style="margin-top: 20px;"><span style="font-weight: bolder;">Địa chỉ</span>: Số 32 Phường 2, Thành Phố Vĩnh Long</div>

            </div>
            <div class="footer-col">
                <h4>CỬA HÀNG</h4>
                <ul>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Về chúng tôi</a></li>


                </ul>
            </div>
            <div class="footer-col">
                <h4>GIÚP ĐỠ</h4>
                <ul>
                    <li><a href="#">Liên Hệ</a></li>

                </ul>
            </div>

            <div class="footer-col">
                <h4>MẠNG XÃ HỘI</h4>
                <div style="display: flex; gap: 20px;">
                    <a href="">
                        <img src="images/facebook.png" alt="" width="40px">

                    </a>
                    <a href="">
                        <img src="images/Icon_of_Zalo.png" alt="" width="40px">

                    </a>
                    <a href="">
                        <img src="images/youtube.png" alt="" width="40px">
                    </a>


                </div>

            </div>
        </div>
    </div>
</footer>

<div class="footer-left1" style="background-color: #ffffff; border-top: 4px solid #ececec;">
    <p style=" width:100%; height:30px;margin-top: 10px; text-align:center; color:black">@Copyright@PKStore – Cửa hàng phụ kiện điện thoại. </p>
</div>
<style>
    .container-footer {

        margin: auto;
    }

    .row-footer {
        display: flex;
        flex-wrap: wrap;
        width: 80%;
        margin: 0px auto;
    }

    ul {
        list-style: none;
    }

    .footer {
        background-color: #ffffff;
        padding: 70px 0;
        border-top: 5px solid #ececec;
        margin-top: 50px;
    }

    .footer-col {
        width: 20%;
        padding: 0 15px;
    }

    .footer-col h4 {
        font-size: 18px;
        color: #000000;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
    }

    .footer-col h4::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #fed700;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        font-size: 16px;
        text-transform: capitalize;
        color: #ffffff;
        text-decoration: none;
        font-weight: 300;
        color: #000000;
        display: block;
        transition: all 0.3s ease;
    }

    .footer-col ul li a:hover {
        color: #000000;
        padding-left: 8px;
        font-weight: bolder;
    }

    .footer-col .social-links a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: #000000;
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #000000;
        transition: all 0.5s ease;
    }

    .footer-col .social-links a:hover {
        color: red;
        background-color: #000000;
    }

    /*responsive*/
    @media(max-width: 767px) {
        .footer-col {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .footer-col {
            width: 100%;
        }
    }
</style>