<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Model extends CI_Model {

    // Class Constructor
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    // Validate Admin
    function validateAdmin() {
        $admin_username = $this->input->post('admin_username');
        $admin_password = $this->input->post('admin_password');
        $this->db->select('`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_company`, `admin_status`');
        $this->db->from('`administrator`');
        $this->db->where('`admin_status`', 1);
        $this->db->where('`admin_username`', $admin_username);
        $this->db->where('`admin_password`', $admin_password);
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->row_array();
        }
        return false;
    }

    // Get Admin Info
    function getAdminInfo($admin_id = 0) {
        $this->db->select('`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_company`, `admin_status`');
        $this->db->from('`administrator`');
        $this->db->where('`admin_id`', $admin_id);
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->row_array();
        }
        return false;
    }

    // Save Admin Profile
    function saveProfile($admin_id = 0) {
        $data = array(
            'admin_name' => $this->input->post('admin_name'),
            'admin_email' => $this->input->post('admin_email'),
            'admin_phone' => $this->input->post('admin_phone'),
            'admin_company' => $this->input->post('admin_company')
        );
        $this->db->where('admin_id', $admin_id);
        return $this->db->update('administrator', $data);
    }

    // Change Admin Password
    function changePassword($admin_id = 0) {
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        if ($new_password == $confirm_password) {
            $data = array(
                'admin_password' => $new_password
            );
            $this->db->where('admin_id', $admin_id);
            $this->db->update('administrator', $data);
            return 1;
        } else {
            return 101;
        }
        return false;
    }

    // Get Institutions
    function getInstitutions($status = 0, $institution_id = 0, $institution_name = "", $manager_name = "") {
        $this->db->select('`institution_id`, `manager_name`, `manager_photo`, `manager_bio`, `institution_name`, `institution_bio`, `creation_date`, `institution_status`');
        $this->db->from('`institutions`');
        // If Institution Name
        if ($institution_name) {
            $this->db->where('`institution_name`', $institution_name);
        }
        // If Manager Name
        if ($manager_name) {
            $this->db->where('`manager_name`', $manager_name);
        }
        // If Institution Status
        if ($status) {
            $this->db->where('`institution_status`', $status);
            $this->db->order_by('`institution_name`', 'ASC');
        }
        // If Institution ID
        if ($institution_id) {
            $this->db->where('`institution_id`', $institution_id);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if ($institution_name || $manager_name || $institution_id) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        }
        return false;
    }

    // Change Institution Status
    function changeInstitutionStatus() {
        $institution_id = $this->input->post('id');
        $data = array(
            'institution_status' => $this->input->post('status')
        );
        $this->db->where('institution_id', $institution_id);
        return $this->db->update('institutions', $data);
    }

    // Count Instruments
    function countInstruments() {
        $this->db->select('`manager_name`, `manager_bio`, `manager_photo`, `institution_name`, `institution_bio`');
        $this->db->select('`instrument_id`, `quote_name`, `quote_symbol`, `stock_price`, `stock_discount`, `stock_description`');
        $this->db->select('`quote_open`, `quote_high`, `quote_low`, `quote_close`, `quote_date`, `quote_current`');
        $this->db->select('institutions.institution_id');
        $this->db->from('`institutions`, `instruments`, `quotes`');
        $this->db->where('institutions.institution_id=instruments.institution_id');
        $this->db->where('quotes.quote_id=instruments.quote_id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    // Get Instruments
    function getInstruments($quote_id = 0, $instrument_id = 0, $all = null, $flag = 0, $institution_id = 0) {
        $this->db->select('`manager_name`, `manager_bio`, `manager_photo`, `institution_name`, `institution_bio`');
        $this->db->select('`instrument_id`, `quote_name`, `quote_symbol`, `stock_price`, `stock_discount`, `stock_description`');
        $this->db->select('`quote_open`, `quote_high`, `quote_low`, `quote_close`, `quote_date`, `quote_current`');
        $this->db->select('institutions.institution_id');
        $this->db->from('`institutions`, `instruments`, `quotes`');
        $this->db->where('institutions.institution_id=instruments.institution_id');
        $this->db->where('quotes.quote_id=instruments.quote_id');
        // If Quote ID
        if ($quote_id) {
            $this->db->where('quotes.quote_id', $quote_id);
        }
        // If Instrument ID
        if ($instrument_id) {
            $this->db->where('`instrument_id`', $instrument_id);
        }
        // If Institution ID
        if ($institution_id) {
            $this->db->where('`institutions`.`institution_id`', $institution_id);
        }
        // If Flag
        if ($flag) {
            $this->db->where('stock_discount >', 0);
            $this->db->order_by('`stock_discount`', 'DESC');
        }
        // If Select All
        if (!$all) {
            $this->db->limit(20);
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if ($instrument_id) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        }
        return false;
    }

    // Get Quotes
    function getQuotes($quote_id = 0, $quote_status = 0, $quote_symbol = null) {
        $this->db->select('`quote_id`, `quote_name`, `quote_symbol`, `quote_current`, `quote_open`, `quote_high`, `quote_low`, `quote_close`, `quote_date`, `quote_status`');
        $this->db->from('`quotes`');
        // If Quote ID
        if ($quote_id) {
            $this->db->where('`quote_id`', $quote_id);
        }
        // If Quote Symbol
        if ($quote_symbol) {
            $this->db->where('`quote_symbol`', $quote_symbol);
        }
        // If Quote Status
        if ($quote_status) {
            $this->db->where('`quote_status`', $quote_status);
            $this->db->order_by('`quote_name`', 'ASC');
        }
        $query = $this->db->get();
        if ($query->num_rows()) {
            if ($quote_id || $quote_symbol) {
                return $query->row_array();
            } else {
                return $query->result_array();
            }
        }
        return false;
    }

    // Save/Update Institutions/Instruments/Quotes
    function saveData($type = null, $id = 0) {
        //Institutions
        if ($type == 'Institutions') {
            $data = array(
                'manager_name' => $this->input->post('manager_name'),
                'manager_bio' => $this->input->post('manager_bio'),
                'institution_name' => $this->input->post('institution_name'),
                'institution_bio' => $this->input->post('institution_bio')
            );
            // If Select Image By Admin
            if (isset($_FILES['manager_photo']['name'])) {
                $uploaded_file = $_FILES['manager_photo']['name'];
                $array = explode('.', $uploaded_file);
                $extension = end($array);
                $file_name = str_replace(' ', '_', strtolower($this->input->post('manager_name'))) . "." . $extension;
                $config['upload_path'] = './Uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('manager_photo')) {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './Uploads/' . $file_name;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 100;
                    $config['height'] = 100;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $data['manager_photo'] = $file_name;
                }
            }
            if ($id) {
                $this->db->where('institution_id', $id);
                return $this->db->update('institutions', $data);
            } else {
                if ($this->input->post('manager_name')) {
                    $creation_date = date('Y-m-d');
                    $data['creation_date'] = $creation_date;
                    return $this->db->insert('institutions', $data);
                }
            }
            return false;
        }

        //Instruments
        if ($type == 'Instruments') {
            $data = array(
                'institution_id' => $this->input->post('institution_id'),
                'quote_id' => $this->input->post('quote_id'),
                'stock_price' => $this->input->post('stock_price'),
                'stock_description' => $this->input->post('stock_description')
            );
            if ($id) {
                $this->db->where('instrument_id', $id);
                return $this->db->update('instruments', $data);
            } else {
                if ($this->input->post('institution_id')) {
                    return $this->db->insert('instruments', $data);
                }
            }
            return false;
        }

        //Quotes
        if ($type == 'Quotes') {
            $data = array(
                'quote_name' => $this->input->post('quote_name'),
                'quote_symbol' => $this->input->post('quote_symbol')
            );
            if ($id) {
                $this->db->where('quote_id', $id);
                return $this->db->update('quotes', $data);
            } else {
                if ($this->input->post('quote_name')) {
                    return $this->db->insert('quotes', $data);
                }
            }
            return false;
        }

        //Settings
        if ($type == 'Settings') {
            $action_type = $this->input->post('action_type');
            if($action_type == "extra_link"){
                $data = array(
                    'extra_link_text' => $this->input->post('extra_link_text'),
                    'extra_link_url' => $this->input->post('extra_link_url')
                );
            }elseif($action_type == "api_key"){
                $data = array(
                    'mailchimp_api_key' => $this->input->post('mailchimp_api_key'),
                    'mailchimp_list_id' => $this->input->post('mailchimp_list_id')
                );
            }
            if ($id) {
                $this->db->where('setting_id', $id);
                return $this->db->update('settings', $data);
            } else {
                if ($this->input->post('extra_link_text')) {
                    return $this->db->insert('settings', $data);
                }
            }
            return false;
        }
        return false;
    }

    // Delete Institutions/Instruments/Quotes
    function deleteData($type = null, $id = 0) {
        if ($id) {
            //Institutions
            if ($type == 'institutions') {
                return $this->db->delete('institutions', array('institution_id' => $id));
            }
            //Instruments
            if ($type == 'instruments') {
                return $this->db->delete('instruments', array('instrument_id' => $id));
            }
            //Quotes
            if ($type == 'quotes') {
                return $this->db->delete('quotes', array('quote_id' => $id));
            }
        }
        return false;
    }

    // Get Settings
    function getSettings() {
        $this->db->select('`setting_id`, `extra_link_url`, `extra_link_text`, `mailchimp_api_key`, `mailchimp_list_id`');
        $this->db->from('`settings`');
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->row_array();
        }
        return false;
    }

    // Import CSV Data Into Database
    function importCSVData(){
        $temp_file_name = date('dmYhis');
        $config['file_name'] = $temp_file_name;
        $config['upload_path'] = './Uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('import_csv_file')){
            $uploaded_file = explode('.', $_FILES['import_csv_file']['name']);
            $extension = $uploaded_file[1];
            if ($extension == 'csv') {
                $myfile = "./Uploads/" . $temp_file_name . ".csv";
                $fields;/** columns names retrieved after parsing */
                $separator = ',';/** separator used to explode each line */
                $enclosure = '"';/** enclosure used to decorate each field */
                $max_row_size = 4096;/** maximum row size to be used for decoding */
                $content = false;
                $file = fopen($myfile, 'r');
                $i = 1;
                $data_array = array();
                while (($row = fgetcsv($file, $max_row_size, $separator, $enclosure)) != false) {
                    // Ignore Headings
                    if($i > 1){
                        if ($row[0] != null) {
                            $temp_array = array();
                            $temp_array['institution_id'] = $row[0];
                            $temp_array['quote_id'] = $row[1];
                            $temp_array['stock_price'] = $row[2];
                            $temp_array['stock_description'] = $row[3];
                            $data_array[] = $temp_array;
                        }
                    }
                    $i++;
                }
                fclose($file);
                // Insert Into Database
                if($data_array && sizeof($data_array)){
                    $this->db->insert_batch('instruments', $data_array);
                    return 1;
                }else{
                    return 101;
                }
            } else {
                // Only Upload CSV File
                return 100;
            }
        }
    }

    //=========================================================//
    //=========================================================//
    // Cron Job
    //=========================================================//
    //=========================================================//
    // Get Live Quotes From Yahoo Finance API
    function getLiveQuotesFromYahoo() {
        // Get All Quotes
        $result_quotes = $this->getQuotes();
        if ($result_quotes && sizeof($result_quotes)) {
            $quote_array = array();
            foreach ($result_quotes AS $row_quote) {
                $quote_array[] = $row_quote['quote_symbol'];
            }
            $this->load->library('YahooFinance');
            $response = $this->yahoofinance->getQuotes($quote_array);
            $response_data = json_decode($response);
            if ($response_data && $response_data != null && sizeof($response_data)) {
                // Save Into Database
                foreach ($response_data as $key => $value) {
                    if ($value->results && sizeof($value->results)) {
                        /*
                          var_dump($value->results->quote);
                          die;
                         */
                        if (sizeof($value->results->quote) == 1) {
                            // Update Values In DB 
                            $data = array(
                                'quote_current' => $value->results->quote->LastTradePriceOnly,
                                'quote_open' => $value->results->quote->Open,
                                'quote_high' => $value->results->quote->DaysHigh,
                                'quote_low' => $value->results->quote->DaysLow,
                                'quote_close' => $value->results->quote->PreviousClose
                            );
                            $this->db->where('quote_symbol', $value->results->quote->Symbol);
                            $this->db->update('quotes', $data);
                            // Fetch All Institutions
                            $this->db->select('`instrument_id`, `institution_id`, `stock_price`, `stock_discount`, `stock_description`');
                            $this->db->from('`instruments`, `quotes`');
                            $this->db->where('instruments.quote_id=quotes.quote_id');
                            $this->db->where('`quote_symbol`', $value->results->quote->Symbol);
                            $query = $this->db->get();
                            if ($query->num_rows()) {
                                $result = $query->result_array();
                                if ($result && sizeof($result)) {
                                    foreach ($result as $key => $row) {
                                        $discount = (($row['stock_price'] - $value->results->quote->LastTradePriceOnly) * 100) / $row['stock_price'];
                                        // Calculate Discount And Update Into Instrument Table
                                        $data1 = array(
                                            'stock_discount' => $discount
                                        );
                                        $this->db->where('instrument_id', $row['instrument_id']);
                                        $this->db->update('instruments', $data1);
                                    }
                                }
                            }
                        } elseif (sizeof($value->results->quote) > 1) {
                            foreach ($value->results->quote AS $quote) {
                                // Update Values In DB
                                $data = array(
                                    'quote_current' => $quote->LastTradePriceOnly,
                                    'quote_open' => $quote->Open,
                                    'quote_high' => $quote->DaysHigh,
                                    'quote_low' => $quote->DaysLow,
                                    'quote_close' => $quote->PreviousClose
                                );
                                $this->db->where('quote_symbol', $quote->Symbol);
                                $this->db->update('quotes', $data);
                                // Fetch All Institutions
                                $this->db->select('`instrument_id`, `institution_id`, `stock_price`, `stock_discount`, `stock_description`');
                                $this->db->from('`instruments`, `quotes`');
                                $this->db->where('instruments.quote_id=quotes.quote_id');
                                $this->db->where('`quote_symbol`', $quote->Symbol);
                                $query = $this->db->get();
                                if ($query->num_rows()) {
                                    $result = $query->result_array();
                                    if ($result && sizeof($result)) {
                                        foreach ($result as $key => $row) {
                                            $discount = (($row['stock_price'] - $quote->LastTradePriceOnly) * 100) / $row['stock_price'];
                                            // Calculate Discount And Update Into Instrument Table
                                            $data1 = array(
                                                'stock_discount' => $discount
                                            );
                                            $this->db->where('instrument_id', $row['instrument_id']);
                                            $this->db->update('instruments', $data1);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                return true;
            }
        }
    }
    //=========================================================//
    //=========================================================//
}

?>