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
    
    public function get_soal_by_user_paket($user_id, $paket_id){
        $this->db->select("h.ISKOR, h.DCREA, s.VDESC");
        $this->db->from("hdranswer h");
            $this->db->join("soal s", "s.ID = h.SOAL_ID");
            $this->db->join("modul m", "m.ID = s.MODUL_ID");
            $this->db->join("paketmodul pm", "pm.MODUL_ID = m.ID");
        $this->db->where("h.USER_ID", $user_id);
        $this->db->where("pm.PAKET_ID", $paket_id);
        $this->db->order_by("h.DCREA", "desc");
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    }    

}
