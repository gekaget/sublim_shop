<?php
class ControllerExtensionModuleUPThemePopupMessage extends Controller {
	public function index($setting) {
		if (isset($setting['module_description'][$this->config->get('config_language_id')])) {
			$data['up_theme_popup_message'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['description'], ENT_QUOTES, 'UTF-8');
		
			return $this->load->view('extension/module/up_theme_popup_message', $data);
		}
	}
}