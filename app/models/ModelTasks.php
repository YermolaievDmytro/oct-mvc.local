<?php

namespace models;

use core\Model;
use mysqli;

class ModelTasks extends Model {

    public function __construct() {
	parent::__construct();
	$this->table = 'tasks';
    }

//    public function add() {
//        $tasks_name=$_POST('tasks_name');
//        //$query = "INSERT INTO tasks values (".$tasks_name.")";
//        var_dump($tasks_name);
//    }

    public function add() {
	$task_name = filter_input(INPUT_POST, 'task_name');
	$query = $this->db->escape_string("INSERT INTO tasks values(null, " . $task_name . ");");
	if (strlen($task_name) < 1 || strlen($task_name) > 254) {
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
