<?php

 
class City extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
    } 

    /*
     * Listing of cities
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('city/index?');
        $config['total_rows'] = $this->City_model->get_all_cities_count();
        $this->pagination->initialize($config);

        $data['cities'] = $this->City_model->get_all_cities($params);
        
        $data['_view'] = 'city/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new city
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'country' => $this->input->post('country'),
				'cityname' => $this->input->post('cityname'),
            );
            
            $city_id = $this->City_model->add_city($params);
            redirect('city/index');
        }
        else
        {
			$this->load->model('Country_model');
			$data['all_countries'] = $this->Country_model->get_all_countries();
            
            $data['_view'] = 'city/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a city
     */
    function edit($cityId)
    {   
        // check if the city exists before trying to edit it
        $data['city'] = $this->City_model->get_city($cityId);
        
        if(isset($data['city']['cityId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'country' => $this->input->post('country'),
					'cityname' => $this->input->post('cityname'),
                );

                $this->City_model->update_city($cityId,$params);            
                redirect('city/index');
            }
            else
            {
				$this->load->model('Country_model');
				$data['all_countries'] = $this->Country_model->get_all_countries();

                $data['_view'] = 'city/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The city you are trying to edit does not exist.');
    } 

    /*
     * Deleting city
     */
    function remove($cityId)
    {
        $city = $this->City_model->get_city($cityId);

        // check if the city exists before trying to delete it
        if(isset($city['cityId']))
        {
            $this->City_model->delete_city($cityId);
            redirect('city/index');
        }
        else
            show_error('The city you are trying to delete does not exist.');
    }
    
}
