<?php

namespace App\Services;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CommentService
{
    // INSERT COMMENT
    public function insertComment(Array $inputData){
        DB::table('comments')->insert([
            'goods_id' => $inputData['goods_id'],
            'content' => $inputData['content'],
            'users_id' => Auth::id()
        ]);
    }

    // SELECT COMMENT
    public function selectCommentList($GOODS_ID) {

        return DB::select( DB::raw('SELECT comments.* , users.name
                              FROM comments
                              JOIN users
                              ON users.id = comments.users_id
                              WHERE comments.goods_id = ?
                              ORDER BY created_at DESC') , [$GOODS_ID]);
    }
}

