<?php

foreach ($news as $key => $new) {
    echo '<div class="row box-post">
            <div class="col-md-4">
                <a href="' . $new->linkPost . '"><img src="' . $new->img . '" alt="" height="100%" width="100%"></a>
            </div>
            <div class="col-md-8">
                <div class="col-md-12 box-title"><a href="' . $new->linkPost . '">' . $new->title . '</a></div>
                <div class="col-md-12 box-info">' . $new->info . ' </div>
            </div>
        </div>';
}
