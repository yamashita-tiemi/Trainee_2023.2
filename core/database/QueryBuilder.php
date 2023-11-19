<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function autenticar($table, $email, $senha)
    {

        $sql = sprintf(
            'SELECT id FROM %s WHERE email = :email AND password = :senha',
            $table
        );
    

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);


            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}