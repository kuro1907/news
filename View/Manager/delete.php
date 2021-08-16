<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- TITLE -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 align-center">Xóa người dùng</h1>
            </div>
        </nav>
        <div class="container-fluid">
            <?php
            if (isset($message)) {
                echo '<h4 class="alert-info">' . $message . '</h4>';
            } else {
                echo '<label>Bạn có chắc chắn muốn xóa người dùng ' . $user->username . ' ?</label>
                <form action="/?controller=manager&action=delete" method="post">
                    <input type="hidden" name="id" value="' . $user->id . '" />
                    <input type="hidden" name="username" value="' . $user->username . '" />
                    <input type="hidden" name="role" value="' . $user->role . '" />
                    <div class="form-group">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Thoát</button>
                        <input type="submit" value="Xóa người dùng" class="btn btn-danger" />
                    </div>
                </form>';
            }
            ?>
        </div>
    </div>
</div>