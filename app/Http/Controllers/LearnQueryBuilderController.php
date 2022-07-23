<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LearnQueryBuilderController extends Controller
{
    public function index(){

        //Lấy tất cả bản ghi

        DB::enableQueryLog();

        $keyword = 'van a';

        $users = DB::table('users')
         //  ->where('id', '<', 2)
         //   ->orWhere('id', '>', 3)
          //  ->where('id', '<', 4)
          //  ->where('name', 'like', '%hoang an%')
          //  ->whereNotBetween('id', [1,3])
           // ->whereNotIn('id', [1,3,4])
           // ->whereNotNull('updated_at')
           // ->whereDate('created_at', '2022-07-23')
           // ->whereMonth('created_at', 6)
           // ->whereDay('created_at', 22)
           // ->whereYear('created_at', '>', 2021)
           // ->whereColumn('created_at', 'updated_at')

//            ->where([
//                ['id', '>=', 1],
//                ['id', '<=', 3]
//            ])
            ->where('status', 1)
            ->where(function ($query) use ($keyword){
                $query->orWhere('name', 'like', "%$keyword%");
                $query->orWhere('email', 'like', "%$keyword%");
                $query->orWhere('phone', 'like', "%$keyword%");
                $query->where(function($query){
                    $query->where('id', '>=', 1);
                    $query->orWhere('id', '<=', 3);
                });
            })
            ->get();

            /*
             * SELECT * FROM users WHERE status=1 AND (name LIKE '%van a%' OR email LIKE '%van a%' OR phone LIKE '%van a%')
             *
             * */

            $sql = DB::getQueryLog();

            dd($sql);


        //Lấy bản ghi đầu tiên
        $user = DB::table('users')
            ->select('id', 'name', 'email', 'phone')
            ->where('id', '>', 2)
            ->first();

        //dd($user);


        return view('query-builder.lists', compact(
            'users'
        ));
    }
}
