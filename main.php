<?php
$slides = [];
foreach ($news as $key => $value) {
    if ($value->isSelected == 1) {
        $slides[] = $value;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Trang chủ</title>
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <!-- Phan hien thi trang -->
    <!-- Slide -->
    <div id="carouselExampleIndicators" class="carousel slide top-50" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $count = count($slides);
            foreach ($slides as $k => $v) {
                if ($k == 0) {
                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $k . '" class="active"></li>';
                } else {
                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $k . '"></li>';
                }
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            foreach ($slides as $key => $slide)
                if ($key == 0) {
                    echo '
                <div class="carousel-item active">
                    <a href="' . $slide->linkPost . '">
                        <img class="d-block w-100" src="' . $slide->img . '" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>' . $slide->title . '</h4>
                            <p>' . $slide->info . '</p>
                        </div>
                    </a>
                </div>';
                } else {
                    echo '
                    <div class="carousel-item ">
                        <a href="' . $slide->linkPost . '">
                            <img class="d-block w-100" src="' . $slide->img . '" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                            <h4>' . $slide->title . '</h4>
                            <p>' . $slide->info . '</p>
                        </div>
                        </a>
                    </div>';
                }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="tab-line">
        </div>
        <div class="row">
            <?php
            require 'tab-content-news-left.php';
            require 'tab-content-news-right.php';
            ?>
            <!-- <div class="col-lg-6 bg-dark img-content">
                <img src="./img/Patchnote-tháng-2_1200.jpg" alt="" style="width: 100%;">
            </div>
        </div> -->
        </div>
    </div>
    <?php
    require 'footer.php';
    ?>
    <p class="text"> Công ty Codegym VietNam - Huế</p>
    <p class="text">Địa chỉ : 28 Nguyễn Tri Phương, Phú Hội, Thành phố Huế, Thừa Thiên Huế</p>
    <p class="text">Case Study Module 2 - Nguyễn Nam Vũ - PHP</p>
    <div class="row logo-footer">
        <div class="col-md-2">
            <a href="http://vetv.vn/">
                <img src="./img/ved-logo.png" alt="" style="width:126px">
            </a>
        </div>
        <div class="col-md-2">
            <a href="https://garena.vn/">
                <img src="./img/logo-garena.png" alt="" style="width:100%">
            </a>
        </div>
        <div class="col-md-2">
            <a href="https://kr.ncsoft.com/kr/index.do">
                <img src="./img/logo-ncsoft-white.png" alt="" style="width:100%">
            </a>
        </div>

    </div>

</body>

</html>