<?php

namespace App\Controllers\Components;

class BannerController extends Component
{    
    public function index()
    {
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);

        return parent::render('banner', [
            'alert' => $alert
        ]);
    }
}
