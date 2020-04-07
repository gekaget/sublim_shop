<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->load->language('common/footer');
		
		$data['scripts'] = $this->document->getScripts('footer');
		
		$data['config_ssl'] = $this->config->get('config_ssl');
		$data['config_url'] = $this->config->get('config_url');
		
		$data['lang'] = $this->config->get('config_language_id');
		$lang = $this->config->get('config_language_id');
		
		$data['t1o_fp_fb1_icon'] = $this->config->get('t1o_fp_fb1_icon');
		$data['t1o_fp_fb1_awesome'] = $this->config->get('t1o_fp_fb1_awesome');
		$data['t1o_fp_fb1_title'] = $this->config->get('t1o_fp_fb1_title');
		$data['t1o_fp_fb1_subtitle'] = $this->config->get('t1o_fp_fb1_subtitle');
		$data['t1o_fp_fb1_content'] = $this->config->get('t1o_fp_fb1_content');
		$data['t1o_fp_fb2_icon'] = $this->config->get('t1o_fp_fb2_icon');
		$data['t1o_fp_fb2_awesome'] = $this->config->get('t1o_fp_fb2_awesome');
		$data['t1o_fp_fb2_title'] = $this->config->get('t1o_fp_fb2_title');
		$data['t1o_fp_fb2_subtitle'] = $this->config->get('t1o_fp_fb2_subtitle');
		$data['t1o_fp_fb2_content'] = $this->config->get('t1o_fp_fb2_content');
		$data['t1o_fp_fb3_icon'] = $this->config->get('t1o_fp_fb3_icon');
		$data['t1o_fp_fb3_awesome'] = $this->config->get('t1o_fp_fb3_awesome');
		$data['t1o_fp_fb3_title'] = $this->config->get('t1o_fp_fb3_title');
		$data['t1o_fp_fb3_subtitle'] = $this->config->get('t1o_fp_fb3_subtitle');
		$data['t1o_fp_fb3_content'] = $this->config->get('t1o_fp_fb3_content');
		$data['t1o_fp_fb4_icon'] = $this->config->get('t1o_fp_fb4_icon');
		$data['t1o_fp_fb4_awesome'] = $this->config->get('t1o_fp_fb4_awesome');
		$data['t1o_fp_fb4_title'] = $this->config->get('t1o_fp_fb4_title');
		$data['t1o_fp_fb4_subtitle'] = $this->config->get('t1o_fp_fb4_subtitle');
		$data['t1o_fp_fb4_content'] = $this->config->get('t1o_fp_fb4_content');
		
		$data['t1o_information_column_1_status'] = $this->config->get('t1o_information_column_1_status');
		$data['t1o_information_column_2_status'] = $this->config->get('t1o_information_column_2_status');
		$data['t1o_information_column_3_status'] = $this->config->get('t1o_information_column_3_status');
		$data['t1o_i_c_1_1_status'] = $this->config->get('t1o_i_c_1_1_status');
		$data['t1o_i_c_2_1_status'] = $this->config->get('t1o_i_c_2_1_status');
		$data['t1o_i_c_2_2_status'] = $this->config->get('t1o_i_c_2_2_status');
		$data['t1o_i_c_2_3_status'] = $this->config->get('t1o_i_c_2_3_status');
		$data['t1o_i_c_2_4_status'] = $this->config->get('t1o_i_c_2_4_status');
		$data['t1o_i_c_2_5_status'] = $this->config->get('t1o_i_c_2_5_status');
		$data['t1o_i_c_3_1_status'] = $this->config->get('t1o_i_c_3_1_status');
		$data['t1o_i_c_3_2_status'] = $this->config->get('t1o_i_c_3_2_status');
		$data['t1o_i_c_3_3_status'] = $this->config->get('t1o_i_c_3_3_status');
		$data['t1o_i_c_3_4_status'] = $this->config->get('t1o_i_c_3_4_status');
		$data['t1o_i_c_3_5_status'] = $this->config->get('t1o_i_c_3_5_status');
		$data['t1o_custom_1_status'] = $this->config->get('t1o_custom_1_status');
		$data['t1o_custom_1_title'] = $this->config->get('t1o_custom_1_title');
		$data['t1o_custom_1_content'] = $this->config->get('t1o_custom_1_content');
		$data['t1d_bg_image_f2_parallax'] = $this->config->get('t1d_bg_image_f2_parallax');
		
		$data['t1o_powered_status'] = $this->config->get('t1o_powered_status');
		$data['t1o_powered_content'] = $this->config->get('t1o_powered_content');
		
		$data['t1o_news'] = $this->config->get('t1o_news');
		$data['t1o_news_status'] = $this->config->get('t1o_news_status');
		
		$data['t1o_follow_us_status'] = $this->config->get('t1o_follow_us_status');
		
		$data['t1o_facebook'] = $this->config->get('t1o_facebook');
		$data['t1o_twitter'] = $this->config->get('t1o_twitter');
		$data['t1o_googleplus'] = $this->config->get('t1o_googleplus');
		$data['t1o_rss'] = $this->config->get('t1o_rss');
		$data['t1o_pinterest'] = $this->config->get('t1o_pinterest');
		$data['t1o_vimeo'] = $this->config->get('t1o_vimeo');
		$data['t1o_flickr'] = $this->config->get('t1o_flickr');
		$data['t1o_linkedin'] = $this->config->get('t1o_linkedin');
		$data['t1o_youtube'] = $this->config->get('t1o_youtube');
		$data['t1o_dribbble'] = $this->config->get('t1o_dribbble');
		$data['t1o_instagram'] = $this->config->get('t1o_instagram');
		$data['t1o_behance'] = $this->config->get('t1o_behance');
		$data['t1o_skype'] = $this->config->get('t1o_skype');
		$data['t1o_tumblr'] = $this->config->get('t1o_tumblr');
		$data['t1o_reddit'] = $this->config->get('t1o_reddit');
		$data['t1o_vk'] = $this->config->get('t1o_vk');
		
		$data['t1o_payment_block_status'] = $this->config->get('t1o_payment_block_status');
		$data['t1o_payment_block_custom_status'] = $this->config->get('t1o_payment_block_custom_status');
		$data['t1o_payment_block_custom'] = $this->config->get('t1o_payment_block_custom');
		$data['t1o_payment_block_custom_url'] = $this->config->get('t1o_payment_block_custom_url');	
		$data['t1o_payment_paypal'] = $this->config->get('t1o_payment_paypal');
		$data['t1o_payment_paypal_url'] = $this->config->get('t1o_payment_paypal_url');
		$data['t1o_payment_visa'] = $this->config->get('t1o_payment_visa');
		$data['t1o_payment_visa_url'] = $this->config->get('t1o_payment_visa_url');
		$data['t1o_payment_mastercard'] = $this->config->get('t1o_payment_mastercard');
		$data['t1o_payment_mastercard_url'] = $this->config->get('t1o_payment_mastercard_url');
		$data['t1o_payment_maestro'] = $this->config->get('t1o_payment_maestro');
		$data['t1o_payment_maestro_url'] = $this->config->get('t1o_payment_maestro_url');
		$data['t1o_payment_discover'] = $this->config->get('t1o_payment_discover');
		$data['t1o_payment_discover_url'] = $this->config->get('t1o_payment_discover_url');
		$data['t1o_payment_skrill'] = $this->config->get('t1o_payment_skrill');
		$data['t1o_payment_skrill_url'] = $this->config->get('t1o_payment_skrill_url');
		$data['t1o_payment_american_express'] = $this->config->get('t1o_payment_american_express');
		$data['t1o_payment_american_express_url'] = $this->config->get('t1o_payment_american_express_url');
		$data['t1o_payment_cirrus'] = $this->config->get('t1o_payment_cirrus');
		$data['t1o_payment_cirrus_url'] = $this->config->get('t1o_payment_cirrus_url');
		$data['t1o_payment_delta'] = $this->config->get('t1o_payment_delta');
		$data['t1o_payment_delta_url'] = $this->config->get('t1o_payment_delta_url');
		$data['t1o_payment_google'] = $this->config->get('t1o_payment_google');
		$data['t1o_payment_google_url'] = $this->config->get('t1o_payment_google_url');
		$data['t1o_payment_2co'] = $this->config->get('t1o_payment_2co');
		$data['t1o_payment_2co_url'] = $this->config->get('t1o_payment_2co_url');
		$data['t1o_payment_sage'] = $this->config->get('t1o_payment_sage');
		$data['t1o_payment_sage_url'] = $this->config->get('t1o_payment_sage_url');
		$data['t1o_payment_solo'] = $this->config->get('t1o_payment_solo');
		$data['t1o_payment_solo_url'] = $this->config->get('t1o_payment_solo_url');
		$data['t1o_payment_amazon'] = $this->config->get('t1o_payment_amazon');
		$data['t1o_payment_amazon_url'] = $this->config->get('t1o_payment_amazon_url');
		$data['t1o_payment_western_union'] = $this->config->get('t1o_payment_western_union');
		$data['t1o_payment_western_union_url'] = $this->config->get('t1o_payment_western_union_url');
		
		$data['t1o_custom_2_status'] = $this->config->get('t1o_custom_2_status');
		$data['t1o_custom_2_content'] = $this->config->get('t1o_custom_2_content');
		
		
		
		$data['t1o_header_fixed_header_status'] = $this->config->get('t1o_header_fixed_header_status');
		$data['t1o_header_auto_suggest_status'] = $this->config->get('t1o_header_auto_suggest_status');
		$data['t1o_others_totop'] = $this->config->get('t1o_others_totop');
		$data['t1o_eu_cookie_status'] = $this->config->get('t1o_eu_cookie_status');
		$data['t1o_eu_cookie_message'] = $this->config->get('t1o_eu_cookie_message');
		$data['t1o_eu_cookie_close'] = $this->config->get('t1o_eu_cookie_close');
		$data['t1o_custom_js'] = $this->config->get('t1o_custom_js');
		
		

		$data['text_information'] = $this->language->get('text_information');
		$data['text_service'] = $this->language->get('text_service');
		$data['text_extra'] = $this->language->get('text_extra');
		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_sitemap'] = $this->language->get('text_sitemap');
		$data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_special'] = $this->language->get('text_special');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_wishlist'] = $this->language->get('text_wishlist');
		$data['text_newsletter'] = $this->language->get('text_newsletter');
		
		$data['text_news'] = $this->language->get('text_news');
		$data['text_social'] = $this->language->get('text_social');
		$data['text_payment'] = $this->language->get('text_payment');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', true);
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', true);
		$data['affiliate'] = $this->url->link('affiliate/account', '', true);
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);

		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}

		return $this->load->view('common/footer', $data);
	}
}
