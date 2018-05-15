<?php
/**
 * Created by PhpStorm.
 * User: cyber
 * Date: 1/4/2018
 * Time: 11:27 PM
 */

namespace Dry\Core\Database;


use Dry\Core\Config\Config;
use Dry\Core\Config\ConfigInterface;
use PDO;

class Database implements DatabaseInterface
{
    private $pdo;
    private $config;
    private $transcationEnabled = false;
    private $connected = false;


    public static function database()
    {
        static $databaseInstance = null;
        if($databaseInstance===null)
        {
            $databaseInstance = new Database(Config::config());
        }

        return $databaseInstance;
    }

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
        $this->pdo = $this->connect();

    }

    private function connect()
    {
        $dsn = $this->config->getDatabaseDsn();
        $username = $this->config->getDatabaseUsername();
        $password = $this->config->getDatabasePassword();

        //connect
        $conn = new PDO($dsn,$username,$password);
        $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);

        $this->connected = true;

        return $conn;
    }

    public function getPDO(): PDO
    {
        return $this->pdo;
        // TODO: Implement getPDO() method.
    }

    public function select(string $table, string $where="", array $bindings=array(),string $columns="*")
    {
        // TODO: Implement select() method.
        $sql = "SELECT $columns FROM $table";

        if(!empty($where))
        {
            $sql.=' WHERE '.$where;

        }

        return $this->sqlQuery($sql,$bindings);
    }

    public function isQuerySuccessful(string $sql, array $bindings): bool
    {
        // TODO: Implement isQuerySuccessful() method.
        return $this->sqlQuery($sql,$bindings)==false ? false : true;
    }

    public function insert(string $table, string $columns, string $values, array $bindings): bool
    {
        // TODO: Implement insert() method.
        $sql = "INSERT INTO $table ($columns) VALUES($values )";
        return $this->isQuerySuccessful($sql,$bindings);
    }

    public function update(string $table, string $set, string $where, array $bindings): bool
    {
        // TODO: Implement update() method.
        $sql = "UPDATE $table SET $set WHERE $where";
        return $this->isQuerySuccessful($sql,$bindings);
    }

    public function delete(string $table, string $where, array $bindings): bool
    {
        // TODO: Implement delete() method.
        $sql = "DELETE FROM $table WHERE $where";
        return $this->isQuerySuccessful($sql,$bindings);
    }

    public function deleteAll(string $table): bool
    {
        // TODO: Implement deleteAll() method.
        $sql = "DELETE FROM $table";

        return $this->isQuerySuccessful($sql);
    }

    public function commit(): bool
    {
        // TODO: Implement commit() method.
        if($this->transcationEnabled)
        {
            $this->transcationEnabled = False;
            return $this->pdo->commit();

        }
        return false;

    }

    public function rollback(): bool
    {
        // TODO: Implement rollback() method.

        if($this->transcationEnabled)
        {
            $this->transcationEnabled = False;
            return $this->pdo->rollback();
        }

        return false;
    }

    public function sqlQuery(string $sql, array $bindings)
    {

        // TODO: Implement sqlQuery() method.
        $this->beginTranscation();
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bindings);

        return $stmt->rowCount() > 0 ? $stmt : false;
    }

    public function beginTranscation()
    {
        // TODO: Implement beginTranscation() method.
        if(!$this->transcationEnabled)
        {
            $this->pdo->beginTransaction();
            $this->transcationEnabled = True;
        }
    }



}