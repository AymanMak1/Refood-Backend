<?php

 
class Preparation extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Preparation_model');
    } 

    /*
     * Listing of preparations
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('preparation/index?');
        $config['total_rows'] = $this->Preparation_model->get_all_preparations_count();
        $this->pagination->initialize($config);

        $data['preparations'] = $this->Preparation_model->get_all_preparations($params);
        
        $data['_view'] = 'preparation/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new preparation
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'user' => $this->input->post('user'),
				'expireAt' => date("Y-m-d",$this->input->post('expireAt')),
				'portions' => $this->input->post('portions'),
            );
            
            $preparation_id = $this->Preparation_model->add_preparation($params);
            redirect('preparation/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'preparation/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a preparation
     */
    function edit($preparationId)
    {   
        // check if the preparation exists before trying to edit it
        $data['preparation'] = $this->Preparation_model->get_preparation($preparationId);
        
        if(isset($data['preparation']['preparationId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'user' => $this->input->post('user'),
					'expireAt' => date("Y-m-d",strtotime($this->input->post('expireAt'))),
					'portions' => $this->input->post('portions'),
                );

                $this->Preparation_model->update_preparation($preparationId,$params);            
                redirect('preparation/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'preparation/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The preparation you are trying to edit does not exist.');
    } 

    /*
     * Deleting preparation
     */
    function remove($preparationId)
    {
        $preparation = $this->Preparation_model->get_preparation($preparationId);

        // check if the preparation exists before trying to delete it
        if(isset($preparation['preparationId']))
        {
            $this->Preparation_model->delete_preparation($preparationId);
            redirect('preparation/index');
        }
        else
            show_error('The preparation you are trying to delete does not exist.');
    }
    function assign($preparationId)
    {   $user = $this->session->userdata("auth"); 
        // check if the request exists before trying to edit it
        $data['preparation'] = $this->Preparation_model->get_preparation($preparationId);
        
        if(isset($data['preparation']['preparationId']))
        {
            
                $params = array(
                  
                    'user' => $user->UserId,
               
                );

                $this->Preparation_model->update_preparation($preparationId,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
}
