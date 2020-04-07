<?php
class ControllerExtensionModuleUPThemeProductTabs extends Controller {
	public function index($setting) {

		static $module = 0;
		
		$this->load->language('extension/module/up_theme_product_tabs');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_tax'] = $this->language->get('text_tax');
		$data['text_sale'] = $this->language->get('text_sale');	
		$data['text_new_prod'] = $this->language->get('text_new_prod');
		$data['text_quickview'] = $this->language->get('text_quickview');
		
		$data['text_latest'] = $this->language->get('text_latest');
      	$data['text_featured'] = $this->language->get('text_featured');
      	$data['text_bestseller'] = $this->language->get('text_bestseller');
      	$data['text_special'] = $this->language->get('text_special');
		$data['text_most_viewed'] = $this->language->get('text_most_viewed');

		$data['button_cart'] = $this->language->get('button_cart');
		$data['button_wishlist'] = $this->language->get('button_wishlist');
		$data['button_compare'] = $this->language->get('button_compare');
		
		$data['t1o_product_tabs_style'] = $this->config->get('t1o_product_tabs_style');
		$data['t1o_product_tabs_per_row'] = $this->config->get('t1o_product_tabs_per_row');
		$data['t1o_sale_badge_status'] = $this->config->get('t1o_sale_badge_status');
		$data['t1o_sale_badge_type'] = $this->config->get('t1o_sale_badge_type');
		$data['t1o_new_badge_status'] = $this->config->get('t1o_new_badge_status');
		$data['t1d_img_style'] = $this->config->get('t1d_img_style');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');
		
		// Bestseller

		$data['bestseller_products'] = array();

		$bestseller_results = $this->model_catalog_product->getBestSellerProducts($setting['limit']);

		if ($bestseller_results) {
			foreach ($bestseller_results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}
				
				$swapimages = $this->model_catalog_product->getProductImages($result['product_id']);
			    if ($swapimages) {
				    $swapimage = $this->model_tool_image->resize($swapimages[0]['image'], $setting['width'], $setting['height']);
			    } else {
				    $swapimage = false;
			    }

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$data['bestseller_products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $swapimage,
					'newstart'   => $result['date_added'],
				    'quickview'  => $this->url->link('product/quickview', 'product_id=' . $result['product_id']),
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'brand'      => $result['manufacturer'],
				    'brand_url'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
				);
			}
		}
			
			// Featured
			
			$data['featured_products'] = array();

		$products = explode(',', $this->config->get('featured_product'));

		if (empty($setting['limit'])) {
			$setting['limit'] = 4;
		}

		$products = array_slice($setting['product'], 0, (int)$setting['limit']);

		foreach ($products as $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);

			if ($product_info) {
				if ($product_info['image']) {
					$image = $this->model_tool_image->resize($product_info['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}
				
				$swapimages = $this->model_catalog_product->getProductImages($product_info['product_id']);
			    if ($swapimages) {
			    	$swapimage = $this->model_tool_image->resize($swapimages[0]['image'], $setting['width'], $setting['height']);
			    } else {
			    	$swapimage = false;
		    	}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if ((float)$product_info['special']) {
						$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$special = false;
					}

					if ($this->config->get('config_tax')) {
						$tax = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
					} else {
						$tax = false;
					}

					if ($this->config->get('config_review_status')) {
						$rating = $product_info['rating'];
					} else {
						$rating = false;
					}

				$data['featured_products'][] = array(
					'product_id'  => $product_info['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $swapimage,
					'newstart'   => $product_info['date_added'],
					'quickview'  => $this->url->link('product/quickview', 'product_id=' . $product_info['product_id']),
					'name'        => $product_info['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
					'brand'      => $product_info['manufacturer'],
					'brand_url'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id'])
				);
			}
		}

			
			// Latest
			
			$data['latest_products'] = array();

		$filter_data = array(
			'sort'  => 'p.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit']
		);

		$latest_results = $this->model_catalog_product->getProducts($filter_data);

		if ($latest_results) {
			foreach ($latest_results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}
				
				$swapimages = $this->model_catalog_product->getProductImages($result['product_id']);
		    	if ($swapimages) {
		    		$swapimage = $this->model_tool_image->resize($swapimages[0]['image'], $setting['width'], $setting['height']);
		    	} else {
		    		$swapimage = false;
		    	}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$data['latest_products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $swapimage,
					'newstart'   => $result['date_added'],
				    'quickview'  => $this->url->link('product/quickview', 'product_id=' . $result['product_id']),
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'brand'      => $result['manufacturer'],
				    'brand_url'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
				);
			}
		}
			
			// Specials
			
			$data['special_products'] = array();

		$filter_data = array(
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => $setting['limit']
		);

		$special_results = $this->model_catalog_product->getProductSpecials($filter_data);

		if ($special_results) {
			foreach ($special_results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}
				
				$swapimages = $this->model_catalog_product->getProductImages($result['product_id']);
	    		if ($swapimages) {
		    		$swapimage = $this->model_tool_image->resize($swapimages[0]['image'], $setting['width'], $setting['height']);
		    	} else {
		    		$swapimage = false;
		    	} 

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$data['special_products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $swapimage,
					'newstart'   => $result['date_added'],
				    'quickview'  => $this->url->link('product/quickview', 'product_id=' . $result['product_id']),
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'brand'      => $result['manufacturer'],
				    'brand_url'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
				);
			}
		}
		    
			// Most Viewed
			
			$data['most_viewed_products'] = array();
		
		$query = $this->db->query("SELECT p.product_id FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ORDER BY p.viewed DESC LIMIT " . (int)$setting['limit']);
		
		foreach ($query->rows as $result) { 		
			$product_data[$result['product_id']] = $this->model_catalog_product->getProduct($result['product_id']);
		}

		$results = $product_data;

		if ($results) {
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}
				
				$swapimages = $this->model_catalog_product->getProductImages($result['product_id']);
			    if ($swapimages) {
				    $swapimage = $this->model_tool_image->resize($swapimages[0]['image'], $setting['width'], $setting['height']);
			    } else {
				    $swapimage = false;
			    }

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}

				$data['most_viewed_products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'thumb_swap'  => $swapimage,
					'newstart'   => $result['date_added'],
				    'quickview'  => $this->url->link('product/quickview', 'product_id=' . $result['product_id']),
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']),
					'brand'      => $result['manufacturer'],
				    'brand_url'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
				);
			}
		}
			
            $data['module'] = $module++;
			
			
			return $this->load->view('extension/module/up_theme_product_tabs', $data);
		}
	}

