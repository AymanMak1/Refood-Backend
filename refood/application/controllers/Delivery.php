<?php


class Delivery extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery_model');
    } 

    /*
     * Listing of deliveries
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('delivery/index?');
        $config['total_rows'] = $this->Delivery_model->get_all_deliveries_count();
        $this->pagination->initialize($config);

        $data['deliveries'] = $this->Delivery_model->get_all_deliveries($params);
        
        $data['_view'] = 'delivery/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new delivery
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'organisationReview' => $this->input->post('organisationReview'),
				'VolunteerReview' => $this->input->post('VolunteerReview'),
				'user' => $this->input->post('user'),
				'organisation' => $this->input->post('organisation'),
				'quality' => $this->input->post('quality'),
                'date' => date("Y-m-d",strtotime($this->input->post('date'))),
                'pickUptime' => date("h:i",strtotime($this->input->post('pickUptime'))),
				'portions' => $this->input->post('portions'),
            );
            
            $delivery_id = $this->Delivery_model->add_delivery($params);
            redirect('delivery/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();

			$this->load->model('Organisation_model');
			$data['all_organisations'] = $this->Organisation_model->get_all_organisations();
            
            $data['_view'] = 'delivery/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a delivery
     */
    function edit($pickUpId)
    {   
        // check if the delivery exists before trying to edit it
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'organisationReview' => $this->input->post('organisationReview'),
					'VolunteerReview' => $this->input->post('VolunteerReview'),
					'user' => $this->input->post('user'),
					'organisation' => $this->input->post('organisation'),
					'quality' => $this->input->post('quality'),
					'date' => date("Y-m-d",strtotime($this->input->post('date'))),
                    'pickUptime' => date("h:i",strtotime($this->input->post('pickUptime'))),
					'portions' => $this->input->post('portions'),
                );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

				$this->load->model('Organisation_model');
				$data['all_organisations'] = $this->Organisation_model->get_all_organisations();

                $data['_view'] = 'delivery/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 

    /*
     * Deleting delivery
     */
    function remove($pickUpId)
    {
        $delivery = $this->Delivery_model->get_delivery($pickUpId);

        // check if the delivery exists before trying to delete it
        if(isset($delivery['pickUpId']))
        {
            $this->Delivery_model->delete_delivery($pickUpId);
            redirect('delivery/index');
        }
        else
            show_error('The delivery you are trying to delete does not exist.');
    }

    function assign($pickUpId)
    {   $user = $this->session->userdata("auth"); 
        // check if the request exists before trying to edit it
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
            
                $params = array(
                  
                    'user' => $user->UserId,
               
                );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 

    function rate($organisationReview)
    {     $pickUpId =  $_SESSION['pickup'] ;
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
            
                $params = array(
                  
                    'organisationReview' => $organisationReview,
               
                );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    
    
    function rateone($pickUpId)
    {   
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'organisationReview' => 1,
                 );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratetwo($pickUpId)
    {   
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'organisationReview' => 2,
                 );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratethree($pickUpId)
    {   
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'organisationReview' => 3,
                 );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratefour($pickUpId)
    {   
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'organisationReview' => 4,
                 );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
    function ratefive($pickUpId)
    {   
        $data['delivery'] = $this->Delivery_model->get_delivery($pickUpId);
        
        if(isset($data['delivery']['pickUpId']))
        {
                $params = array(
                    'organisationReview' => 5,
                 );

                $this->Delivery_model->update_delivery($pickUpId,$params);            
                redirect('dashboard/index');
        }
        else
            show_error('The delivery you are trying to edit does not exist.');
    } 
}
