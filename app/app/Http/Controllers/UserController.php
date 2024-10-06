<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\User;
use App\Cart;
use App\Item;
use App\History;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function store(Request $request)
{
    
    // バリデーション
    // $request->validate([
    //     'item_id' => 'required|exists:items,id',
    //     'quantity' => 'required|integer|min:1',
    // ]);

    $user = auth()->user(); // 現在のユーザーを取得
    $cartItems = Cart::where('user_id', $user->id)->get(); // カートのアイテムを取得

    foreach ($cartItems as $cartItem) {
        // 売上履歴の作成
        History::create([
            'user_id' => $user->id,
            'item_id' => $cartItem->item_id,
            'amount' => $cartItem->item->amount,
            'itemname' => $cartItem->item->itemname,
            'quantity' => $cartItem->quantity,
            'image' => $cartItem->item->image,
            'total' => $cartItem->item->amount * $cartItem->quantity,
            'date' => now(),
        ]);
    }

    // カートを空にする
    Cart::where('user_id', $user->id)->delete();

    return view('purchase-complete');
}





    public function show()
{
    return view('purchase');
}

    // ユーザー情報の編集画面を表示
    public function edit($id)
    {
        // 認証されたユーザーのみが自分の情報を編集できるようにします
        $user = User::findOrFail($id);
        
        // 必要に応じて認証チェックを追加
        if (Auth::id() !== $user->id) {
            return redirect()->route('users.index')->with('error', '権限がありません。');
        }
        
        return redirect('/mypage');
    }

    public function update(Request $request, $id)
{
    // バリデーションルールの設定
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6|confirmed',
        'tel' => 'nullable|string|max:20',
        'post' => 'nullable|string|max:10',
        'address' => 'nullable|string|max:255',
    ]);

    // ユーザーの取得
    $user = User::findOrFail($id);

    // 名前とメールアドレスの更新
    $user->name = $request->name;
    $user->email = $request->email;

    // 電話番号、郵便番号、住所の更新
    $user->tel = $request->tel;
    $user->post = $request->post;
    $user->address = $request->address;

    // パスワードの更新（必要な場合のみ）
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // ユーザー情報の保存
    $user->save();

    // マイページへリダイレクト
    return view('/mypage');
}


    public function destroy(User $user)
    {
        $user->delete();
  
        return redirect('/login');
    }

    }
