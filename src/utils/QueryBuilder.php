<?php

namespace App\Utils;

use App\Utils\DB;

class QueryBuilder
{
    /**
     * columns to select
     */
    private array $select = [];

    /**
     * columns to insert
     */
    private array $insertColumns = [];

    /**
     * columns values to insert
     */
    private array $insertValues = [];

    /**
     * target table
     */
    private string $table = '';

    /**
     * DB property
     */
    private DB $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * return a new instance
     */
    public static function newQuery()
    {
        return new self();
    }

    /**
     * add columns to select
     */
    public function selectAll()
    {
        $this->select[] = '*';
        return $this;
    }

    /**
     * add columns to select
     */
    public function addSelect($columns)
    {
        if (is_array($columns)) {
            $this->select = array_merge($this->select, $columns);
        } else {
            $this->select[] = $columns;
        }
        return $this;
    }

    /**
     * set table
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * build the select query
     */
    public function buildSelectQuery()
    {
        $selectClause = empty($this->select) ? '*' : implode(', ', $this->select);
        return "SELECT $selectClause FROM $this->table";
    }

    /**
     * build the query and execute select
     */
    public function get()
    {
        return $this->db->select($this->buildSelectQuery());
    }

    /**
     * add data to insert
     */
    public function addInsert($data)
    {
        foreach ($data as $column => $value) {
            $this->insertColumns[] = $column;
            $this->insertValues[] = $value;
        }
        return $this;
    }

    /**
     * build the insert query
     */
    public function buildInsertQuery()
    {
        $columns = implode(', ', $this->insertColumns);
        $values = implode(', ', array_map(fn ($value) => "'" . $value . "'", $this->insertValues));
        return "INSERT INTO $this->table ($columns) VALUES ($values)";
    }

    /**
     * execute insert Query
     */
    public function insert()
    {
        $this->db->exec($this->buildInsertQuery());

        return $this->db->lastInsertId();
    }

    /**
     * delete record by id/s
     */
    public function delete($ids)
    {
        if (is_array($ids)) {
            $idsList = implode(', ', $ids);
        } else {
            $idsList = $ids;
        }
        return $this->db->exec("DELETE FROM $this->table WHERE id IN ($idsList)");
    }
}
