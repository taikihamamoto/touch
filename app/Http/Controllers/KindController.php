<?php

namespace App\Http\Controllers;

use App\Http\Requests\KindRequest;
use App\Models\Kind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KindController extends Controller
{
    public function index()
    {
        return view('kind_page');
    }

    public function store(KindRequest $request)
    {
        // 商品情報を取得
        $inputs = $request->all();
        $inputs = array_merge($inputs, array('user_id' => Auth::id()));
        //データベース接続
        \DB::beginTransaction();
        try {
            Kind::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            dd($e);
            \DB::rollback();
            abort(500);
        }

        return back()->with('name', $inputs['name']);
    }
}
