<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Kind;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        $i = 0;
        $kinds = Kind::where('user_id', Auth::id())->get();
        $products = product::where('user_id', Auth::id())->get();
        foreach ($products as $product) {
            $i++;
            foreach ($kinds as $kind) {
                if ($product->kind_id == $kind->id) {
                    $kind_name = $kind->name;
                }
            }
            $result_products[] = array('line_count' => $i, 'kind_name' => $kind_name, 'product_name' => $product->name, 'amount' => $product->amount);
        }
        return view(
            'register',
            [
                'kinds' => $kinds,
                'products' => $result_products
            ]
        );
    }

    public function store(ProductRequest $request)
    {
        // 商品情報を取得
        $inputs = $request->all();
        $kind = Kind::where('name', $inputs['kind'])->first();
        $inputs = array_merge($inputs, array('user_id' => Auth::id(), 'kind_id' => $kind->id));
        unset($inputs['kind']);
        //データベース接続
        \DB::beginTransaction();
        try {
            product::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            dd($e);
            \DB::rollback();
            abort(500);
        }

        return back()->with('kind', $kind['name'])->with('name', $inputs['name'])->with('amount', $inputs['amount']);
    }
}
