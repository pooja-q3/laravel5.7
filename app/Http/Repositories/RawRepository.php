<?php

namespace App\Http\Repositories;

use App\Models\User;
use DB;

class RawRepository {

//this method takes the raw SQL query as its first argument and bindings as its second argument:
    public static function rawSelectQuery() { //always return an array of results
        return DB::select('select * from users where id = ?', [2]);
    }

    public static function usingNamedBindings() {//Instead of using ? to represent your parameter bindings, you may execute a query using named bindings:
        return DB::select('select * from users where id = :id', ['id' => 1]);
    }

    public static function rawInsertQuery() {
        return DB::insert('insert into users (name,email,password) values (?,?,?)', ['pooja', 'pooja1@gmail.com', '12345']);
    }

    public static function rawUpdateQuery() {
        return DB::update('update users set name = "Preet" where email = ?', ['pooja1@gmail.com']);
    }

    public static function rawDeleteQuery() {
        return DB::delete('delete from users where email = ?', ['pooja1@gmail.com']);
    }

    public static function rawStatementQuery() {
        return DB::statement('drop database test34');
    }

}
