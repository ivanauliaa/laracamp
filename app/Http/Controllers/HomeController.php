<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        return redirect(route(Auth::user()->is_admin ? 'admin.dashboard' : 'user.dashboard'));
    }
}
