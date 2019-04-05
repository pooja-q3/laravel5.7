<?php

namespace App\Http\Controllers;

use App\Http\Repositories\DatabaseTransactionsRepository;
use App\Http\Repositories\EloquentRepository;
use App\Http\Repositories\RawRepository;
use App\Http\Repositories\QueryBuilderRepository;
use App\Http\Repositories\JoinsRepository;
use App\Http\Repositories\WhereClauseRepository;
use App\Http\Repositories\AdditionalWhereClauseRepository;
use App\Http\Repositories\OrderingGroupingLimitOffsetRepository;
use Request;
class UseOfEloquentModelController extends Controller {

    public function index() {
//        print_r(Request::segments());
//        $associations = $this->association();
//        $queryBuilder = $this->rawQueries();
//        $queryBuilder = $this->queryBuilder();
//        $queryBuilder = $this->joinQueries();
//        $queryBuilder = $this->whereClauseQueries();
//        $queryBuilder = $this->additionalWhereClauseQueries();
        $queryBuilder = $this->orderingGroupingLimitOffsetQueries();
        echo '<pre>';
        print_r($queryBuilder);
        echo '</pre>';
        die;
    }

    public function orderingGroupingLimitOffsetQueries() {
//        return OrderingGroupingLimitOffsetRepository::sortDataWithorderByClause();
//        return OrderingGroupingLimitOffsetRepository::getLatestRecords();
//        return OrderingGroupingLimitOffsetRepository::getOldestRecords();
//        return OrderingGroupingLimitOffsetRepository::inRandomOrderClause();
//        return OrderingGroupingLimitOffsetRepository::groupByhavingClause();
//        return OrderingGroupingLimitOffsetRepository::groupByMultiplehavingClause();
//        return OrderingGroupingLimitOffsetRepository::skipTakeRecords();
        return OrderingGroupingLimitOffsetRepository::offsetLimitRecords();
    }

    public function additionalWhereClauseQueries() {
//        return AdditionalWhereClauseRepository::getDataBywhereBetweenClause();
//        return AdditionalWhereClauseRepository::getDataBywhereNotBetweenClause();
//        return AdditionalWhereClauseRepository::getDataBywhereInClause();
//        return AdditionalWhereClauseRepository::getDataBywhereNotInClause();
//        return AdditionalWhereClauseRepository::getDataBywhereNullClause();
//        return AdditionalWhereClauseRepository::getDataBywhereNotNullClause();
//        return AdditionalWhereClauseRepository::getDataBywhereDateClause();
//        return AdditionalWhereClauseRepository::getDataBywhereMonthClause();
//        return AdditionalWhereClauseRepository::getDataBywhereDayClause();
//        return AdditionalWhereClauseRepository::getDataBywhereYearClause();
//        return AdditionalWhereClauseRepository::getDataBywhereTimeClause();
//        return AdditionalWhereClauseRepository::getDataBywhereColumnClause();
        return AdditionalWhereClauseRepository::getDataByParameterGrouping();
    }

    private function whereClauseQueries() {
//        return WhereClauseRepository::getDataByWhereClause();
//        return WhereClauseRepository::getDataByWhereGTLTClause();
//        return WhereClauseRepository::getDataByWhereLikeClause();
//        return WhereClauseRepository::getDataByOrWhereClause();
        return WhereClauseRepository::getDataByWhereArrayClause();
    }

    private function joinQueries() {
//        return JoinsRepository::getDataByInnerJoinClause();
//        return JoinsRepository::getDataByLeftJoinClause();
//        return JoinsRepository::getDataByRightJoinClause();
//        return JoinsRepository::getDataByCrossJoinClause();
//        return JoinsRepository::getDataByAdvancedJoinClause();
//        return JoinsRepository::getDataBySubQueryJoinsClause();
        return JoinsRepository::getDataByUnionClause();
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
//        return QueryBuilderRepository::rawMethods();
        return QueryBuilderRepository::rawGroupHaving();
    }

}
