<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Extra Column For Instrument</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/save_settings<?php echo (isset($settings) && $settings && $settings['setting_id']) ? "/" . $settings['setting_id'] : ""; ?>" method="POST" class="stockForm">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="extra_link_text">Offer Link Text</label>
                                    <input type="text" placeholder="Enter Text" class="form-control" name="extra_link_text" id="extra_link_text"                                        
                                           value="<?php echo (isset($settings) && $settings && $settings['extra_link_text']) ? $settings['extra_link_text'] : ""; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="admin_company">Offer Link URL</label>
                                    <input type="text" placeholder="Enter URL" class="form-control" name="extra_link_url" id="extra_link_url"                                
                                           value="<?php echo (isset($settings) && $settings && $settings['extra_link_url']) ? $settings['extra_link_url'] : ""; ?>" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <input type="hidden" name="action_type" value="extra_link" />
                                    <button type="submit" name="save_settings" id="save_settings" class="btn btn-primary">Save Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Mailchimp API Key For Newletter</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/save_settings<?php echo (isset($settings) && $settings && $settings['setting_id']) ? "/" . $settings['setting_id'] : ""; ?>" method="POST" class="stockForm">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="mailchimp_api_key">Mailchimp API Key</label>
                                    <input type="text" placeholder="Enter API Key" class="form-control" name="mailchimp_api_key" id="mailchimp_api_key"
                                           required data-parsley-required-message="Please Enter API Key"
                                           value="<?php echo (isset($settings) && $settings && $settings['mailchimp_api_key']) ? $settings['mailchimp_api_key'] : ""; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="mailchimp_list_id">Mailchimp Unique List ID</label>
                                    <input type="text" placeholder="Enter Unique List ID" class="form-control" name="mailchimp_list_id" id="mailchimp_list_id"
                                           required data-parsley-required-message="Please Enter Unique List ID"
                                           value="<?php echo (isset($settings) && $settings && $settings['mailchimp_list_id']) ? $settings['mailchimp_list_id'] : ""; ?>" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <input type="hidden" name="action_type" value="api_key" />
                                    <button type="submit" name="save_settings" id="save_settings" class="btn btn-primary">Save API Key</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>