<?php 
class Termekmodel extends CI_Model{
    public function __contruct(){
        parent::__construct();
        
        $this->load->database();
    }


public function get_list(){
    $this->db->select('t.id, t.nev, t.anyag');
    $this->db->from('termek t');
    
    return $this->db->get()->result();
}
public function get_one($id){
        
    $this->db->select('t.id, t.nev, t.anyag');
    $this->db->from('termek t');
    $this->db->where('id', $id);
    return $this->db->get()->row();
}
public function delete($id){

    $this->db->where('id',$id);
    return $this->db->delete('termek');
}

public function update($id, $nev, $anyag){
    $record = [
        'nev'       =>  $nev, 
        'anyag' => $anyag,
    ];
    
    $this->db->where('id', $id);
    return $this->db->update('termek',$record);
}

public function insert($nev, $anyag)
{
    $record = [
        'nev'       =>  $nev, 
        'anyag'     =>  $anyag,
    ];
    
    $this->db->insert('termek', $record);
    return $this->db->insert_id(); 
}

}
?>