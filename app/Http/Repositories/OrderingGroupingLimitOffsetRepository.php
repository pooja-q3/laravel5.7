<?php

namespace App\Http\Repositories;

use App\User;
use DB;

class OrderingGroupingLimitOffsetRepository {

    public static function sortDataWithorderByClause() {
        return User::orderBy('name', 'asc')->get();
    }

    public static function getLatestRecords() {//The latest and oldest methods allow you to easily order results by date. By default, result will be ordered by the created_at column. Or, you may pass the column name that you wish to sort by:
        return User::latest()->first();
    }

    public static function getOldestRecords() {
        return User::oldest()->first();
    }

    public static function inRandomOrderClause() {//The inRandomOrder method may be used to sort the query results randomly. For example, you may use this method to fetch a random user:
        return User::inRandomOrder()->first();
    }

    public static function groupByhavingClause() {//        The groupBy and having methods may be used to group the query results. The having method's signature is similar to that of the where method:
        return DB::table('laravel')->select('name', DB::raw('sum(amount) as amount'))->groupBy('name')
//                        ->having('sum(amount)', '>', 80) // not working for this we need to use havingRaw method
                        ->havingRaw('SUM(amount) > ?', [80])
                        ->get();
    }

    public static function groupByMultiplehavingClause() {//You may pass multiple arguments to the groupBy method to group by multiple columns:
        return DB::table('laravel')->groupBy('name', 'id')
                        ->having('amount', '>', 100)
                        ->get();
    }

//For more advanced having statements, see the havingRaw method.
    public static function skipTakeRecords() {//To limit the number of results returned from the query, or to skip a given number of results in the query, you may use the skip and take methods:
        return User::skip(1)->take(2)->get();
    }

    public static function offsetLimitRecords() {//you may use the limit and offset methods:
        return User::offset(1)->limit(2)->get();
    }

}
