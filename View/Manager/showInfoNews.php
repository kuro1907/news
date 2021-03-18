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
            <form class="user needs-validation" method="post" action="/?controller=manager&action=<?php echo $action;
                                                                                                    if (isset($new)) echo '&id=' . $new->id ?>" novalidate>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Tiêu đề :</label>
                        <input type="text" class="form-control form-control-user" name="title" value="<?php if (isset($new)) echo $new->title; ?>" <?php if ($action == 'detailnews') {
                                                                                                                                                        echo 'disabled';
                                                                                                                                                    } ?> required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền đầy đủ thông tin.</div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Giới thiệu :</label>
                        <textarea id="info" name="info" rows="5" cols="50" class="form-control " <?php if ($action == 'detailnews') {
                                                                                                        echo 'disabled';
                                                                                                    } ?> required><?php if (isset($new)) echo $new->info; ?></textarea>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền đầy đủ thông tin.</div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Ảnh :</label>
                        <input id="inp" type='file'>
                        <?php
                        if (isset($new->img)) {
                            echo '<textarea name="img" id="b64" cols="100" rows="10" hidden>' . $new->img . '</textarea>';
                            echo '<img id="img" src="' . $new->img . '" height="150">';
                        } else {
                            echo '<textarea name="img" id="b64" cols="100" rows="10" hidden></textarea>';
                            echo '<img id="img" height="150">';
                        }
                        ?>

                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền đầy đủ thông tin.</div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" hidden class="form-control form-control-user" name="linkPost" value="<?php if (isset($new)) {
                                                                                                                    echo $new->linkPost;
                                                                                                                } else {
                                                                                                                    echo '/?controller=user&action=post&id=' . ($idNewest[0][0] + 1);
                                                                                                                } ?>" <?php if ($action == 'detailnews') {
                                                                                                                            echo 'disabled';
                                                                                                                        } ?>>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Thể loại :</label>
                        <select name="category" class="form-control " <?php if ($action == 'detailnews') {
                                                                            echo 'disabled';
                                                                        } ?>>
                            <option value="update" <?php if (isset($new)) if ($new->category == 'update')       echo 'selected' ?>>Cập nhật</option>
                            <option value="promotion" <?php if (isset($new)) if ($new->category == 'promotion') echo 'selected' ?>>Khuyến mãi</option>
                            <option value="event" <?php if (isset($new)) if ($new->category == 'event')     echo 'selected' ?>>Sự kiện</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Slide Chính:</label>
                        <select name="isSelected" class="form-control " <?php if ($action == 'detailnews') {
                                                                            echo 'disabled';
                                                                        } ?>>
                            <option value="0" <?php if (isset($new)) if ($new->isSelected == 0) echo 'selected' ?>>Không</option>
                            <option value="1" <?php if (isset($new)) if ($new->isSelected == 1) echo 'selected' ?>>Có</option>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Nội dung bài viết:</label>
                        <textarea id="editor1" name="content" rows="10" cols="50" class="form-control " <?php if ($action == 'detailnews') {
                                                                                                            echo 'disabled';
                                                                                                        } ?> data-sample-short required><?php if (isset($new)) echo $new->content; ?></textarea>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền đầy đủ thông tin.</div>
                    </div>
                </div>
                <div class="row d-flex">
                    <?php
                    if ($action == 'editnews') {
                        echo '<div class="col-md-4">
                        <button class="btn btn-success btn-user btn-block">Lưu</button>
                    </div>';
                    }
                    if ($action == 'add') {
                        echo '<div class="col-md-4">
                        <button class="btn btn-success btn-user btn-block">Đăng bài viết</button>
                    </div>';
                    }
                    ?>
                    <div class="col-md-4 ml-auto p-2">
                        <a class="btn btn-outline-info btn-block btn-user" href="?controller=manager&action=news" role="button"> &lt;&lt; Trở về</a>
                    </div>

                </div>
            </form>


        </div>
    </div>
</div>
<script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    CKEDITOR.replace('editor1', {
        extraPlugins: 'editorplaceholder',
        editorplaceholder: 'Start typing here...'
    });

    function readFile() {

        if (this.files && this.files[0]) {

            var FR = new FileReader();

            FR.addEventListener("load", function(e) {
                document.getElementById("img").src = e.target.result;
                document.getElementById("b64").innerHTML = e.target.result;
            });

            FR.readAsDataURL(this.files[0]);
        }

    }

    document.getElementById("inp").addEventListener("change", readFile);
</script>