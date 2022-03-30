<?php

namespace Model;
use \Core\ORM;

class UserModel extends \Core\Entity
{
    public $table = "fiche_personne";

    /* private static $relations = [
        "has many" => [],
        "has one" => [],
        "many to many" => [],
    ]; */

    public function checkEmail($email)
	{
        $find = ORM::find($this->table, array('WHERE' => "email = '" . $email . "'"));
		if (empty($find)) {
			return true;
		} else {
			return false;
		}
    }

    public function checkUserPassword($password)
	{
        $find = ORM::read($this->table, $this->id);
		if (password_verify($password, $find['password'])) {
            return true;
        } else {
            return false; 
        }
    }
    
    public function getInfos($email)
	{
        $find = ORM::find($this->table, array('WHERE' => "email = '" . $email . "'"));
        return $find;
    }
    
    public function checkLogin($email, $password, &$message)
	{
        $infos = ORM::find($this->table, array('WHERE' => "email = '" . $email . "'"));

        foreach($infos as $info) {
            $infos_password = $info["password"];
        }
      
		if (!empty($infos)) {
            if (password_verify($password, $infos_password)) {
                return true;
            } else {
                $message = "<p>Password incorrect</p>";
                return false;
            }
            return true;
        } else {
            $message = "<p>Email incorrect</p>";
            return false;
        }
    }
}