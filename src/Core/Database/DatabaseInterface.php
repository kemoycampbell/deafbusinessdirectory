<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 10:57 PM
 */

namespace Dry\Core\Database;

use PDO;
interface DatabaseInterface
{
    public function sqlQuery(string $sql, array $bindings);
    public function getPDO():PDO;
    public function select(string $table,string $where, array $bindings,string $columns);
    public function isQuerySuccessful(string $sql, array $bindings):bool;
    public function insert(string $table, string $columns, string $values, array $bindings):bool;
    public function update(string $table,string $set, string $where, array $bindings):bool;
    public function delete(string $table,string $where, array $bindings):bool;
    public function deleteAll(string $table):bool;
    public function commit():bool;
    public function rollback():bool;

    public function beginTranscation();



}