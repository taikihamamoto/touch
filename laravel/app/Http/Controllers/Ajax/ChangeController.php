<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function made()
    {
        $id = $_POST['id'];
        // statusを2に変更
        \App\Models\Order::where('id', $id)->update(['status' => 2]);
    }

    public function send()
    {
        $id = $_POST['id'];
        // statusを3に変更
        \App\Models\Order::where('id', $id)->update(['status' => 3]);
    }

    public function delete()
    {
        $id = $_POST['id'];
        // statusを3に変更
        \App\Models\Order::where('id', $id)->delete();
    }
}
