<?php
namespace My\Dao;

abstract class BaseDao {
    private $db = null;
    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "mysql";
    const DB_NAME = "status_poster";
    
    protected final function getDB() {
        $dsn = 'mysql:dbname='.self::DB_NAME.';host='.self::DB_SERVER;
        
        try {
            $this->db = new \PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $exc) {
            throw new \Exception('Connection Failed: ' . $exc->getMessage());
        }
         
        return $this->db;
    
    }
    
    abstract protected function get($uniqueKey);
    abstract protected function insert(array $values);
    abstract protected function update($id, array $values);
    abstract protected function delete($uniqueKey);
    
}

?>
