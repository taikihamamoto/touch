<?php

namespace App\Http\Controllers;

use App\Http\Requests\tableCountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class QRcodeController extends Controller
{
    public function tableCount()
    {
        $table_count = Auth::user()->table_count;
        if ($table_count != null) {

            for ($i = 0; $i < $table_count; $i++) {
                $iii = $i + 1;
                $user_id = Auth::id();
                $protocol_host_URL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ;
                $url = $protocol_host_URL."/order_page/user_id=" . $user_id . "&table=" . $iii;
                $$qrcode_image = QrCode::size(100)->generate($url);
                $QRcode = array(
                    'count' => $iii,
                    'url' => $url,
                    'qrcode_image' => $qrcode_image
                );
                $qrcode_datas[] = $QRcode;
            };
            return view(
                'QRcode_page',
                ['qrcode_datas' => $qrcode_datas]
            );
        }
        return view('tableCount');
    }

    public function tableCountUp()
    {
        return view('tableCount');
    }

    public function store()
    {
        $table_count = $_POST['tableCount'];
        // QRコードをテーブル数だけ制作
        for ($i = 0; $i < $table_count; $i++) {
            $iii = $i + 1;
            $user_id = Auth::id();
            $protocol_host_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ;
            $url = $protocol_host_url."/order_page/user_id=" . $user_id . "&table=" . $iii;
            $qrcode_image = QrCode::size(100)->generate($url);
            $QRcode = array(
                'count' => $iii,
                'url' => $url,
                'qrcode_image' => $qrcode_image
            );
            $qrcode_datas[] = $QRcode;
        };
        // テーブル数をアカウントに登録
        User::where('id', Auth::id())->update(['table_count' => $table_count]);
        return view(
            'QRcode_page',
            ['qrcode_datas' => $qrcode_datas]
        );
    }
}
