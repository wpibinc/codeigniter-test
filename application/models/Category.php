<?php

class Category extends CI_Model {
    
    
    
    public $title;
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function create(){
        $this->title    = $_POST['name']; 
        
        $this->db->insert('categories', $this);
    }
    
    public function update($id){
        $this->title    = $_POST['name']; 
        $this->db->update('categories', $this, array('id' => $id));
    }
    
    public function delete($id){
        $this->db->delete('categories', array('id' => $id));
    }
    
    public function getItems(){
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    public function getCategory($id){
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        return $query->result();
    }
}

