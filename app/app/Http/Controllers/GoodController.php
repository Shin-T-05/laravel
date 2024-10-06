<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth; // Authをインポート
use App\Good;
use App\Item;

class GoodController extends Controller
{
    // 商品一覧 (いいねした商品を表示)
// 商品一覧 (いいねした商品を表示)
public function index(Request $request)
{
    // 現在のユーザーを取得
    $userId = Auth::id();
    
    // いいねした商品のIDを取得
    $likedItemIds = Good::where('user_id', $userId)->pluck('item_id');

    // いいねした商品の情報を取得
    $likedItems = Item::whereIn('id', $likedItemIds)->withCount('goods')->get();

    // Goodモデルを使用してgood_existメソッドを参照
    $good_model = new Good;

    return view('good', [
        'likedItems' => $likedItems,
        'good_model' => $good_model, // good_modelをビューに渡す
    ]);
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
