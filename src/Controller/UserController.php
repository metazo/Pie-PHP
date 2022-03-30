<?php

namespace Controller;

ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

class UserController extends \Core\Controller
{
	public function registerAction() 
	{
		$message = '';
		$this->render("register", []);
		$request = new \Core\Request;
		$inputs = $request->getQueryParams();

		if (isset($inputs) && $inputs != null) {
			$inputs["password"] = password_hash($inputs["password"], PASSWORD_BCRYPT);
			$user = new \Model\UserModel($inputs);
			if ($user->checkEmail($inputs["email"])) {
				$user->id = $user->create();
				$_SESSION["log"] = true;
				$infos = $user->read();
				foreach ($infos as $key => $value) {
					$_SESSION[$key] = $value;
				}
				$this->redirect("show");
				exit();
			}else {
				$message = "<p>Email already used</p>";
			}
		}
		$this->render("register", ["message" => $message]);
	}

	public function showAction()
	{
		$message = "";
		if (!isset($_SESSION["log"]) || $_SESSION["log"] === false) {
			$this->redirect("login");
			exit();
		} 
		$request = new \Core\Request;
		$inputs = $request->getQueryParams();
		if ($inputs != null) {
			if (isset($inputs["old_password"]) && isset($inputs["password"])) {
				$inputs["password"] = password_hash($inputs["password"], PASSWORD_BCRYPT);
				$user = new \Model\UserModel($inputs);
				if ($user->checkUserPassword($inputs["old_password"])) {
					$user->update();
					$infos = $user->read();
					foreach ($infos as $key => $value) {
						$_SESSION[$key] = $value;
					}
					$message = "<p>Password changed</p>";
					$this->render("show", ["message" => $message]);
					exit();
				} else {
					$message = "<p>Incorrect password !</p>";
					$this->render("show", ["message" => $message]);
					exit();
				}
			} else if (isset($inputs["email"]) && !empty($inputs["email"])) {
				$user = new \Model\UserModel($inputs);
				if ($user->checkEmail($inputs["email"])) {
					$user->update();
					$infos = $user->read();
					foreach ($infos as $key => $value) {
						$_SESSION[$key] = $value;
					}
					$message = "<p>Email changed</p>";
					$this->render("show", ["message" => $message]);
					exit();
				} else {
					$message = "<p>Email already used</p>";
					$this->render("show", ["message" => $message]);
					exit();
				}	
			} else if (isset($inputs["logout"])) {
				$_SESSION = array();
				session_destroy();
				$this->redirect("login");
				exit();
			}
		}
		$this->render("show", []);
	}

	public function deleteAction() 
	{
		$message = "";
		if (isset($_SESSION["id"]) && $_SESSION["id"] != null) {
			$request = new \Core\Request;
			$inputs = $request->getQueryParams();
			$user = new \Model\UserModel($inputs);
			$user->delete();
			$_SESSION["log"] = false;
			$message = "<p>Account deleted !</p>";
			$this->render("delete", ["message" => $message]);
			$_SESSION = array();
			session_destroy();
		} else {
			$this->redirect("register");
			exit();
		}
	}

	public function loginAction() 
	{
		$message = '';
		$this->render("login", []);
		$request = new \Core\Request;
		$inputs = $request->getQueryParams();
	
		if (isset($inputs) && $inputs != null) {
			$user = new \Model\UserModel($inputs);
			if ($user->checkLogin($inputs["email"], $inputs["password"], $message)) {
				$_SESSION["log"] = true;
				$infos = $user->getInfos($inputs["email"]);
				foreach ($infos as $info) {
					foreach ($info as $key => $value) {
						$_SESSION[$key] = $value;
					}
				}
				$this->redirect("show");
				exit();
			}
		}
		$this->render("login", ["message" => $message]);
	}

	public function addAction()
	{
		echo "Hello";
	}
}