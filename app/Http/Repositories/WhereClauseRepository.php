<?php

namespace App\Http\Repositories;

use DB;

class WhereClauseRepository {

    public static function getDataByWhereClause() {
// where requires three arguments. The first argument is the name of the column. The second argument is an operator, which can be any of the database's supported operators. 
// Finally, the third argument is the value to evaluate against the column.

        return DB::table('laravel')->where('name', '=', 'pooja')->get();
//or
//        return DB::table('laravel')->where('name', 'pooja')->get();
    }

    public static function getDataByWhereGTLTClause() {
        //You may use a variety of other operators when writing a where clause:
//        return DB::table('laravel')
//                        ->where('amount', '>=', 100)
//                        ->get();
//or
        return DB::table('laravel')
                        ->where('amount', '<>', 100)
                        ->get();
    }

    public static function getDataByWhereLikeClause() {
        return DB::table('laravel')
                        ->where('name', 'like', 'P%')
                        ->get();
    }

    public static function getDataByOrWhereClause() {
//        You may chain where constraints together as well as add or clauses to the query. The orWhere method accepts the same arguments as the where method:
        return DB::table('laravel')
                        ->where('amount', '>', 100)
                        ->orWhere('name', 'pooja')
                        ->get();
    }

    public static function getDataByWhereArrayClause() {
//You may also pass an array of conditions to the where function:
        return DB::table('laravel')->where([
                    ['name', '=', 'pooja'],
                    ['amount', '<>', '100'],
                ])->get();
    }

}
