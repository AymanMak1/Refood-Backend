<?php

 
class Pickup extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pickup_model');
    } 

    /*
     * Listing of pickups
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('pickup/index?');
        $config['total_rows'] = $this->Pickup_model->get_all_pickups_count();
        $this->pagination->initialize($config);

        $data['pickups'] = $this->Pickup_model->get_all_pickups($params);
        
        $data['_view'] = 'pickup/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new pickup
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   $user = $this->session->userdata("auth");
            $params = array(
				'providerReview' => $this->input->post('providerReview'),
				'VolunteerReview' => $this->input->post('VolunteerReview'),
				'provider' => $user->providerId,
				'user' => $this->input->post('user'),
				'quality' => $this->input->post('quality'),
				'date' =>date("Y-m-d",strtotime($this->input->post('date'))),
				'pickUptime' =>date("Y-m-d",strtotime($this->input->post('pickUptime'))), 
				'portions' => $this->input->post('portions'),
            );
            
            $pickup_id = $this->Pickup_model->add_pickup($params);
            redirect('pickup/index');
        }
        else
        {
			$this->load->model('Provider_model');
			$data['all_providers'] = $this->Provider_model->get_all_providers();

			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'pickup/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a pickup
     */
    function edit($pickUpId)
    {   
        // check if the pickup exists before trying to edit it
        $data['pickup'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset($data['pickup']['pickUpId']))
        {$user = $this->session->userdata("auth");
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'providerReview' => $this->input->post('providerReview'),
					'VolunteerReview' => $this->input->post('VolunteerReview'),
					'provider' => $user->providerId,
					'user' => $this->input->post('user'),
					'quality' => $this->input->post('quality'),
					'date' => $this->input->post('date'),
					'pickUptime' => $this->input->post('pickUptime'),
					'portions' => $this->input->post('portions'),
                );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('pickup/index');
            }
            else
            {
				$this->load->model('Provider_model');
				$data['all_providers'] = $this->Provider_model->get_all_providers();

				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'pickup/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pickup you are trying to edit does not exist.');
    } 

    /*
     * Deleting pickup
     */
    function remove($pickUpId)
    {
        $pickup = $this->Pickup_model->get_pickup($pickUpId);

        // check if the pickup exists before trying to delete it
        if(isset($pickup['pickUpId']))
        {
            $this->Pickup_model->delete_pickup($pickUpId);
            redirect('pickup/index');
        }
        else
            show_error('The pickup you are trying to delete does not exist.');
    }
    
    function assign($pickUpId)
    {   $user = $this->session->userdata("auth"); 
        // check if the request exists before trying to edit it
        $data['pickup'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset( $data['pickup']['pickUpId']))
        {
            
                $params = array(
                  
                    'user' => $user->UserId,
               
                );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The pick up you are trying to edit does not exist.');
    } 

    function reqpart($id)
    {   
        // check if the request exists before trying to edit it
        $data['organisation'] = $this->Provider_model->get_provider($id);
        
        if(isset($data['organisation']['organisationId']))
        {
            
                $params = array(
                  
                    'approved' => 1,
               
                );

                $this->Provider_model->update_provider($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }

    function rateone($pickUpId)
    {   
        $data['delivery'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'VolunteerReview' => 1,
                 );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
   
    function ratetwo($pickUpId)
    {   
        $data['delivery'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'VolunteerReview' => 2,
                 );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratethree($pickUpId)
    {   
        $data['delivery'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'VolunteerReview' => 3,
                 );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratefour($pickUpId)
    {   
        $data['delivery'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'VolunteerReview' => 4,
                 );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratefive($pickUpId)
    {   
        $data['delivery'] = $this->Pickup_model->get_pickup($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'VolunteerReview' => 5,
                 );

                $this->Pickup_model->update_pickup($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
}