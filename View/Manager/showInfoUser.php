<?php
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;


?>


<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- TITLE -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 align-center">CHI TIẾT</h1>
            </div>
        </nav>
        <div class="container-fluid">
            <?php
            if (isset($message)) {
                echo "<p class='alert-info'>$message</p>";
            }
            ?>
            <form class="user" method="post" action="/?controller=manager&action=edit&id=<?php echo $user->id ?>">

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tên :</label>
                        <input type="text" class="form-control form-control-user" name="firstName" value="<?php echo $user->firstName; ?>" <?php if ($action == 'details') {
                                                                                                                                                echo 'disabled';
                                                                                                                                            } ?>>
                    </div>
                    <div class="col-sm-6">
                        <label>Họ :</label>
                        <input type="text" class="form-control form-control-user" name="lastName" value="<?php echo $user->lastName; ?>" <?php if ($action == 'details') {
                                                                                                                                                echo 'disabled';
                                                                                                                                            } ?>>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tên đăng nhập :</label>
                        <input type="text" class="form-control form-control-user" name="username" value="<?php echo $user->username; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Mật khẩu :</label>
                        <input type="password" class="form-control form-control-user" name="password" value="<?php echo $user->password; ?>" <?php if ($action == 'details') {
                                                                                                                                                    echo 'disabled';
                                                                                                                                                } ?>>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Email :</label>
                        <input type="email" class="form-control form-control-user" name="email" value="<?php echo $user->email; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Chức vụ :</label>
                        <select name="role" class="form-control " <?php if ($action == 'details') {
                                                                        echo 'disabled';
                                                                    } ?>>
                            <option value="manager" <?php if ($user->role == 'manager') echo 'selected' ?>>Quản trị</option>
                            <option value="user" <?php if ($user->role == 'user') echo 'selected' ?>>Người dùng</option>
                        </select>

                    </div>
                </div>

                <div class="row d-flex">
                    <?php
                    if ($action == 'edit') {
                        echo '<div class="col-md-4">
                        <button class="btn btn-success btn-user btn-block">Lưu</button>
                    </div>';
                    }
                    ?>
                    <div class="col-md-4 ml-auto p-2">
                        <a class="btn btn-outline-info btn-block btn-user" href="?controller=manager&action=users" role="button"> &lt;&lt; Trở về</a>
                    </div>

                </div>
            </form>


        </div>
    </div>
</div>