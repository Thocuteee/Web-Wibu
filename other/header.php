<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "../other/connect.php";
?>




<div class="header">
        <div class="header-1">
            <ul>
                <li class="header-1-left">
                    <b>
                        ĐAM MÊ KHÔNG CHỈ Ở TRÊN MÀN ẢNH
                    </b>
                </li>

                <div class="header-1-mid">
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        CONTACT
                        <span class="tooltip">
                            mohinh@gmail.com
                        </span>
                    </li>
    
                    <li>
                        <i class="fa-regular fa-clock"></i>
                        8:00 - 22:00
                        <span class="tooltip">
                            8:00 - 22:00
                        </span>
                    </li>
    
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        0902846205
                        <span class="tooltip">
                            0902846205
                        </span>
                    </li>
                </div>

                <li class="header-1-right">
                    <b>
                        SHOP MÔ HÌNH ANIME
                    </b>
                </li>
            </ul>
        </div>

        <div class="header-2">
            <div class="header-2-nav">
                <div class="logo">
                    <img src="/Home/img/logo.png" alt="logo">
                </div>
    
                <div class="search">
                    <input class="inSearch" name="text" placeholder="Tìm kiếm..." type="search">
                </div>  
    
                <div class="shop-cart">
                    GIỎ HÀNG 
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
    
                <div class="user">
                <i class="fa-solid fa-user"></i>
                <?php if (isset($_SESSION['fullname'])): ?>
                    <span class="user-menu"><?php echo htmlspecialchars($_SESSION['fullname']); ?></span>
                    <div class="user-other">
                        <a href="#">Thông tin tài khoản</a>
                        <a href="../login&signin/logout.php">Đăng xuất</a>
                    </div>
                <?php else: ?>
                    <span class="user-menu">Tài khoản</span>
                    <div class="user-other">
                        <a href="../login&signin/login.php">Đăng nhập</a>
                        <a href="../login&signin/sign-in.php">Đăng ký</a>
                    </div>
                <?php endif; ?>
            </div>
            </div>
    
            <div class="menu-other">
                <div class="menu">
                    <div class="menu-header">
                        <i class="fa-solid fa-bars"></i>
                        DANH MỤC SẢN PHẨM
                    
                    </div>
    
                    <ul class="menu-list">
                        <li class="submenu">
                            Mô Hình Anime
                            <i class="fa-solid fa-caret-right"></i>
                            <ul class="submenu-list">
                                <li>Mô hình One Piece</li>
                                <li>Mô hình Dragon Ball</li>
                                <li>Mô hình Naruto</li>
                                <li>Kimetsu no Yaiba</li>
                                <li>Mô Hình Jujutsu Kaisen</li>
                                <li>Bleach</li>
                            </ul>
                        </li>
                        <li>Nendoroid</li>
                        <li>Bộ Figure</li>
                    </ul>
                </div>
                <div class="other">
                    <ul>
                        <li>
                            <a href="/Home/home.php">TRANG CHỦ</a>
                        </li>
        
                        <li>
                            <a href="#">TIN TỨC</a>
                        </li>
        
                        <li>
                            <a href="#">
                                GIỚI THIỆU
                            </a>
                        </li>
        
                        <li>
                            <a href="#">LIÊN HỆ</a>
                        </li>
        
                        <li>
                            <a href="#">CẨM NANG</a>
                        </li>
        
                        <li>
                            <a href="#">KHUYẾN MÃI</a>
                        </li>
                    </ul>
    
                </div>   
            </div>
        </div>
    </div>
