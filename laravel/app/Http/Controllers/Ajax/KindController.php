<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KindController extends Controller
{
    public function delete()
    {
        $id = $_POST['id'];
        // 指定したidを削除
        \App\Models\Kind::where('id', $id)->delete();
        \App\Models\product::where('kind_id', $id)->delete();
    }
}
