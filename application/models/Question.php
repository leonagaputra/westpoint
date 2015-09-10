<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question extends CI_Model {

    var $table = "questions";

    public function __construct() {
        parent::__construct();
    }

    public function cek_answer($id, $answer) {
        $this->db->select("count(ID) as CNT");
        $this->db->from($this->table. " q");
        $this->db->where("ID", $id);
        $this->db->where("UPPER(VJAWAB)", $answer);
            //echo $this->db->get_compiled_select();
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->row();
            }
        }
        return FALSE;
    }
    
    

}
