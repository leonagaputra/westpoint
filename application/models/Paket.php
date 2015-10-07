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
    
    public function get_available_paket($user_id) {
        $this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC, k.VCOLOR");
        $this->db->from($this->table. " p");
            $this->db->join('kategori k', 'p.KATEGORI_ID = k.ID');
        $this->db->where('p.ID NOT IN (SELECT PAKET_ID FROM userpaket WHERE USER_ID = '.$user_id." AND VTRIAL = 'F' AND DSTART <= now() AND DEND >= now())");
        if($query = $this->db->get())
        { //echo $this->db->last_query();exit;
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    }
    
    public function get_user_paket($user){
        $this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC, k.VCOLOR, up.VTRIAL");
        $this->db->from($this->table. " p");
            $this->db->join('kategori k', 'p.KATEGORI_ID = k.ID');
            $this->db->join('userpaket up', 'up.PAKET_ID = p.ID');
            $this->db->join('users u', 'u.ID = up.USER_ID');
        $this->db->where('u.VEMAIL', $user);
        $this->db->where('up.DSTART <= now()');
        $this->db->where('up.DEND >= now()');
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    }
    
    public function cek_user_soal($user_id, $soal_id, $no_trial = FALSE){
        //$this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC");
        $this->db->from($this->table. " p");            
            $this->db->join('userpaket up', 'up.PAKET_ID = p.ID');
            $this->db->join('users u', 'u.ID = up.USER_ID');
            $this->db->join('paketmodul pm', 'pm.PAKET_ID = p.ID');
            $this->db->join('modul m', 'pm.MODUL_ID = m.ID');
            $this->db->join('soal s', 's.MODUL_ID = m.ID');
        $this->db->where('u.ID', $user_id);
        $this->db->where('s.ID', $soal_id);
        $this->db->where('up.DSTART <= now()');
        $this->db->where('up.DEND >= now()');
        if($no_trial == TRUE){
            $this->db->where("up.VTRIAL", "F");
        } 
        /*else if ($no_trial == FALSE){
            $this->db->where("up.VTRIAL", "T");
        }*/
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if($query)
        {
            //$this->db->last_query();exit;
            if($query->num_rows() > 0)
            {   
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function cek_user_soal_is_trial($user_id, $soal_id){
        $this->db->select("up.VTRIAL");
        $this->db->from($this->table. " p");            
            $this->db->join('userpaket up', 'up.PAKET_ID = p.ID');
            $this->db->join('users u', 'u.ID = up.USER_ID');
            $this->db->join('paketmodul pm', 'pm.PAKET_ID = p.ID');
            $this->db->join('modul m', 'pm.MODUL_ID = m.ID');
            $this->db->join('soal s', 's.MODUL_ID = m.ID');
        $this->db->where('u.ID', $user_id);
        $this->db->where('s.ID', $soal_id);        
        /*else if ($no_trial == FALSE){
            $this->db->where("up.VTRIAL", "T");
        }*/
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if($query)
        {
            //$this->db->last_query();exit;
            if($query->num_rows() > 0)
            {   
                $result = $query->row();
                if($result->VTRIAL == 'F') return FALSE;
                else return TRUE;
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
        $this->db->from("modul m");            
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
    
    public function cek_user_paket($user_id, $paket_id, $count = TRUE, $cek_aktif = FALSE, $cek_trial = FALSE){
        if($count)
            $this->db->select("count(USER_ID) as cnt");                
        $this->db->from("userpaket");            
        $this->db->where('USER_ID', $user_id);
        $this->db->where('PAKET_ID', $paket_id);
        if($cek_aktif){
            $this->db->where('DSTART <= now()');
            $this->db->where('DEND >= now()');
            //$this->db->where("VTRIAL", "F");
        }
        if($cek_trial){
            $this->db->where("VTRIAL", "F");
        }
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->row();
            }
        }
        return FALSE;
    } 
    
    public function cek_user_paket_aktif($user_id, $paket_id){        
        $this->db->select("count(USER_ID) as cnt");                
        $this->db->from("userpaket");            
        $this->db->where('USER_ID', $user_id);
        $this->db->where('PAKET_ID', $paket_id);        
        $this->db->where('((DSTART <= now() AND DEND >= now()) AND VTRIAL = "F")');            
            
        if($query = $this->db->get())
        {//echo $this->db->last_query();exit;
            if($query->num_rows() > 0)
            {                
                return $query->row();
            }
        }
        return FALSE;
    } 
    
    public function get_paket($paket_id){     
        $this->db->select("p.ID, p.VTITLE, p.VTITLESH, p.VDESC, k.VCOLOR");
        $this->db->from("paket p");       
            $this->db->join('kategori k', 'k.ID = p.KATEGORI_ID');
        $this->db->where('p.ID', $paket_id);        
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
