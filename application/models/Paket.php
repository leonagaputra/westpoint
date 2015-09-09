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
    
    public function cek_user_soal($user_id, $soal_id){
        $this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC");
        $this->db->from($this->table. " p");            
            $this->db->join('userpaket up', 'up.PAKET_ID = p.ID');
            $this->db->join('users u', 'u.ID = up.USER_ID');
            $this->db->join('paketmodul pm', 'pm.PAKET_ID = p.ID');
            $this->db->join('modul m', 'pm.MODUL_ID = m.ID');
            $this->db->join('soal s', 's.MODUL_ID = m.ID');
        $this->db->where('u.ID', $user_id);
        $this->db->where('s.ID', $soal_id);
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return TRUE;
            }
        }
        return FALSE;
    }
    
    /**
     * Cek jumlah modul id dari suatu paket
     * @param type $paket_id
     * @return boolean FALSE jika tidak ada result, return row modul jika ada result
     */
    public function cek_modul($paket_id){
        $this->db->select("pm.MODUL_ID");
        $this->db->from($this->table. " p");            
            $this->db->join('paketmodul pm', 'pm.PAKET_ID = p.ID');
        $this->db->where('p.ID', $paket_id);
        if($query = $this->db->get())
        {
            if($query->num_rows() == 1)
            {                
                return $query->row();
            }
        }
        return FALSE;
    }
    
    /**
     * Cek jumlah soal id dari suatu modul
     * @param type $modul_id
     * @return boolean FALSE jika tidak ada result, return row soal jika ada result
     */
    public function cek_soal($modul_id){
        $this->db->select("s.ID");
        $this->db->from("MODUL m");            
            $this->db->join('soal s', 's.MODUL_ID = m.ID');
        $this->db->where('m.ID', $modul_id);
        if($query = $this->db->get())
        {
            if($query->num_rows() == 1)
            {                
                return $query->row();
            }
        }
        return FALSE;
    }

}
