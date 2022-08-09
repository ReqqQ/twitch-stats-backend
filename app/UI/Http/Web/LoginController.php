<?php

namespace App\UI\Http\Web;

use Application\Middleware\Cookie;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class LoginController extends BaseController
{
    public function home(Request $request): RedirectResponse|View
    {
        if($request->hasCookie('userToken')){
            return Redirect::to('/dashboard');
        }
        return view('pages.home');
    }

    public function dashboard(): View
    {
        return view('pages.dashboard');
    }
}
