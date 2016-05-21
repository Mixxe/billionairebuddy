<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    // Class Constructor
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Data_Model', 'data_model');
    }

    // Index Page
    public function index() {
        // Get Settings
        $data['settings'] = $this->data_model->getSettings();
        // Get Instruments
        $flag = 1;
        $data['total_instruments'] = $this->data_model->countInstruments();
        $data['instruments'] = $this->data_model->getInstruments(0, 0, 0, $flag);
        $data['page'] = "Instruments";
        $data['all'] = 0;
        /*
        $this->load->view('header', $data);
        $this->load->view('instruments');
        $this->load->view('footer');
        */
        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    // Institutions Info
    public function institutions() {
        // Get Settings
        $data['settings'] = $this->data_model->getSettings();
         // Get Institutions
        $data['institutions'] = $this->data_model->getInstitutions(1);
        $data['page'] = "Institutions";
        $this->load->view('header', $data);
        $this->load->view('institutions');
        $this->load->view('footer');
    }

    // Institution Info
    public function institution($name = null) {
        if ($name != null) {
            // Get Settings
            $data['settings'] = $this->data_model->getSettings();
            // Get Institution
            $institution_name = str_replace('_', ' ', $name);
            $response = $this->data_model->getInstitutions(0, 0, $institution_name);
            $data['institution'] = $response;
            $data['instruments'] = $this->data_model->getInstruments(0, 0, null, 1, $response['institution_id']);
            $data['page'] = "Institutions";
            $this->load->view('header', $data);
            $this->load->view('information');
            $this->load->view('footer');
        } else {
            redirect('admin/institutions', 'refresh');
        }
    }

    // Managers Info
    public function managers() {
        // Get Settings
        $data['settings'] = $this->data_model->getSettings();
         // Get Managers
        $data['managers'] = $this->data_model->getInstitutions(1);
        $data['page'] = "Managers";
        $this->load->view('header', $data);
        $this->load->view('managers');
        $this->load->view('footer');
    }

    // Manager Info
    public function manager($name = null) {
        if ($name != null) {
            // Get Settings
            $data['settings'] = $this->data_model->getSettings();
            // Get Manager
            $manager_name = str_replace('_', ' ', $name);
            $response = $this->data_model->getInstitutions(0, 0, "", $manager_name);
            $data['manager'] = $response;
            $data['instruments'] = $this->data_model->getInstruments(0, 0, null, 1, $response['institution_id']);
            $data['page'] = "Managers";
            $this->load->view('header', $data);
            $this->load->view('information');
            $this->load->view('footer');
        } else {
            redirect('admin/managers', 'refresh');
        }
    }

    // Instruments Info
    public function instruments($all = 0) {
        // Get Settings
        $data['settings'] = $this->data_model->getSettings();
        // Get Instruments
        $flag = 1;
        $data['total_instruments'] = $this->data_model->countInstruments();
        $data['instruments'] = $this->data_model->getInstruments(0, 0, $all, $flag);
        $data['page'] = "Instruments";
        $data['all'] = $all;
        $this->load->view('header', $data);
        $this->load->view('instruments');
        $this->load->view('footer');
    }

    // Instrument Info
    public function instrument($quote_symbol = null) {
        if ($quote_symbol != null) {
            // Get Instrument
            $response = $this->data_model->getQuotes(0, 0, $quote_symbol);
            $data['instrument'] = $response;
            // Get Instruments With Institutions
            $data['instruments'] = $this->data_model->getInstruments($response['quote_id'], 0, null, 1);
            // Get Settings
            $data['settings'] = $this->data_model->getSettings();
            $data['page'] = "Instruments";
            $this->load->view('header', $data);
            $this->load->view('information');
            $this->load->view('footer');
        } else {
            redirect('admin/instruments', 'refresh');
        }
    }

    //========================================================================//
    //========================================================================//
    // Table Quote
    public function quotes() {
        $this->db->select('`id`, `age`, `a_single_prem`, `a_cp_prem`, `b_single_prem`, `b_cp_prem`, `c_single_prem`, `c_cp_prem`');
        $this->db->from('`tbl_quote`');
        $query = $this->db->get();
        if ($query->num_rows()) {
            $result=$query->result_array();
            $array=array();
            foreach ($result as $key => $value) {
                $temp=array(
                    'a_single_prem'=>$value['a_single_prem'],
                    'a_cp_prem'=>$value['a_cp_prem'],
                    'b_single_prem'=>$value['b_single_prem'],
                    'b_cp_prem'=>$value['b_cp_prem'],
                    'c_single_prem'=>$value['c_single_prem'],
                    'c_cp_prem'=>$value['c_cp_prem']
                );
                $array[$value['age']]=$temp;
            }
        }
        echo $jsonData=json_encode($array);
        die;
    }
    //========================================================================//
    //========================================================================//

}

?>