<?php

namespace App\Http\Controllers;

use App\Http\Repositories\DatabaseTransactionsRepository;
use App\Http\Repositories\EloquentRepository;
use App\Http\Repositories\RawRepository;
use App\Http\Repositories\QueryBuilderRepository;

class UseOfEloquentModelController extends Controller {

    public function index() {
        //        $associations = $this->association();
//        $queryBuilder = $this->rawQueries();
        $queryBuilder = $this->queryBuilder();
        echo '<pre>';
        print_r($queryBuilder);
        echo '</pre>';
        die;
    }

    private function rawQueries() {
        return RawRepository::rawSelectQuery(); // will returned array
//        $users = RawRepository::rawInsertQuery();// will returned affected rows
//        $users = RawRepository::rawUpdateQuery();// will returned affected rows
//        $users = RawRepository::rawDeleteQuery();// will returned affected rows
//        $users = RawRepository::rawStatementQuery();
    }

    //Query Builder
    private function queryBuilder() {
        //        $transactions = DatabaseTransactionsRepository::databaseTransactions();
//        DatabaseTransactionsRepository::manuallyUsingTransactions();  
//        return QueryBuilderRepository::getAllRowsFromTable();
//        return QueryBuilderRepository::getSingleRowFromTable();
//        return QueryBuilderRepository::getSingleColumnFromTable();
//        return QueryBuilderRepository::getListColumnFromTable();
//        return QueryBuilderRepository::aggregates();
//        return QueryBuilderRepository::determiningRecordsIfExists();
//        return QueryBuilderRepository::getRowsWithSpecificColumnFromTable();
//        return QueryBuilderRepository::getDistinctRecordsFromTable(); //--------issue
//        return QueryBuilderRepository::addSelect();
//        return QueryBuilderRepository::rawExpressions();// group using raw
        return QueryBuilderRepository::rawMethods();
    }

}
