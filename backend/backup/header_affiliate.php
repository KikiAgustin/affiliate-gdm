<?php
class ControllerCommonHeaderAffiliate extends Controller {
	public function index($data = array()) {


		$data['template_assets'] = "https://gudangmaterials.id/catalog/view/theme/journal2/template/affiliate/assets/sbadmin/";
		$data['link_member'] = $this->url->link('affiliate/member', '', 'SSL');
		$data['link_dashboard'] = $this->url->link('affiliate/dashboard', '', 'SSL');
		$data['link_profile'] = $this->url->link('affiliate/profile', '', 'SSL');
		$data['link_settings'] = $this->url->link('affiliate/settings', '', 'SSL');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/affiliate/header.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/affiliate/header.tpl', $data);
		} else {
			return $this->load->view('default/template/affiliate/header.tpl', $data);
		}
	}
}