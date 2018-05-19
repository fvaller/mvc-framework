<?php

namespace SON\Model;


abstract class Table
{
    protected $db;
    protected $table;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->db->query($sql);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC); //retorno dados em array
    }

}