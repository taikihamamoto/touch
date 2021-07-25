<?php

namespace App\Http\Controllers;

use App\Models\Kind;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($id,$user_id)
    {
        // 商品情報をデータベースから所得
        $kinds = Kind::where('user_id', $user_id)->get();
        $products = product::where('user_id', $user_id)->get();
        $value = $id;
        return view(
            'order_page',
            ['products' => $products, 'kinds' => $kinds, 'table_number' => $value, 'user_id' => $user_id]
        );
    }

    public function confirm()
    {
        // 商品ごとにデータを多次元配列へ
        $datas = array();
        $i = 0;
        $user_id = (int)$_POST['user_id'];
        foreach ($_POST as $key => $value) {
            if (is_int($key)) {
                if ($value != 0) {
                    $i++;
                    $order_data = array(
                        'id' => $i,
                        'user_id' => $value,
                        'product_id' => $key,
                        'count' => $value
                    );
                    $datas[] = $order_data;
                }
            }
        }
        // 注文0の場合
        if (empty($datas)) {
            return back()->with('flash_message', '何も登録されていません');
        }
        // 商品ごとのデータを取得
        foreach ($datas as $data) {
            $id = $data['product_id'];
            $product_find_data = product::find($id);
            $product_data = array(
                'product_id' => $id,
                'kind' => $product_find_data->kind,
                'name' => $product_find_data->name,
                'amount' => $product_find_data->amount
            );
            $fulldatas[] = array_merge($data, $product_data);
        }
        // 合計金額を計算
        $totalfee = array();
        foreach ($fulldatas as $data) {
            $single_amount = $data['amount'];
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
        // 確認ページへ
        return view(
            'confirm_page',
            [
                'datas' => $fulldatas,
                'totalfee' => $totalfee,
                'table_number' => $table_number,
                'user_id' => $user_id
            ]
        );
    }
    public function register()
    {
        $datas = array();
        $i = 0;
        foreach ($_POST as $key => $value) {
            if (is_int($key)) {
                if ($value != 0) {
                    $i++;
                    $user_id = (int)$_POST['user_id'];
                    $table_number = (int)$_POST['table_number'];
                    $count = (int)$value;
                    $order_data = array(
                        'user_id' => $user_id,
                        'table_number' => $table_number,
                        'product_id' => $key,
                        'count' => $count,
                        'status' => 1
                    );
                    $datas[] = $order_data;
                }
            }
        }
        $PHurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ;
        $url = $PHurl."/order_page/user_id=" . $user_id . "&table=" . $table_number;
        // 注文情報をデータベースへ保存
        //データベース接続
        \DB::beginTransaction();
        try {
            foreach ($datas as $order) {
                Order::create($order);
                \DB::commit();
            }
        } catch (\Throwable $e) {
            dd($e);
            \DB::rollback();
            abort(500);
        }
        return view(
            'OK_page',
            [
                'table_number' => $table_number,
                'user_id' => $user_id,
                'url' => $url
            ]
        );
    }
}
