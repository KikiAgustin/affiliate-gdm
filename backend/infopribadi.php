<?php
class ControllerAffiliateInfoPribadi extends Controller {
    public function index() {

        if (!$this->affiliate->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('affiliate/infopribadi', '', 'SSL');

			$this->response->redirect($this->url->link('affiliate/login', '', 'SSL'));
		}

        // Load model jika diperlukan
        $this->load->model('affiliate/affiliate');

        // Menetapkan data untuk view
        $data['heading_title'] = 'Affiliate | Informasi Pribadi';

        $data['template_assets'] = "https://gudangmaterials.id/catalog/view/theme/journal2/template/affiliate/assets/sbadmin/";
        
        // template
		$data['header'] = $this->load->controller('common/header_affiliate', $data);
        $data['footer'] = $this->load->controller('common/footer_affiliate');
        // Data lain yang ingin ditampilkan

        // Load template untuk halaman affiliate
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/affiliate/infopribadi.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/affiliate/infopribadi.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/affiliate/infopribadi.tpl', $data));
		}
    }
}
?>
