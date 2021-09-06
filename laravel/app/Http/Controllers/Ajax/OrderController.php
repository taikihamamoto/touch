<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return \App\Models\Order::Where('user_id',Auth::id())->where('status', 1)->orWhere('status', 2)->orWhere('status', 3)->get();
    }
}
