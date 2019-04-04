<?php

namespace App\Http\Repositories;

use App\Models\User;

class AdditionalWhereClauseRepository {

    public static function getDataBywhereBetweenClause() {//The whereBetween method verifies that a column's value is between two values:
        return User::whereBetween('id', [1, 2])->get();
    }

    public static function getDataBywhereNotBetweenClause() {//The whereNotBetween method verifies that a column's value lies outside of two values:
        return User::whereNotBetween('id', [1, 2])->get();
    }

    public static function getDataBywhereInClause() {//The whereIn method verifies that a given column's value is contained within the given array:
        return User::whereIn('id', [1, 2, 3])->get();
    }

    public static function getDataBywhereNotInClause() {//The whereNotIn method verifies that the given column's value is not contained in the given array:
        return User::whereNotIn('id', [1, 2, 3])->get();
    }

    public static function getDataBywhereNullClause() {//The whereNull method verifies that the value of the given column is NULL:
        return User::whereNull('updated_at')->get();
    }

    public static function getDataBywhereNotNullClause() {//The whereNotNull method verifies that the column's value is not NULL:
        return User::whereNotNull('updated_at')->get();
    }

    public static function getDataBywhereDateClause() {//The whereDate method may be used to compare a column's value against a date:
        return User::whereDate('created_at', '2019-04-02')->get();
    }

    public static function getDataBywhereMonthClause() {//The whereMonth method may be used to compare a column's value against a specific month of a year:
        return User::whereMonth('created_at', '11')->get();
    }

    public static function getDataBywhereDayClause() {//The whereDay method may be used to compare a column's value against a specific day of a month:
        return User::whereDay('created_at', '08')->get();
    }

    public static function getDataBywhereYearClause() {//The whereYear method may be used to compare a column's value against a specific year:
        return User::whereYear('created_at', '2018')->get();
    }

    public static function getDataBywhereTimeClause() {//The whereTime method may be used to compare a column's value against a specific time:
        return User::whereTime('created_at', ' = ', '11:40:07')->get();
    }

    public static function getDataBywhereColumnClause() {//The whereColumn method may be used to verify that two columns are equal:
//        return User::whereColumn('created_at', 'updated_at')->get();
//        You may also pass a comparison operator to the method:
        return User::whereColumn('updated_at', '>', 'created_at')->get();
//        The whereColumn method can also be passed an array of multiple conditions. These conditions will be joined using the and operator:
//        return User::whereColumn([
//                            ['first_name', ' = ', 'last_name'],
//                            ['updated_at', '>', 'created_at']
//                        ])->get();
    }

    public static function getDataByParameterGrouping() {
        return User::where('name', '=', 'pooja')
                        ->where(function($query) {
                            $query->where('id', '>', '1');
                            $query->orWhere('role', '!=', 'No Role');
                        })->get();
    }

}
