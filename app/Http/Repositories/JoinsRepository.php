<?php

namespace App\Http\Repositories;

use App\User;
use DB;

class JoinsRepository {

    public static function getDataByInnerJoinClause() {
        return DB::table('posts')
                        ->join('authors', 'authors.id', '=', 'posts.author_id')
                        ->get();
    }

    public static function getDataByLeftJoinClause() {
        return DB::table('authors')
                        ->leftJoin('posts', 'authors.id', '=', 'posts.author_id')
                        ->get();
    }

    public static function getDataByRightJoinClause() {
        return DB::table('authors')
                        ->rightJoin('posts', 'authors.id', '=', 'posts.author_id')
                        ->get();
    }

    public static function getDataByCrossJoinClause() {
        return DB::table('authors')
                        ->crossJoin('users')
                        ->get();
    }

    public static function getDataByAdvancedJoinClause() {
        return DB::table('authors')
                        ->join('posts', function ($join) {
                            $join->on('authors.id', '=', 'posts.author_id')->where('posts.id', '>', 150); //->orOn(...);
                        })
                        ->get();
    }

    public static function getDataBySubQueryJoinsClause() {
        ////use the joinSub, leftJoinSub, and rightJoinSub methods, 
        //Each of these methods receive three arguments: the sub-query, its table alias, and a Closure that defines the related columns:
        $latestPosts = DB::table('posts')
                ->select('author_id', DB::raw('MAX(created_at) as last_post_created_at'))
//                ->where('is_published', true)
                ->groupBy('author_id');

        return DB::table('authors')
                        ->joinSub($latestPosts, 'latest_posts', function ($join) {
                            $join->on('authors.id', '=', 'latest_posts.author_id');
                        })->get();
    }

    public static function getDataByUnionClause() { //The unionAll method is also available and has the same method signature as union.
        $first = DB::table('posts')
                ->whereNull('title');

        return DB::table('posts')
                        ->whereNull('body')
                        ->union($first)
                        ->get();
    }

}
