<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalController extends Controller
{
    public function index()
    {
        // 商品情報をデータベースから所得
        $orderss = Order::where('status', 1)->orWhere('status', 2)->orWhere('status', 3)->Where('user_id', $_POST['user_id'])->where('table_number', $_POST['table_number'])->get();
        foreach ($orderss as $order) {
            if ($order->user_id ==  $_POST['user_id'] && $order->table_number ==  $_POST['table_number']) {
                $orders[] = $order;
            }
        }
        $products = product::where('user_id', $_POST['user_id'])->get();

        // オーダーしていない時
        if (empty($orders)) {
            return view('total_page')->with('flash_message', '何も登録されていません');
        }
        // テーブル番号
        $table_number = $_POST['table_number'];

        return view(
            'total_page',
            [
                'orders' => $orders,
                'products' => $products,
                'table_number' => $table_number
            ]
        );
    }

    public function change_finish()
    {
        foreach ($_POST as $key => $value) {
            if (is_int($key)) {
                $id = $key;
                // $status_id = Management::find($id);
                // if ($status_id['status'] == "creating") {
                //     exit;
                //     return back()->with('flash_message', 'まだ届いていない商品があります。');
                // }
                // statusを4に変更
                Order::where('id', $id)->update(['status' => 4]);
            }
        }
        return view(
            'end_page',
            [
                'totalfee' => $_POST['totalfee']

            ]
        );
    }
}
