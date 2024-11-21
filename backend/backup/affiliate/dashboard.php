<?php
class ControllerAffiliateDashboard extends Controller {
    public function index() {

        if (!$this->affiliate->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('affiliate/dashboard', '', 'SSL');

			$this->response->redirect($this->url->link('affiliate/login', '', 'SSL'));
		}

        // Mengambil data dari model atau setting
        $this->load->language('affiliate/dashboard');

        // Load model jika diperlukan
        $this->load->model('affiliate/affiliate');

        // Menetapkan data untuk view
        $data['heading_title'] = 'Affiliate | Dashboard';

        $data['template_assets'] = "https://gudangmaterials.id/catalog/view/theme/journal2/template/affiliate/assets/sbadmin/";
        $data['link_register'] = $this->url->link('affiliate/register', '', 'SSL');
        $data['link_profile'] = $this->url->link('affiliate/profile', '', 'SSL');

        $data['is_dashboard'] = true;
        
		$data['header'] = $this->load->controller('common/header_affiliate', $data);
        $data['footer'] = $this->load->controller('common/footer_affiliate', $data);
        // Data lain yang ingin ditampilkan

        // Load template untuk halaman affiliate
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/affiliate/dashboard.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/affiliate/dashboard.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/affiliate/dashboard.tpl', $data));
		}
    }
}
?>
