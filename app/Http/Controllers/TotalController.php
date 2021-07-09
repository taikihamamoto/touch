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
        $status = "finished";
        // 商品情報をデータベースから所得
        $orders = Order::where('status', "creating")->orWhere('status', "made")->orWhere('status', "send")->get();
        $products = product::where('user_id',Auth::id())->get();

        // 合計金額を計算
        $totalfee_box = array();
        foreach ($orders as $data) {
            foreach ($products as $product) {
                if ($data['product_id'] == $product['id']) {
                    $single_amount = $product['amount'];
                }
            }
            $count = $data['count'];
            $multiple_amount = $single_amount * $count;
            $totalfee_box[] = $multiple_amount;
        }
        $sum = 0;
        foreach ($totalfee_box as $value) {
            $sum += $value;
        }
        $totalfee = $sum;
        // テーブル番号
        $table_number = $_POST['table_number'];

        return view(
            'total_page',
            [
                'orders' => $orders,
                'products' => $products,
                'table_number' => $table_number,
                'totalfee' => $totalfee
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
                Order::where('id', $id)->update(['status' => "finished"]);
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
