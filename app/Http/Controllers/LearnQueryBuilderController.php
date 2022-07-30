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

        //$users = DB::table('users')
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
//            ->where('status', 1)
//            ->where(function ($query) use ($keyword){
//                $query->orWhere('name', 'like', "%$keyword%");
//                $query->orWhere('email', 'like', "%$keyword%");
//                $query->orWhere('phone', 'like', "%$keyword%");
//                $query->where(function($query){
//                    $query->where('id', '>=', 1);
//                    $query->orWhere('id', '<=', 3);
//                });
//            })
//            ->get();

            /*
             * SELECT * FROM users WHERE status=1 AND (name LIKE '%van a%' OR email LIKE '%van a%' OR phone LIKE '%van a%')
             *
             * */

            //Join bảng
//            $users = DB::table('users as u')
//                ->select('u.*', 'g.name as group_name', 'p.title')
//                ->join('groups as g', 'u.group_id', '=', 'g.id')
//                ->join('posts as p', 'p.user_id', '=', 'u.id')
//                ->where('u.id', 5)
//                ->get();

            //Sắp xếp
            $users = DB::table('users')
              //  ->orderBy('created_at', 'DESC')
              //  ->orderBy('id', 'ASC')
              //    ->inRandomOrder()
                ->take(2)
                ->skip(1)
                ->get();

            //Thêm dữ liệu
//            $currentId = DB::table('users')->insertGetId([
//                'name' => 'Nguyễn Văn E',
//                'email' => 'nguyenvane@gmail.com',
//                'phone' => '0388875179',
//                'status' => 1,
//                'group_id' => 1,
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' =>  date('Y-m-d H:i:s')
//            ]);

            //$currentId = DB::getPdo()->lastInsertId();

            //Cập nhật dữ liệu
//            $status = DB::table('users')
//                ->where('id', 1)
//                ->update([
//                    'name' => 'Hoàng An Update',
//                    'email' => 'hoanganupdate@gmail.com',
//                    'updated_at' => date('Y-m-d H:i:s')
//                ]);
//            dd($status);

            //Xoá dữ liệu
//            $status = DB::table('news')
//                ->where('id', 2)
//                ->delete();
//            dd($status);

            //DB Raw
//            $users = DB::table('users')
//                ->select('email', DB::raw('count(id)'))
//              //  ->selectRaw("group_id * ? as groupCalc", ['base' => 5])
//                ->groupBy('email')
//               // ->having('count(id)', '>', 1)
//              // ->havingRaw("count(id) > ?", [1])
//              //  ->whereRaw('group_id > id')
//               // ->orderByRaw('created_at DESC, id ASC')
//               ->groupBy()
//                ->get();

            $users = DB::table('users')
            ->select('name', 'email')
            ->whereIn('id', function($query){
                $query->select('id')
                    ->from('groups')
                    ->where('id', '>', 1);
            })
            ->get();

            $sql = DB::getQueryLog();

            dd($users);


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
