<?php
class ControllerExtensionModuleUPThemeBanner extends Controller {
	public function index($setting) {
		static $module = 0;

		$this->load->model('design/banner');
		$this->load->model('tool/image');
				
		$data['banners'] = array();

		$results = $this->model_design_banner->getBanner($setting['banner_id']);
		
		$data['pr_id'] = $setting['pr_id'];
		$data['title_slide_status'] = $setting['title_slide_status'];

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$data['banners'][] = array(
					'title' => $result['title'],
					'link'  => $result['link'],
					'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height'])
				);
			}
		}

		$data['module'] = $module++;

		return $this->load->view('extension/module/up_theme_banner', $data);
		}
	}
