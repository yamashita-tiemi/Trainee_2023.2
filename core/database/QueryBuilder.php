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

    public function selectOne($table, $id)
    {
        $sql = "select * from {$table} where id = {$id}";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parametros) {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parametros)),
            ':' . implode(', :', array_keys($parametros))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parametros);
        } catch (Exception $e) {
            die("An error ocurred when trying to insert into database: {$e->getMessage()}");
        }
    }

    public function delete($table, $id){
        $sql = sprintf(
            'DELETE FROM %s WHERE %s',
            $table,
            'id= :id'
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute(compact('id'));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function editPosts($table, $id, $parametros)
    {
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s',
            $table,
            implode(', ', array_map( function($parametros) {
                return "{$parametros} = :{$parametros}";
            }, array_keys($parametros) )), 
            'id = :id'
        );

        $parametros['id'] = $id;

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parametros);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function edit ($id, $table, $parametros)
    {
        $sql = sprintf(
            'UPDATE %s
            SET %s
            WHERE %s;',
            $table,
            implode (', ', array_map(function ($parametros){
                return "{$parametros} = :{$parametros}";
            }, array_keys($parametros))),
            'id = :id' 
        );
        $parametros['id'] = $id;

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parametros);
        } catch (Exception $e){
            die("an error occurred when trying to uodate database : {$e->getMessage()}");
        }
    }

    public function deleteUser($table, $id){
        $sql = sprintf(
            'DELETE FROM %s WHERE %s',
            $table,
            "id = :id"
        );
        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute(compact('id'));
        }catch(Exception $e){
            die("an error occurred when trying to delete from database: {$e->getMessage()}");
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

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['id'])) {
            return $result['id'];
        } else {
            return 0;
        }
        
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}