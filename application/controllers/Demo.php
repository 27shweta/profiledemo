<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	
    
	public function profile()
	{   
        $this->load->model('Main_model');
        $data['profiledt']=$this->Main_model->getprofile();
        $data['coun'] = $this->Main_model->getCountry();
		$this->load->view('profile_form',$data);
	}
    
    public function getcountry()
	{
		$postData = $this->input->post();
    
        $this->load->model('Main_model');

        $data = $this->Main_model->getcontrydata($postData);
//         echo"<pre>";print_r($data);die();
        echo json_encode($data); 
	}
    
    public function insert_profile(){
        $this->load->library('form_validation');
//        echo"<pre>";print_r($_POST);die();
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('email','Email Address','required|valid_email|is_unique[profile_tbl.email]');
        $this->form_validation->set_rules('inputcontry','Country Name', 'required');
        $this->form_validation->set_rules('inputState','State Name', 'required');
        $this->form_validation->set_rules('inputphone','Mobile number', 'numeric');
        $this->form_validation->set_rules('inputusername','Username', 'required');
         $this->form_validation->set_rules('inputpassword','Password', 'required|min_length[5]');
//         $this->form_validation->set_rules('profiledata','Profile Image', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } 
        else{
        $this->load->model('Main_model');
        $config['upload_path']="./image/";
        $config['allowed_types']='gif|jpg|png';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("profiledata")){
            $data = array('upload_data' => $this->upload->data());
    //             echo"<pre>";print_r($data);die; 
                $data1 = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'city' => $this->input->post('inputcontry'),
                'state' => $this->input->post('inputState'),
                'contact_no' => $this->input->post('inputphone'),
                'username' => $this->input->post('inputusername'),
                'password' => $this->input->post('inputpassword'),
                'profile_img' => $data['upload_data']['file_name']    
                );  
    //          echo"<pre>";print_r($data1);die;  
            $result= $this->Main_model->save_profile('profile_tbl',$data1);
    //         echo"<pre>";print_r($result);die;   
            if ($result == TRUE) {
                echo "Your Profile data inserted successfully!";
            }
        }
        else{
            echo json_encode($this->upload->display_errors());
        }
      }
    }
   
}
?>