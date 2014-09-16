<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CoShareTask extends MY_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->library('template');
        $this->template->add_js('modules/cosharetask.js');
		$this->load->model('cosharetask_model');
	}
    public function index()
    {

        $this->load->library('template');
        $this->template->add_js('modules/cosharetask.js');
        $this->template->set_title('Co-Shared Task List');

        
		$coshare_data  = $this->cosharetask_model->get_10();
        $this->template->load_view('index',array('coshare_data'=>$coshare_data));
    }
    
    public function delete($id) {
		
		$this->cosharetask_model->delete($id);
		redirect("/", 'refresh');
	}
	
	public function search() {
		$this->template->set_title('Co-Shared Task List - Search Results');
		$coshare_data  = $this->cosharetask_model->search($this->input->post('q'));
        $this->template->load_view('index',array('task_count'=>sizeOf($coshare_data),'coshare_data'=>$coshare_data));
	}
}

/* End of file cosharetask.php */
/* Location: ./application/modules/cosharelist/controllers/cosharetask.php */
