<?php
namespace App\Http\Repositories;
use DB;

class DatabaseTransactionsRepository {

    public static function databaseTransactions() {
//If an exception is thrown within the transaction Closure, the transaction will automatically be rolled back. 
//If the Closure executes successfully, the transaction will automatically be committed
        return DB::transaction(function () {
                    DB::table('laravel')->insert(['name' => 'pooja', 'amount' => 100]);
                    DB::table('posts')->update(['titte' => 'these are created by test users']);
                });
    }

    public static function databaseTransactionsHandlingDeadlocks() {
//        The transaction method accepts an optional second argument which defines the number of times a transaction should be reattempted when a deadlock occurs. 
//        Once these attempts have been exhausted, an exception will be thrown:
        return DB::transaction(function () {
                    DB::table('laravel')->insert(['name' => 'pooja', 'amount' => 100]);
                    DB::table('posts')->update(['titte' => 'these are created by test users']);
                }, 5);
    }

    public static function manuallyUsingTransactions() {
        DB::beginTransaction();
//You can rollback the transaction via the rollBack method:
        DB::rollBack();
//Lastly, you can commit a transaction via the commit method:
        DB::commit();
    }

}
