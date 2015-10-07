<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Model {

    var $table = "txnpaket";

    public function __construct() {
        parent::__construct();
    }

    public function get($id) {
        $this->db->select("u.VNAMA, u.VEMAIL, t.VIDKUITANSI, t.DTRANS, t.IAMOUNT, p.VTITLE, t.PAKET_ID, t.USER_ID");        
        $this->db->from($this->table. " t");
            $this->db->join('users u', 'u.ID = t.USER_ID');
            $this->db->join('paket p', 'p.ID = t.PAKET_ID');
        $this->db->where('t.ID', $id);
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
