<?php

namespace App\UI\Http\Web;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function dashboard(): View
    {
        return view('pages.dashboard');
    }
}
