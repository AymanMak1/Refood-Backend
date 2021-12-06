<?php

 
class Organizingcommittee extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organizingcommittee_model');
    } 

    /*
     * Listing of organizingcommittees
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('organizingcommittee/index?');
        $config['total_rows'] = $this->Organizingcommittee_model->get_all_organizingcommittees_count();
        $this->pagination->initialize($config);

        $data['organizingcommittees'] = $this->Organizingcommittee_model->get_all_organizingcommittees($params);
        
        $data['_view'] = 'organizingcommittee/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new organizingcommittee
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'approved' => $this->input->post('approved'),
				'type' => $this->input->post('type'),
				'event' => $this->input->post('event'),
				'origanizerId' => $this->input->post('origanizerId'),
            );
            
            $organizingcommittee_id = $this->Organizingcommittee_model->add_organizingcommittee($params);
            redirect('organizingcommittee/index');
        }
        else
        {
			$this->load->model('Event_model');
			$data['all_events'] = $this->Event_model->get_all_events();
            
            $data['_view'] = 'organizingcommittee/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a organizingcommittee
     */
    function edit($organizingCommitteeId)
    {   
        // check if the organizingcommittee exists before trying to edit it
        $data['organizingcommittee'] = $this->Organizingcommittee_model->get_organizingcommittee($organizingCommitteeId);
        
        if(isset($data['organizingcommittee']['organizingCommitteeId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'approved' => $this->input->post('approved'),
					'type' => $this->input->post('type'),
					'event' => $this->input->post('event'),
					'origanizerId' => $this->input->post('origanizerId'),
                );

                $this->Organizingcommittee_model->update_organizingcommittee($organizingCommitteeId,$params);            
                redirect('organizingcommittee/index');
            }
            else
            {
				$this->load->model('Event_model');
				$data['all_events'] = $this->Event_model->get_all_events();

                $data['_view'] = 'organizingcommittee/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The organizingcommittee you are trying to edit does not exist.');
    } 

    /*
     * Deleting organizingcommittee
     */
    function remove($organizingCommitteeId)
    {
        $organizingcommittee = $this->Organizingcommittee_model->get_organizingcommittee($organizingCommitteeId);

        // check if the organizingcommittee exists before trying to delete it
        if(isset($organizingcommittee['organizingCommitteeId']))
        {
            $this->Organizingcommittee_model->delete_organizingcommittee($organizingCommitteeId);
            redirect('organizingcommittee/index');
        }
        else
            show_error('The organizingcommittee you are trying to delete does not exist.');
    }
    
    function requestvol($eventId)
    {   
            
          $user = $this->session->userdata("auth"); 
            $params = array(
				'approved' => 1,
				'type' => 2,
				'event' => $eventId,
				'origanizerId' => $user->UserId,
            );
            
            $organizingcommittee_id = $this->Organizingcommittee_model->add_organizingcommittee($params);
            redirect('dashboard/index');
        
        
    }  
}
