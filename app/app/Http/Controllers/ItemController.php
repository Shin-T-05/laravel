<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Item;
use App\Good;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Request $request)
{
    // フィルタの処理を行う
    $query = Item::query();
    // 商品が表示状態（likesが0）のもののみを取得
    $query->where('likes', 0);
    // $data = [];
    // // ユーザの投稿の一覧を作成日時の降順で取得
    $item = Item::withCount('goods')->orderBy('created_at', 'desc')->paginate(10);
    $good_model = new Good;


    // 検索条件が入力されていない場合、空のアイテムを返す
    if (!$request->filled('price_min') && !$request->filled('price_max') && !$request->filled('product_name') && !$request->filled('product_info')) {
        $items = collect(); // 空のコレクションを作成; // 空のコレクションを作成
    } else {
        // 金額フィルタ
        if ($request->filled('price_min')) {
            $query->where('amount', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('amount', '<=', $request->price_max);
        }

        // 商品名フィルタ
        if ($request->filled('product_name')) {
            $query->where('itemname', 'like', '%' . $request->product_name . '%');
        }

        // 商品情報フィルタ
        if ($request->filled('product_info')) {
            $query->where('sentence', 'like', '%' . $request->product_info . '%');
        }

        // 検索結果を取得
        $items = $query->get();
    }

    // ビューをtop-1.blade.phpに切り替え
    return view('top-1', [
        'item' => $item,
        'items' => $items,
        'good_model' => $good_model,
    ]);

}




    public function create()
    {
        
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'itemname' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'sentence' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // 画像を保存
        $path = $request->file('image')->store('public/images');

        // データベースに保存
        $item = new Item();
        $item->itemname = $request->itemname;
        $item->amount = $request->amount;
        $item->sentence = $request->sentence;
        $item->image = str_replace('public/', '', $path); // パスから 'public/' を削除して保存
        $item->save();

        return redirect('/business-top');
    }

    public function show($id)
{
    // 商品をIDで検索
    $item = Item::findOrFail($id); // 変数名を $itemに
    
    // 商品詳細ビューを返す
    return view('item-detail', compact('item')); // 'item' 変数をビューに渡す
}

public function edit($id)
{
    // 商品をIDで検索（存在しなければ404エラー）
    $item = Item::findOrFail($id);

    // 商品編集ビューに商品情報を渡す
    return view('business-edit', compact('item'));
}

public function update(Request $request, $id)
{
    // バリデーションルールの設定
    $request->validate([
        'itemname' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'sentence' => 'nullable|string',
        'image' => 'nullable|image|max:2048', // 画像は2MBまで
    ]);

    // 商品の取得
    $item = Item::findOrFail($id);

    // 商品名、値段、説明文の更新
    $item->itemname = $request->itemname;
    $item->amount = $request->amount;
    $item->sentence = $request->sentence;

    // 画像の更新（新しい画像がアップロードされた場合のみ）
    if ($request->hasFile('image')) {
        // 既存の画像がある場合は削除
        if ($item->image) {
            \Storage::delete('public/' . $item->image);
        }
        // 新しい画像を保存し、パスをDBに保存
        $path = $request->file('image')->store('items', 'public');
        $item->image = $path;
    }

    // 商品情報の保存
    $item->save();

    // 商品一覧を取得し、ビューに渡す
    $items = Item::all(); // すべての商品を取得

    // 商品一覧ページへリダイレクトし、itemsをビューに渡す
    return view('business-item', compact('items')); // 'items'変数をビューに渡す
}


    public function destroy($id)
    {
        
    }

    
}
