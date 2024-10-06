<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\History;
use App\Item;


class HistoryController extends Controller
{
    public function index(Request $request)
{
    // リクエストのクエリに基づいて購入履歴を取得するか、売上履歴を取得するかを決定
    if ($request->input('view') === 'purchases') { // 'purchases'が指定された場合
        // ログインしているユーザーの購入履歴を取得
        $userId = auth()->id();
        $purchases = History::where('user_id', $userId)->get(); // ユーザーIDに基づく購入履歴を取得

        return view('buy-list', compact('purchases')); // 購入履歴のビューを返す
    } else {
        // 売上履歴を取得（必要に応じてフィルタリング）
        $history = History::all(); // ここでは全ての履歴を取得しています。必要に応じて調整してください。

        // カートのデータをセッションから取得
        $cart = session()->get('cart', []);

        return view('business-management', compact('history', 'cart')); // 売上管理のビューを返す
    }
}

    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
  
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
