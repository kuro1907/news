<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand logo" href="index.php"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/?controller=user">Trang chủ </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?controller=user&action=posts&category=event">Sự kiện</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?controller=user&action=posts&category=update">Cập nhật</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/?controller=user&action=posts&category=promotion">Khuyến mãi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Tải game</a>
            </li>
        </ul>
        <?php

        if (isset($_SESSION["username"])) {
            if ($_SESSION['role'] == 'user') {
                echo '<ul class="navbar-nav">
                        <li class="nav-item">
                            <p class="nav-link">Xin chào ' . $_SESSION['username'] . ',</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/?controller=user&action=logout">Đăng xuất</a>
                        </li>
                        </ul>';
            } else {
                echo '<ul class="navbar-nav">
                        <li class="nav-item">
                            <p class="nav-link">Xin chào ' . $_SESSION['username'] . ',</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/?controller=manager&action=index">Quản lý</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/?controller=user&action=logout">Đăng xuất</a>
                        </li>
                        </ul>';
            }
        } else {

            echo '<ul class="navbar-nav ">
                        <li class="nav-item navbar-dark">
                            <a class="nav-link" href="/?controller=user&action=signin">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?controller=user&action=signup">Đăng ký</a>
                        </li>
                        </ul>';
        }
        ?>
    </div>
</nav>