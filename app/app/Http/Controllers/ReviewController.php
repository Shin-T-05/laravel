<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Review;
use App\History;
use App\Item;


class ReviewController extends Controller
{
    public function index()
    {
       
    }

    public function create($itemId)
{
    
}




public function store(Request $request)
{
    // バリデーション
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'comment' => 'required|string',
        'item_id' => 'required|integer', // item_id のバリデーションを追加
    ]);

    // レビューをデータベースに保存
    Review::create([
        'user_id' => auth()->id(), // 現在のユーザーIDを取得
        'title' => $validatedData['title'],
        'comment' => $validatedData['comment'],
        'item_id' => $validatedData['item_id'], // item_id を保存
    ]);

    // マイページにリダイレクトし、成功メッセージを表示
    return redirect()->route('mypage')->with('success', 'レビューが投稿されました。');
}




public function show($id) 
{ 
    $item = Item::findOrFail($id); 
    $reviews = Review::where('item_id', $id)->get();

    return view('item-detail', compact('item', 'reviews')); 
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
