<?php

namespace App\Services;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class GoodsService
{
    // INSERT GOODS
    public function insertGoods(Request $request) {
        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $image)
            {
                $name= time().'-'.$image->getClientOriginalName();
                echo $name;
                $image->move(public_path().'/upload/', $name);
                $data[] = $name;
                $imageId[] = DB::table('images')->insertGetId([
                    'path' => '/upload/'.$name,
                    'users_id' => Auth::id()
                ]);
            }
        }
        $goods_images_id = DB::table('goods_images')->insertGetId([
            'images_ids' => json_encode($imageId)
        ]);

        return DB::table('goods')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'goods_images_id' => $goods_images_id,
            'users_id' => Auth::id(),
        ]);
    }

    // SELECT GOODS LIST
    public function selectGoodsList() {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              ORDER BY goods.created_at DESC; ') );
    }

    // SELECT GOODS
    public function selectGoods($id) {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              WHERE goods.id = ?
                              ORDER BY goods.created_at DESC; ') , [ $id ] );
    }

    // SELECT GOODS CATEGORY
    public function selectCategory($category) {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              WHERE goods.category = ?
                              ORDER BY goods.created_at DESC; ') , [ $category ] );
    }

    // GOODS SEARCH
    public function goodsSearch($keyword) {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              WHERE goods.title LIKE ?
                              ORDER BY goods.created_at DESC; ') , [ '%'.$keyword.'%' ] );
    }

    // GOODS CATEGORY
    public function goodsCategory($category) {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              WHERE goods.category = ?
                              ORDER BY goods.created_at DESC; ') , [ $category ] );
    }

    // TODAY GOODS
    public function goodsToday() {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              WHERE goods.created_at >= CURDATE()
                              ORDER BY goods.created_at DESC; ') );
    }

    // GET USER GOODS DATA
    public function getUserGoods($users_id) {
        return DB::select( DB::raw('SELECT goods.* , goods_images.images_ids , users.name
                              FROM goods
                              JOIN goods_images
                              ON goods_images.id = goods.goods_images_id
                              JOIN users
                              ON users.id = goods.users_id
                              WHERE goods.users_id = ?
                              ORDER BY goods.created_at DESC; ') , [$users_id] );
    }
    // DELETE GOODS
    public function deleteGoods($id) {
        return DB::table('goods')->where('id' , '=' , $id)->delete();
    }


}