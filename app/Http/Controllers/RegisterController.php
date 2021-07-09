<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(ProductRequest $request)
    {
        // 商品情報を取得
        $inputs = $request->all();
        $inputs = array_merge($inputs, array('user_id' => Auth::id()));
        //データベース接続
        \DB::beginTransaction();
        try {
            product::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        return back()->with('kind', $inputs['kind'])->with('name', $inputs['name'])->with('amount', $inputs['amount'])->with('flash_message', ' 円 の登録が完了しました');
    }
}
