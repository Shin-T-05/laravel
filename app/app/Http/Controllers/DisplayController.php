<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use App\Item;
use App\User;
use App\Good;
use App\Review;


use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{

    public function index(){

        return view('business-top');

    }

    public function regi_index(){

        return view('business-registration');

    }

    public function pur_index(){

        return view('purchase');

    }


    public function pass_index(){

        return view('password-complete');

    }



    public function top1_index(){

        return view('top-1');

    }


    public function top2_index(){

        return view('top-2');

    }
    

    public function my_index(){

        return view('mypage');

    }

    public function with_index(){

        return view('withdrawal');

    }

    public function withcom_index(){
        
        // ログインしているユーザーの情報を取得
        $user = Auth::user();

        // ビューに単一ユーザー情報を渡す
        return view('withdrawal-complete', [
        'user' => $user, 
    ]);

    }

    public function edit_index(){

        // ログインしているユーザーの情報を取得
        $user = Auth::user();

        return view('edit',[
            'user' => $user,
        ]);

    }

    public function busiuser_index(){

        $users = User::all();

        return view('business-user',[
            'users' => $users,
        ]);

    }

    public function busiitem_index(){

        $items = Item::all();

        return view('business-item',[
            'items' => $items,
        ]);

    }

    public function complete()
    {
        return view('purchase.complete');
    }


    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $item_id = $request->item_id;
        $good = new Good;
        $item = Item::findOrFail($item_id);
    
        if ($good->good_exist($id, $item_id)) {
            // いいねを削除
            Good::where('item_id', $item_id)->where('user_id', $id)->delete();
        } else {
            // いいねを追加
            $good = new Good;
            $good->item_id = $request->item_id;
            $good->user_id = $id;
            $good->save();
        }
    
        // いいね数を取得
        $itemGoodsCount = $item->loadCount('goods')->goods_count;
    
        return response()->json(['itemGoodsCount' => $itemGoodsCount]);
    }    

    public function create($itemId)
{
    $reviews = Review::where('user_id', auth()->id())->get(); // 現在のユーザーのレビューを取得
    $item = Item::find($itemId); // アイテムIDから特定のアイテムを取得

    if (!$item) {
        return redirect()->route('login')->with('error', '指定されたアイテムが見つかりません。');
    }

    return view('review', compact('reviews', 'item')); // itemをビューに渡す
}


}
