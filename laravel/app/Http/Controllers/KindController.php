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
        $i = 0;
        $kinds = Kind::where('user_id', Auth::id())->get();
        foreach ($kinds as $kind) {
            $i++;
            $result_kinds[] = array('line_count' => $i, 'name' => $kind->name, 'id' => $kind->id);
        }
        return view(
            'kind_page',
            [
                'kinds' => $result_kinds
            ]
        );
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
