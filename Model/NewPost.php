<?php

namespace Model;

use Model\DBConnection;

class NewPost
{
    public $id;
    public $title;
    public $info;
    public $dayRelease;
    public $img;
    public $linkPost;
    public $isSelected;
    public $category;
    public $content;

    public function __construct($title, $info, $dayRelease, $img, $linkPost, $isSelected = 0, $category, $content)
    {
        $this->title        = $title;
        $this->info         = $info;
        $this->dayRelease   = $dayRelease;
        $this->img          = $img;
        $this->linkPost     = $linkPost;
        $this->isSelected   = $isSelected;
        $this->category     = $category;
        $this->content      = $content;
    }
}
