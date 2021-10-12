<?php

namespace App\Controllers\Components;

class BannerController
{
    public function render($alert)
    {
        unset($_SESSION['alert']);
        require VIEW_ROOT . 'components/banner.php';
    }
}
