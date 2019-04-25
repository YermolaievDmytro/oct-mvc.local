<?php

namespace models;

use core\Model;
use mysqli;

class ModelTasks extends Model {

    /**
     *
     * @var mysqli
     */
    protected $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    }

    public function all() {
        $query = "SELECT * FROM tasks;";
        $result = $this->db->query($query);
        if (!$result) {
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

//    public function add() {
//        $tasks_name=$_POST('tasks_name');
//        //$query = "INSERT INTO tasks values (".$tasks_name.")";
//        var_dump($tasks_name);
//    }
    
    public function add(){
        $task_name = filter_input(INPUT_POST, 'task_name');
        $query = $this->db->escape_string("INSERT INTO tasks values(null, ".$task_name.");");
        if(strlen($task_name)<1 || strlen($task_name)>254){
            echo 'length of string is false';
            return FALSE;
        }        
        
        $this->db->query($query);
        if ($this->db->error) {
            echo $this->db->error;
            return FALSE;
        }
        header('Location: /tasks ');
    }

}
