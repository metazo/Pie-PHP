<?php

namespace Core;

class ORM
{
    public static $database;

    public static function create($table, $fields)
    {
        self::$database->query("INSERT INTO $table (". implode(", ", array_flip($fields)) . ") VALUES (\"" . implode("\", \"", array_values($fields)) ."\")");
        return self::$database->lastInsertId();
    }

    public static function read($table, $id)
    {
        $query = self::$database->query("SELECT * FROM $table WHERE id = $id");
		return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public static function update($table, $id, $fields)
    {
        $str_fields = "";
        if (isset($fields) && $fields != null) {
            foreach ($fields as $key => $value) {
                if (!empty($value) && $key != "old_password") {
                    $str_fields .= $key . " = '" . $value . "'";
                }
            }
            $str_fields = rtrim($str_fields, ", ");
        }
        $query = self::$database->query("UPDATE $table SET $str_fields WHERE id = $id");
        return $query;
    }

    public static function delete($table, $id)
    {
        $query = self::$database->query("DELETE FROM $table WHERE id = $id");
        return $query;
    }

    public static function find($table, $params = array('WHERE' => '', 'ORDER BY' => '', 'LIMIT' => ''))
    {
        if (isset($params)) {
			$str_params = '';
			foreach ($params as $key => $value) {
				if ($value != null) {
					$str_params .= $key . ' ' . $value . ' ';
                }	
            }
        }
        $query = self::$database->query("SELECT * FROM $table $str_params");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }   
}

ORM::$database = Database::getDatabase()->handle();