<div class="col-lg-6">
    <div class="col-lg-12">
        <div id="carouselSlide" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselSlide" data-slide-to="0" class="active"></li>
                <li data-target="#carouselSlide" data-slide-to="1"></li>
                <li data-target="#carouselSlide" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php

                for ($i = 0; $i < 3; $i++) {
                    if ($i == 0) {
                        echo '
                <div class="carousel-item active">
                    <a href="' . $news[0]->linkPost . '">
                        <img class="d-block w-100" src="' . $news[0]->img . '" alt="First slide">
                    </a>
                </div>';
                    } else {
                        echo '
                    <div class="carousel-item ">
                        <a href="' . $news[$i]->linkPost . '">
                            <img class="d-block w-100" src="' . $news[$i]->img . '" alt="First slide">
                        </a>
                    </div>';
                    }
                }
                ?>
            </div>


        </div>
    </div>
    <br><br>
    <div class="col-lg-12">
        <?php $j = rand(1, 9) ?>
        <a href="<?php echo $news[$j]->linkPost ?>">
            <img src="<?php echo $news[$j]->img ?>" alt="" width="100%">
        </a>
    </div>
</div>