<?php require "Controller/NewsController.php"; ?>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- TITLE -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 align-center">QUẢN LÝ BÀI VIẾT</h1>
            </div>
        </nav>
        <div class="container-fluid">
            <?php
            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                echo '<p class="alert-info">' . $message . '</p>';
                unset($_SESSION['message']);
            }
            ?>
            <a class="btn btn-success" href="/?controller=manager&action=add" role="button">Thêm bài viết</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Slide chính</th>
                        <th colspan="3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($news as $key => $new) : ?>
                        <tr>
                            <td><?php echo ++$key ?></td>
                            <td><?php echo $new->title; ?></td>
                            <td><?php echo $new->dayRelease; ?></td>
                            <?php
                            if ($new->isSelected == '1') {
                                echo '<td>Có</td>';
                            } else {
                                echo '<td>Không</td>';
                            }
                            ?>
                            <td>
                                <a class="btn btn-outline-primary" href="/?controller=manager&action=detailnews&id=<?php echo $new->id ?>" role="button">Chi tiết</a>
                            </td>
                            <td>
                                <a class="btn btn-outline-warning" href="/?controller=manager&action=editnews&id=<?php echo $new->id ?>" role="button">Chỉnh sửa</a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger" href="?controller=manager&action=deletenews&id=<?php echo $new->id; ?>" role="button">Xóa bài viết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>