<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hak_akses extends CI_Model {

    //var $table = "paket";

    public function __construct() {
        parent::__construct();
    }
    
    public function do_login($email, $password){
        $this->db->from("users");
        $this->db->where("UPPER(VEMAIL)", strtoupper($email));
        $this->db->where("VPASSWORD", $password);
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->row();
            }
        }
        return FALSE;
    }

    public function get_user_menu($user_id) {
        $this->db->select("m.ID, m.VDESC, m.VPATH, m.VBACKEND, m.VICON");
        $this->db->from("menu m");
            $this->db->join("rolemenu rm", 'rm.MENU_ID = m.ID');
            $this->db->join("role r", 'r.ID = rm.ROLE_ID');
            $this->db->join("userrole ur", 'ur.ROLE_ID = r.ID');
            $this->db->join("users u", 'u.ID = ur.USER_ID');
        $this->db->where("u.ID", $user_id);
        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {                
                return $query->result();
            }
        }
        return FALSE;
    }
    
    public function cek_hak_akses($user, $menu_path){
        $this->db->select("m.ID as MENU_ID, u.ID as USER_ID");
        $this->db->from("menu m");
            $this->db->join("rolemenu rm", 'rm.MENU_ID = m.ID');
            $this->db->join("role r", 'r.ID = rm.ROLE_ID');
            $this->db->join("userrole ur", 'ur.ROLE_ID = r.ID');
            $this->db->join("users u", 'u.ID = ur.USER_ID');
        $this->db->where("u.ID", $user);
        $this->db->where("m.VPATH", $menu_path);
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
