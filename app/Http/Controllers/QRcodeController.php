<?php

namespace App\Http\Controllers;

use App\Http\Requests\tableCountRequest;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class QRcodeController extends Controller
{
    public function tableCount()
    {
        return view('tableCount');
    }
    public function store()
    {
        $count = $_POST['tableCount'];
        
        // QRコードをテーブル数だけ制作
        for ($i = 0; $i < $count; $i++)
        {
            $iii = $i+1;
            $user_id = Auth::id();
            $url = "http://localhost:8888/order_page/table=".$iii."&user_id=".$user_id;
            $QRcodePicture = QrCode::size(100)->generate('http://localhost:8888/order_page/table='.$iii."&user_id=".$user_id);
            $QRcode = array(
                'count' => $iii,
                'url' => $url,
                'QRcodePicture' => $QRcodePicture
            );
            $QRcodeData[] = $QRcode;
        };
        return view(
            'QRcode_page',
            ['QRcodeData' => $QRcodeData]
        );
    }
    public function save()
    {

    }
}