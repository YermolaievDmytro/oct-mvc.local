<?php

namespace models;

use core\Model;
use mysqli;

class ModelTasks extends Model {

    public function __construct() {
	parent::__construct();
	$this->table = 'tasks';
    }

    public function add() {
	$task_name = filter_input(INPUT_POST, 'task_name');
	$task_name = $this->db->escape_string($task_name);
	$query = "INSERT INTO tasks values (null, '" . $task_name . "');";
	if (strlen($query) < 1 || strlen($query) > 254) {
	    echo 'length of string is false';
	    return FALSE; //TODO echo error
	}

	$this->db->query($query);
	if ($this->db->error) {
	    echo $this->db->error;
	    return FALSE; //TODO echo error
	}
	header('Location: /tasks ');
    }

    public function delete($id) {
	$query = 'DELETE FROM `tasks` WHERE `tasks`.`id` = ' . $id . ';';
	$this->db->query($query);
	if ($this->db->error) {
	    echo $this->db->error;
	    return FALSE; //TODO echo error
	}
	header('Location: /tasks ');
    }

    public function getbyid($id) {
	$query = "SELECT * FROM " . $this->table . " where id=" . $id . ";";
	$result = $this->db->query($query);
	if (!$result) {
	    return false;
	}
	$result = $result->fetch_all(MYSQLI_ASSOC);
	return $result[0];
    }

    public function update($id, $name) {
	$name = $this->db->escape_string($name);
	$query = "UPDATE `tasks` SET `name` = '" . $name . "' WHERE `tasks`.`id` = " . $id . ";";
	if (strlen($query) < 1 || strlen($query) > 254) {
	    echo 'length of string is false';
	    return FALSE; //TODO echo error
	}
	$this->db->query($query);
	if ($this->db->error) {
	    echo $this->db->error;
	    return FALSE; //TODO echo error
	}
	header('Location: /tasks ');
    }

}
