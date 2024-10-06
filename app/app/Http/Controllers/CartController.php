<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Cart;
use App\Item;

class CartController extends Controller
{

    public function index()
{
    $user = auth()->user(); // ログイン中のユーザーを取得
    $cart = Cart::where('user_id', $user->id)->get(); // カートの情報を取得

    return view('cart', compact('cart')); // ビューにカートの情報を渡す
}

    public function create()
    {
        
    }

    public function store(Request $request)
{
    $item = Item::findOrFail($request->item_id); // 商品情報の取得
    $user = auth()->user(); // ログイン中のユーザーを取得

    // カートに商品が既に存在するか確認
    $cart = Cart::where('user_id', $user->id)
                ->where('item_id', $item->id)
                ->first();

    if ($cart) {
        // 既存のカート商品の数量を増やす
        $cart->quantity++;
    } else {
        // 新規でカートに追加
        $cart = new Cart([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'quantity' => 1,
        ]);
    }

    // カート情報を保存
    $cart->save();

    return redirect()->route('carts.index')->with('success', '商品がカートに追加されました');
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
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('carts.index')->with('success', '商品がカートから削除されました');
    }

}
