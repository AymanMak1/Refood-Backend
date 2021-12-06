<?php

 
class Organisation extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organisation_model');
    } 

    /*
     * Listing of organisations
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('organisation/index?');
        $config['total_rows'] = $this->Organisation_model->get_all_organisations_count();
        $this->pagination->initialize($config);

        $data['organisations'] = $this->Organisation_model->get_all_organisations($params);
        
        $data['_view'] = 'organisation/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new organisation
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'approved' => $this->input->post('approved'),
				'organisationType' => $this->input->post('organisationType'),
				'organisationName' => $this->input->post('organisationName'),
				'organisationLogo' => $this->input->post('organisationLogo'),
				'organisationJoindate' => date("Y-m-d") ,
				'organisationEmail' => $this->input->post('organisationEmail'),
				'organisationNumber' => $this->input->post('organisationNumber'),
				'organisationDescription' => $this->input->post('organisationDescription'),
            );
            
            
            $organisation_id = $this->Organisation_model->add_organisation($params);
            redirect('organisation/index');
        }
        else
        {
			$this->load->model('Organisationtype_model');
			$data['all_organisationtypes'] = $this->Organisationtype_model->get_all_organisationtypes();
            
            $data['_view'] = 'organisation/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a organisation
     */
    function edit($organisationId)
    {   
        // check if the organisation exists before trying to edit it
        $data['organisation'] = $this->Organisation_model->get_organisation($organisationId);
        
        if(isset($data['organisation']['organisationId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'approved' => $this->input->post('approved'),
					'organisationType' => $this->input->post('organisationType'),
					'organisationName' => $this->input->post('organisationName'),
					'organisationLogo' => $this->input->post('organisationLogo'),
					'organisationJoindate' => $this->input->post('organisationJoindate'),
					'organisationEmail' => $this->input->post('organisationEmail'),
					'organisationNumber' => $this->input->post('organisationNumber'),
					'organisationDescription' => $this->input->post('organisationDescription'),
                );

                $this->Organisation_model->update_organisation($organisationId,$params);            
                redirect('organisation/index');
            }
            else
            {
				$this->load->model('Organisationtype_model');
				$data['all_organisationtypes'] = $this->Organisationtype_model->get_all_organisationtypes();

                $data['_view'] = 'organisation/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The organisation you are trying to edit does not exist.');
    } 

    /*
     * Deleting organisation
     */
    function remove($organisationId)
    {
        $organisation = $this->Organisation_model->get_organisation($organisationId);

        // check if the organisation exists before trying to delete it
        if(isset($organisation['organisationId']))
        {
            $this->Organisation_model->delete_organisation($organisationId);
            redirect('organisation/index');
        }
        else
            show_error('The organisation you are trying to delete does not exist.');
    }

    function denypart($id)
    {   
        // check if the request exists before trying to edit it
        $data['organisation'] = $this->Organisation_model->get_organisation($id);
        
        if(isset($data['organisation']['organisationId']))
        {
            
                $params = array(
                  
                    'approved' => 4,
               
                );

                $this->Organisation_model->update_organisation($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }

    function approvepart($id)
    {   
        // check if the request exists before trying to edit it
        $data['organisation'] = $this->Organisation_model->get_organisation($id);
        
        if(isset($data['organisation']['organisationId']))
        {
            
                $params = array(
                  
                    'approved' => 2,
               
                );

                $this->Organisation_model->update_organisation($id,$params);            
                redirect('dashboard/index');
          
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }

   
}
