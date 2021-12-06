<?php

 
class Country extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model');
    } 

    /*
     * Listing of countries
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('country/index?');
        $config['total_rows'] = $this->Country_model->get_all_countries_count();
        $this->pagination->initialize($config);

        $data['countries'] = $this->Country_model->get_all_countries($params);
        
        $data['_view'] = 'country/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new country
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'countryNAME' => $this->input->post('countryNAME'),
            );
            
            $country_id = $this->Country_model->add_country($params);
            redirect('country/index');
        }
        else
        {            
            $data['_view'] = 'country/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a country
     */
    function edit($countryID)
    {   
        // check if the country exists before trying to edit it
        $data['country'] = $this->Country_model->get_country($countryID);
        
        if(isset($data['country']['countryID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'countryNAME' => $this->input->post('countryNAME'),
                );

                $this->Country_model->update_country($countryID,$params);            
                redirect('country/index');
            }
            else
            {
                $data['_view'] = 'country/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The country you are trying to edit does not exist.');
    } 

    /*
     * Deleting country
     */
    function remove($countryID)
    {
        $country = $this->Country_model->get_country($countryID);

        // check if the country exists before trying to delete it
        if(isset($country['countryID']))
        {
            $this->Country_model->delete_country($countryID);
            redirect('country/index');
        }
        else
            show_error('The country you are trying to delete does not exist.');
    }
    
}
