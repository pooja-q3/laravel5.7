<?php

namespace App\Http\Repositories;

use App\User;
use DB;

class QueryBuilderRepository {

    public static function getAllRowsFromTable() {
        return User::get();
    }

    public static function getSingleRowFromTable() {
        $user = User::where('role', 'No Use')->first();
        print_r($user);
        return $user->name;
    }

    public static function getSingleColumnFromTable() {//This method will return the value of the column directly:
        return User::where('role', 'No Use')->value('name');
    }

    public static function getListColumnFromTable() {
        return DB::table('roles')->pluck('name', 'id'); // it will take only 2 arguments
    }

    public static function aggregates() {
//        return DB::table('laravel')->count();
//        return DB::table('laravel')->max('amount');
        return DB::table('laravel')->where('name', 'pooja')->avg('amount'); //You may combine these methods with other clauses:
    }

    public static function determiningRecordsIfExists() {
//        Instead of using the count method to determine if any records exist that match your query's constraints, you may use the exists and doesntExist methods:
        return DB::table('laravel')->where('name', 'pooja')->exists();
//        return DB::table('laravel')->where('name', 'fdfd')->doesntExist();
    }

    public static function association() {
        //        $users = User::take(5)->get();
//        $posts = Post::take(5)->with('author.profile')->get();
//        $posts = Post::with('author')->find(1);
//        $posts->map(function ($post) {
//            return $post->author;
//        });
        $posts = Post::all();
        $posts->load('author.profile');
        $posts->first()->author->profile;

        foreach ($posts as $post) {
            echo $post->title . '-------' . $post->author->name . '-------' . $post->author->profile->website . '</br>';
        }
    }

    public static function getRowsWithSpecificColumnFromTable() {
        return User::select('name', 'email as user_email')->get();
    }

    public static function getDistinctRecordsFromTable() {
        return DB::table('laravel')->select('name', 'amount')->distinct('name')->get(); // not working as expected
    }

    public static function addSelect() {
//        you already have a query builder instance and you wish to add a column to its existing select clause, you may use the addSelect method:
        $query = DB::table('users')->select('name');
        return $query->addSelect('email')->get();
    }

    public static function rawExpressions() {
//  Sometimes you may need to use a raw expression in a query. To create a raw expression, you may use the DB::raw method:
//  Note -  Raw statements will be injected into the query as strings, so you should be extremely careful to not create SQL injection vulnerabilities.

        return DB::table('posts')
                        ->select(DB::raw('count(*) as post_count, author_id'))
//                ->where('status', '<>', 1)
                        ->groupBy('author_id')
                        ->get();
    }

    public static function rawMethods() {
        return DB::table('laravel')
                ->selectRaw('amount * ? as price_with_tax', [1.0825])
                ->get();
    }

}
