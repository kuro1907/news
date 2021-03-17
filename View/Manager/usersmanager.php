<?php
require "Controller/UserController.php";
?>

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- TITLE -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 align-center">QUẢN LÝ THÀNH VIÊN</h1>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Chức vụ</th>
                        <th colspan="3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $user) : ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <?php
                            if ($user->role == 'manager') {
                                echo '<td>Quản trị</td>';
                            } else {
                                echo '<td>Người dùng</td>';
                            }
                            ?>
                            <td>
                                <a class="btn btn-outline-primary" href="?controller=manager&action=details&id=<?php echo $user->id; ?>" role="button">Chi tiết</a>
                            </td>
                            <td>
                                <a class="btn btn-outline-warning" href="?controller=manager&action=edit&id=<?php echo $user->id; ?>" role="button">Chỉnh sửa</a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger" href="?controller=manager&action=delete&id=<?php echo $user->id; ?>" role="button">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>