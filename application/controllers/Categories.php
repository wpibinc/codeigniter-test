<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('category');
    }
    
    public function index()
    {
        
        $data['categories'] = $this->category->getItems();
        $this->load->view('categories', $data);
    }
    
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->category->create();
            redirect('/categories');
        }else{
            $this->load->view('add_category');
        }
    }
    
    public function edit($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->category->update($id);
            redirect('/categories');
        }else{

            $data['category'] = $this->category->getCategory($id);
            $this->load->view('add_category', $data);
        }
    }
    
    public function delete($id){
        $this->category->delete($id);
        redirect('/categories');
    }
}
