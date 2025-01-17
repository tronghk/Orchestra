<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best-Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="/Orchestra/admin/admin/css/main.css">

</head>
<body>
    <div class="container-fluid nav_container">
            <div class="menu">
                <div class="menu-header">
                    <a href="./QuanLy.php" class="menu-header-logo"> <img src="/Orchestra/admin/image_web/logo.png" class="menu-logo" alt=""></a>
                </div>
                <div class="menu-bar">
                <div class="menu-author w-100 p-3 rounded">
                        <div class="author-image">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 48px;"
                            alt="Avatar" />
                        </div>
                        <div class="author-inf">
                            <p class="author-name si">DoAnMonHoc</p>
                            <p class="author-em">Admin</p>
                        </div>

                </div>
                <div class="menu-content">
                        <ul class="list-group nav-menu-list">
                            <li class="list-group-item menu-item">E-Commerce</li>
                            <li class="list-group-item menu-item rounded-pill">
                                <a href="ThongKe.php" class="menu-icon-sub rounded-pill" id="tag-statistical">
                                    <span class="rounded-circle icon-link"><i class="bi bi-bar-chart "></i></span>
                                    <span class="icon-title">Thống kê</span>
                                </a>
                            </li>

                            <li class="list-group-item menu-item" onclick="openTab(id)" id="tag-order">
                                <a href="#" class="menu-icon-sub">
                                    <span class="rounded-circle icon-link"><i class="bi bi-music-note"></i></span>
                                    <span class="icon-title">Nhạc</span>
                                    <span class="icon-link"> <i class="icon-next bi bi-arrow-right"></i></span>
                                </a>
                                <ul class="list-group display-tag-none" myname="False">
                                    <li class="list-group-item menu-item rounded-pill "id="type">
                                        <a href="LoaiNhac.php"  class="menu-icon-sub rounded-pill">
                                            <span class="icon-title sub-list">Loại nhạc</span>
                                        </a>
            
                                    </li>
                                    <li class="list-group-item menu-item rounded-pill"  id="song">
                                        <a href="BaiHat.php" class="menu-icon-sub rounded-pill">
                                            <span class="icon-title sub-list">Bài Hát</span>
                                        </a>
            
                                    </li>
                                </ul>

                            </li>
                            <li class="list-group-item menu-item" onclick="openTab(id)" id="tag-product">
                                <a href="#" class="menu-icon-sub">
                                    <span class="rounded-circle icon-link"><i class="bi bi-person"></i></span>
                                    <span class="icon-title">Người phát triển</span>
                                    <span class="icon-link"> <i class="icon-next bi bi-arrow-right"></i></span>
                                </a>
                                <ul class="list-group display-tag-none" myname="False">
                                    <li class="list-group-item menu-item rounded-pill"  id="singer">
                                        <a href="CaSi.php" class="menu-icon-sub rounded-pill">
                                            <span class="icon-title sub-list">Ca sĩ</span>
                                        </a>
            
                                    </li>
                                    <li class="list-group-item menu-item rounded-pill" id="album">
                                        <a href="./Album.php" class="menu-icon-sub rounded-pill">
                                            <span class="icon-title sub-list">Album</span>
                                        </a>
            
                                    </li>
                                </ul>

                            </li>

                            <li class="list-group-item menu-item rounded-pill"  id="user">
                                <a href="TaiKhoan.php" class="menu-icon-sub rounded-pill">
                                    <span class="rounded-circle icon-link"><i class="bi bi-person-badge"></i></span>
                                    <span class="icon-title">Tài khoản</span>
                                </a>
                            

                            </li>
                            
                        </ul>
                </div>
                </div>
            </div>

            <div class="content">

<!-- thanh tìm kiếm và user -->
<div class="content-slider_bar">
    <div class="input-group">
        <div class="input-group-prepend rounded">
            <button type="submit" class="btn btn-search pr-1">
                <i class="rounded bi bi-search"></i>
            </button>
        </div>
        <input type="text" placeholder="Search ..." class="form-control">
    </div>
    <div class="author-logout" style="position: relative;">
        <i class="bi bi-person"></i>
        <div class="log-out" ><a href="/Orchestra/user/logout.php">Log Out</a>
            <span></span>
        </div>
    </div>
</div>
            <script src="/Orchestra/admin/admin/js/main.js"></script>
