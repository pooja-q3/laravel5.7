<?php

namespace App\Http\Repositories;

use App\Models\User;
use DB;

class EloquentRepository {

    public static function getAllRowsFromTable() {
        return DB::table('users')->get();
    }

}
