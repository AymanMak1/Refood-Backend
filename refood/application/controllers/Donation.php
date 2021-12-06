<?php

 
class Donation extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Donation_model');
    } 

    /*
     * Listing of donations
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('donation/index?');
        $config['total_rows'] = $this->Donation_model->get_all_donations_count();
        $this->pagination->initialize($config);

        $data['donations'] = $this->Donation_model->get_all_donations($params);
        
        $data['_view'] = 'donation/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new donation
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'userId' => $this->input->post('userId'),
            );
            
            $donation_id = $this->Donation_model->add_donation($params);
            redirect('donation/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'donation/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a donation
     */
    function edit($donationId)
    {   
        // check if the donation exists before trying to edit it
        $data['donation'] = $this->Donation_model->get_donation($donationId);
        
        if(isset($data['donation']['donationId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'userId' => $this->input->post('userId'),
                );

                $this->Donation_model->update_donation($donationId,$params);            
                redirect('donation/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'donation/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The donation you are trying to edit does not exist.');
    } 

    /*
     * Deleting donation
     */
    function remove($donationId)
    {
        $donation = $this->Donation_model->get_donation($donationId);

        // check if the donation exists before trying to delete it
        if(isset($donation['donationId']))
        {
            $this->Donation_model->delete_donation($donationId);
            redirect('donation/index');
        }
        else
            show_error('The donation you are trying to delete does not exist.');
    }
    
}
