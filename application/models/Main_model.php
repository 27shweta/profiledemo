<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct(){
            parent::__construct();
             $this->load->database();
         }
 
  function getCountry(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('country');
    $response = $q->result_array();

    return $response;
  }

 
  function getcontrydata($postData){
    $response = array();
 
    // Select record
    $this->db->select('state_id,state_name');
    $this->db->where('country_name', $postData['country']);
    $q = $this->db->get('state');
    $response = $q->result_array();
//echo $this->db->last_query();die;
    return $response;
  }
    
    function save_profile($table,$data1)
    {
        $query = $this->db->set($data1)->insert($table);
//         echo"<pre>";print_r($query);die;
         return $this->db->insert_id();
    }   
    
    function getprofile(){
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('profile_tbl');  
         return $query; 
                	
    }
}