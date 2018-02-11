<?php

namespace App\Services;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UserService
{
    // GET USER DATA
    public function getUserData($id) {
        return DB::select( DB::raw('SELECT users.id , users.name , (SELECT COUNT(*) FROM goods WHERE users_id = users.id) as goodsCount
                                    FROM users WHERE id = ?') , [$id] );
    }
}