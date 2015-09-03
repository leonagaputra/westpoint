<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paket extends CI_Model {

    var $table = "paket";

    public function __construct() {
        parent::__construct();
    }

    public function get_all_paket() {
        $this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC, k.VCOLOR");
        $this->db->from($this->table. " p");
            $this->db->join('kategori k', 'p.KATEGORI_ID = k.ID');
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    }
    
    public function get_user_paket($user){
        $this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC, k.VCOLOR");
        $this->db->from($this->table. " p");
            $this->db->join('kategori k', 'p.KATEGORI_ID = k.ID');
            $this->db->join('userpaket up', 'up.PAKET_ID = p.ID');
            $this->db->join('users u', 'u.ID = up.USER_ID');
        $this->db->where('u.VEMAIL', $user);
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
