<?php
class Munkasmodel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_list() 
    {
        $this->db->select('m.id, m.vezeteknev, m.keresztnev, sz.nev');
        $this->db->from('munkasok m');
        $this->db->join('szallitoceg sz', 'sz.id=m.szallitoceg_id','inner');
        return $this->db->get()->result();
    }
    public function insert($vezeteknev, $keresztnev, $szallitoceg_id)
    {
        $record = [
            'vezeteknev'       =>  $vezeteknev, 
            'keresztnev'    =>  $keresztnev,
            'szallitoceg_id' => $szallitoceg_id,
        ];
        
        $this->db->insert('munkasok', $record);
        return $this->db->insert_id(); 
    }
}
?>