<?php

 
class Event extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
    } 

    /*
     * Listing of events
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('event/index?');
        $config['total_rows'] = $this->Event_model->get_all_events_count();
        $this->pagination->initialize($config);

        $data['events'] = $this->Event_model->get_all_events($params);
        
        $data['_view'] = 'event/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new event
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'user' => $this->input->post('user'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'date' =>date("Y-m-d",strtotime($this->input->post('date'))),
				'time' => date("Y-m-d",strtotime($this->input->post('time'))),
				'location' => $this->input->post('location'),
				'organisationComiteeNumber' => $this->input->post('organisationComiteeNumber'),
            );
            
            $event_id = $this->Event_model->add_event($params);
            redirect('event/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'event/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a event
     */
    function edit($eventId)
    {   
        // check if the event exists before trying to edit it
        $data['event'] = $this->Event_model->get_event($eventId);
        
        if(isset($data['event']['eventId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'user' => $this->input->post('user'),
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'date' =>date("Y-m-d",strtotime($this->input->post('date'))),
			     	'time' => date("Y-m-d",strtotime($this->input->post('time'))),
					'location' => $this->input->post('location'),
					'organisationComiteeNumber' => $this->input->post('organisationComiteeNumber'),
                );

                $this->Event_model->update_event($eventId,$params);            
                redirect('event/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'event/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The event you are trying to edit does not exist.');
    } 

    /*
     * Deleting event
     */
    function remove($eventId)
    {
        $event = $this->Event_model->get_event($eventId);

        // check if the event exists before trying to delete it
        if(isset($event['eventId']))
        {
            $this->Event_model->delete_event($eventId);
            redirect('event/index');
        }
        else
            show_error('The event you are trying to delete does not exist.');
    }
    
}
