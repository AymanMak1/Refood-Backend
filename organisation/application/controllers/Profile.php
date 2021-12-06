<?php

 
class Profile extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organisation_model');
        
    } 

    /*
     * Listing of genders
     */
    function index()
    {
        function index()
        {
         
            $user = $this->session->userdata("auth"); 
            $data['organisations'] = $this->Organisation_model->get_organisation($user->organisationId);
            
            $this->load->view('profile',$data);
        }
    }

    /*
     * Adding a new gender
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'gendeName' => $this->input->post('gendeName'),
            );
            
            $gender_id = $this->Gender_model->add_gender($params);
            redirect('gender/index');
        }
        else
        {            
            $data['_view'] = 'gender/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a gender
     */
    function edit($genderId)
    {   
        // check if the gender exists before trying to edit it
        $data['gender'] = $this->Gender_model->get_gender($genderId);
        
        if(isset($data['gender']['genderId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'gendeName' => $this->input->post('gendeName'),
                );

                $this->Gender_model->update_gender($genderId,$params);            
                redirect('gender/index');
            }
            else
            {
                $data['_view'] = 'gender/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gender you are trying to edit does not exist.');
    } 

    /*
     * Deleting gender
     */
    function remove($genderId)
    {
        $gender = $this->Gender_model->get_gender($genderId);

        // check if the gender exists before trying to delete it
        if(isset($gender['genderId']))
        {
            $this->Gender_model->delete_gender($genderId);
            redirect('gender/index');
        }
        else
            show_error('The gender you are trying to delete does not exist.');
    }
    
}
