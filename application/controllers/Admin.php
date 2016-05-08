<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    // Class Constructor
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Data_Model', 'data_model');

        $data = new stdClass();
        if ($this->session->userdata('admin_logged_in')) {
            $session_userdata = $this->session->userdata('admin_logged_in');
            $admin_id = $session_userdata['admin_id'];
            // Admin Info
            $admin_info = $this->data_model->getAdminInfo($admin_id);
            if ($admin_info) {
                $data->admin_name = $admin_info['admin_name'];
                $data->admin_username = $admin_info['admin_username'];
                $data->admin_email = $admin_info['admin_email'];
                $data->admin_phone = $admin_info['admin_phone'];
                $data->admin_company = $admin_info['admin_company'];
            }
        }
        $this->load->vars($data);
        // Set Header
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
    }

    // Admin Login
    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard', 'refresh');
        } else {
            $this->load->view('Admin/index');
        }
    }

    // Validate Admin
    public function validate_admin() {
        $response = $this->data_model->validateAdmin();
        if ($response) {
            $session_array = array(
                'admin_id' => $response['admin_id'],
                'admin_username' => $response['admin_username']
            );
            $this->session->set_userdata('admin_logged_in', $session_array);
            redirect('admin/dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('error_type', 'error');
            $this->session->set_flashdata('error_msg', 'Username & Password are wrong');
            redirect('admin', 'refresh');
        }
    }

    // Admin Profile
    public function profile() {
        if ($this->session->userdata('admin_logged_in')) {
            $data['page_title'] = "Admin Profile";
            $data['page'] = "Profile";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/profile');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Update Admin Profile
    public function save_profile() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_array = $this->session->userdata('admin_logged_in');
            $admin_id = $session_array['admin_id'];
            $response = $this->data_model->saveProfile($admin_id);
            if ($response) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Profile updated successfully');
                redirect('admin/dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Profile updation failed');
                redirect('admin/profile', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Change Admin Password
    public function change_password() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_array = $this->session->userdata('admin_logged_in');
            $admin_id = $session_array['admin_id'];
            $response = $this->data_model->changePassword($admin_id);
            if ($response == 1) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Password updated successfully');
                redirect('admin/dashboard', 'refresh');
            } elseif ($response == 101) {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'New Password and confirm password are not same');
                redirect('admin/profile', 'refresh');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Password updation failed');
                redirect('admin/profile', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Dashboard
    public function dashboard() {
        if ($this->session->userdata('admin_logged_in')) {
            $data['page_title'] = "Dashboard";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/dashboard');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Institutions 
    public function institutions() {
        if ($this->session->userdata('admin_logged_in')) {
            // Get Institutions
            $table['institutions'] = $this->data_model->getInstitutions();
            $data['institutions'] = $this->load->view('Admin/show-institutions', $table, TRUE);
            $data['page_title'] = "Institutions";
            $data['page'] = "Institutions";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/institutions');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Add Institution 
    public function add_institution() {
        if ($this->session->userdata('admin_logged_in')) {
            $data['page_title'] = "Add Institution";
            $data['page'] = "Institutions";
            $data['sub_page'] = "Add Institution";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/add-institution');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Save Institution
    public function save_institution($institution_id = 0) {
        if ($this->session->userdata('admin_logged_in')) {
            $response = $this->data_model->saveData('Institutions', $institution_id);
            if ($response) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Institution ' . (($institution_id) ? 'updated' : 'inserted') . ' successfully');
                redirect('admin/institutions', 'refresh');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Institution ' . (($institution_id) ? 'updation' : 'insertion') . ' failed');
                redirect('admin/add_institution', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Change Institution Status
    public function change_institution_status() {
        if ($this->session->userdata('admin_logged_in')) {
            $this->data_model->changeInstitutionStatus();
            $data['institutions'] = $this->data_model->getInstitutions();
            $this->load->view('Admin/show-institutions', $data);
        }
    }

    // Instruments 
    public function instruments() {
        if ($this->session->userdata('admin_logged_in')) {
            // Get Instruments
            $data['instruments'] = $this->data_model->getInstruments();
            $data['page_title'] = "Instruments";
            $data['page'] = "Instruments";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/instruments');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Add Instrument
    public function add_instrument() {
        if ($this->session->userdata('admin_logged_in')) {
            // Get Active Institutions
            $data['institutions'] = $this->data_model->getInstitutions(1);
            // Get Active Quotes
            $data['quotes'] = $this->data_model->getQuotes(0, 1);
            $data['page_title'] = "Add Instrument";
            $data['page'] = "Instruments";
            $data['sub_page'] = "Add Instrument";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/add-instrument');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Save Instrument
    public function save_instrument($instrument_id = 0) {
        if ($this->session->userdata('admin_logged_in')) {
            $response = $this->data_model->saveData('Instruments', $instrument_id);
            if ($response) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Instrument ' . (($instrument_id) ? 'updated' : 'inserted') . ' successfully');
                redirect('admin/instruments', 'refresh');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Instrument ' . (($instrument_id) ? 'updated' : 'inserted') . ' failed');
                redirect('admin/add_instrument', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Import Instrument CSV
    public function import_instruments(){
        if ($this->session->userdata('admin_logged_in')) {
            // Get Active Institutions
            $data['institutions'] = $this->data_model->getInstitutions(1);
            // Get Active Quotes
            $data['quotes'] = $this->data_model->getQuotes(0, 1);
            $data['page_title'] = "Import Instruments";
            $data['page'] = "Instruments";
            $data['sub_page'] = "Import Instruments";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/import-instruments');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Import CSV Data
    public function import_csv_data(){
        if ($this->session->userdata('admin_logged_in')) {
            $response = $this->data_model->importCSVData();
            if ($response==1) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Instruments imported successfully');
                redirect('admin/instruments', 'refresh');
            } elseif ($response==100) {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Please upload only csv file');
                redirect('admin/import_instruments', 'refresh');
            } elseif ($response==101) {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Something wrong! Please check uploaded only csv file');
                redirect('admin/import_instruments', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Export Data Into CSV
    public function export($type = null){
        if ($this->session->userdata('admin_logged_in')) {
            ini_set('max_input_time', 2400);
            ini_set('max_execution_time', 2400);
            ini_set('memory_limit', '1073741824');
            $filename = "reports" . date('Ymdhis');
            $csvFile = "./Uploads/$filename.csv";
            // Check Type
            if($type == 'institutions'){
                // Get Data From Database
                $result = $this->data_model->getInstitutions();
                // Open CSV and Write String Into CSV
                $file = fopen($csvFile, 'w') or die("can't open file");
                $headings = "Institution ID, Institution Name, Manager Name, Status";
                fputcsv($file, explode(',', $headings));
                if ($result) {
                    foreach ($result as $row) {
                        $line = $row['institution_id'];
                        $line .= "," . str_replace(",","", $row['institution_name']);
                        $line .= "," . str_replace(",","", $row['manager_name']);
                        if($row['institution_status']==1){
                            $line .= ", Activated";
                        }elseif($row['institution_status']==0){
                            $line .= ", De-activated";
                        }
                        fputcsv($file, explode(',', $line));
                    }
                }
            }elseif($type == 'quotes'){
                // Get Data From Database
                $result = $this->data_model->getQuotes();
                // Open CSV and Write String Into CSV
                $file = fopen($csvFile, 'w') or die("can't open file");
                $headings = "Quote ID, Quote Name, Quote Symbol, Status";
                fputcsv($file, explode(',', $headings));
                if ($result) {
                    foreach ($result as $row) {
                        $line = $row['quote_id'];
                        $line .= "," . str_replace(",","", $row['quote_name']);
                        $line .= "," . $row['quote_symbol'];
                        if($row['quote_status']==1){
                            $line .= ", Activated";
                        }elseif($row['quote_status']==0){
                            $line .= ", De-activated";
                        }
                        fputcsv($file, explode(',', $line));
                    }
                }
            }
            fclose($file);
            $this->download($filename);
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Download CSV File
    public function download($filename = null) {
        $csvFile = "./Uploads/$filename.csv";
        header("Content-Length: " . filesize($csvFile));
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename . '.csv');
        readfile($csvFile);
    }

    // Quotes
    public function quotes() {
        if ($this->session->userdata('admin_logged_in')) {
            // Get Quotes
            $data['quotes'] = $this->data_model->getQuotes();
            $data['page_title'] = "Quotes";
            $data['page'] = "Qoutes";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/quotes');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Add Quote
    public function add_quote() {
        if ($this->session->userdata('admin_logged_in')) {
            $data['page_title'] = "Add Quote";
            $data['page'] = "Qoutes";
            $data['sub_page'] = "Add Quote";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/add-quote');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Save Quote
    public function save_quote($quote_id = 0) {
        if ($this->session->userdata('admin_logged_in')) {
            $response = $this->data_model->saveData('Quotes', $quote_id);
            if ($response) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Quote ' . (($quote_id) ? 'updated' : 'inserted') . ' successfully');
                redirect('admin/quotes', 'refresh');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Quote ' . (($quote_id) ? 'updated' : 'inserted') . ' failed');
                redirect('admin/add_quote', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Delete Institutions/Instruments/Quotes
    public function delete($type = null, $id = 0) {
        if ($this->session->userdata('admin_logged_in')) {
            $response = $this->data_model->deleteData($type, $id);
            if ($response) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', $type . ' deleted successfully');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', $type . ' deletion failed');
            }
            if ($type == 'institutions') {
                redirect('admin/institutions', 'refresh');
            } elseif ($type == 'instruments') {
                redirect('admin/instruments', 'refresh');
            } elseif ($type == 'quotes') {
                redirect('admin/quotes', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Update Managers/Instruments/Quotes
    public function update($type = null, $id = 0) {
        if ($this->session->userdata('admin_logged_in')) {
            $data['type'] = $type;
            $data['id'] = $id;
            if ($type == 'institutions') {
                $data['institution'] = $this->data_model->getInstitutions(0, $id);
                $data['page_title'] = "Update Institution";
                $data['page'] = "Institutions";
                $data['sub_page'] = "Update Institution";
            } elseif ($type == 'instruments') {
                $data['page_title'] = "Update Instrument";
                $data['page'] = "Instruments";
                $data['sub_page'] = "Update Instrument";
                $data['institutions'] = $this->data_model->getInstitutions(1);
                $data['instrument'] = $this->data_model->getInstruments(null, $id);
            } elseif ($type == 'quotes') {
                $data['page_title'] = "Update Quote";
                $data['page'] = "Quotes";
                $data['sub_page'] = "Update Quote";
                // Get Active Quotes
                $data['quotes'] = $this->data_model->getQuotes(0, 1);
                $data['quote'] = $this->data_model->getQuotes($id, 0);
            }
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/update');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Admin Logout
    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        session_unset();
        session_destroy();
        redirect('admin', 'refresh');
    }

    // Settings 
    public function settings() {
        if ($this->session->userdata('admin_logged_in')) {
            // Get Settings
            $data['settings'] = $this->data_model->getSettings();
            $data['page_title'] = "Settings";
            $data['page'] = "Settings";
            $this->load->view('Admin/header', $data);
            $this->load->view('Admin/settings');
            $this->load->view('Admin/footer');
        } else {
            redirect('admin', 'refresh');
        }
    }

    // Save Settings
    public function save_settings($setting_id = 0) {
        if ($this->session->userdata('admin_logged_in')) {
            $response = $this->data_model->saveData('Settings', $setting_id);
            if ($response) {
                $this->session->set_flashdata('error_type', 'success');
                $this->session->set_flashdata('error_msg', 'Setting ' . (($setting_id) ? 'updated' : 'inserted') . ' successfully');
                redirect('admin/settings', 'refresh');
            } else {
                $this->session->set_flashdata('error_type', 'error');
                $this->session->set_flashdata('error_msg', 'Setting ' . (($setting_id) ? 'updated' : 'inserted') . ' failed');
                redirect('admin/settings', 'refresh');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    //=========================================================//
    ////=========================================================//
    // Cron Job
    //=========================================================//
    //=========================================================//
    // Get Live Quotes From Yahoo Finance API
    public function get_quotes_from_yahoo() {
        $this->data_model->getLiveQuotesFromYahoo();
    }

    //=========================================================//
    //=========================================================//
}

?>