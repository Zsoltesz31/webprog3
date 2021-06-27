<?php
class Regiomodel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list() 
    {
        $this->db->select('r.id, r.nev, r.ország');
        $this->db->from('regiok r');
        return $this->db->get()->result();
    }
    public function insert($nev, $orszag)
    {
        $record = [
            'nev'       =>  $nev, 
            'ország'    =>  $orszag,
        ];
        
        $this->db->insert('regiok', $record);
        return $this->db->insert_id(); 
    }
    public function delete($id){

        $this->db->where('id',$id);
        return $this->db->delete('regiok');
    }
    public function get_one($id){
        
        $this->db->select('r.id, r.nev, r.ország');
        $this->db->from('regiok r');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
}
?>