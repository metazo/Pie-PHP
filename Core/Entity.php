<?php

namespace Core;

class Entity
{
    public $table;
    public $fields;

    public function __construct($inputs = [])
    {  
        if ($inputs != null) {
            foreach ($inputs as $key => $value) {
                $this->$key = $value;
            }
            $this->fields = $inputs;
        }
        if (isset($_SESSION["id"])) {
            $id["id"] = $_SESSION['id'];
            $this->id =  $id["id"];
        }
    }

    public function create()
    {
        return ORM::create($this->table, $this->fields);
    }

    public function read()
    {
        return ORM::read($this->table, $this->id);
    }

    public function update()
    {
        return ORM::update($this->table, $this->id, $this->fields);
    }

    public function delete()
    {
        return ORM::delete($this->table, $this->id);
    }

    public function find()
    {
        return ORM::find($this->table);
    }
}