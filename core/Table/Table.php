<?php

namespace Core\Table;

use Core\Database;

class Table
{
    protected $table;
    protected Database $db_connect;

    /**
     * @param Database $db_connect
     */
    public function __construct(Database $db_connect)
    {
        $this->db_connect = $db_connect;
        if(is_null($this->table)){
            $parts = explode("\\", get_class($this));
            $classname = end($parts);
            $this->table = strtolower(str_replace("Table", "", $classname)) . "s";
        }
    }

    /**
     * @return array|false
     */
    public function all()
    {
        return $this->db_connect->query("SELECT * FROM {$this->table}");
    }

    /**
     * @param $fields
     * @param $values
     * @param $attributes
     * @return false|\PDOStatement
     */
    public function create($fields,$values, $attributes)
    {
        return $this->db_connect->prepare("INSERT INTO {$this->table}($fields) VALUES($values)", $attributes);
    }

    /**
     * @param $field
     * @param $attributes
     * @return false|\PDOStatement
     */
    public function update($field, $attributes)
    {
        $query_edit = $this->db_connect->prepare(
            "UPDATE {$this->table}
            SET {$field}
            WHERE id = :id"
        , $attributes);

        return $query_edit;
    }

    /**
     * @param $post
     * @return false|\PDOStatement
     */
    public function delete($post)
    {
        return $this->db_connect->prepare("DELETE FROM voitures WHERE id = :id", [ ':id' => $post]);
    }

}