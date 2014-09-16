<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('template');

        // Use custom layout (application/views/layout/pagelet.php)
        $this->template->set_layout('pagelet');
        $this->template->set_title('Contact Us');
	}
    public function index()
    {
        $this->load->library('template');

        // Use custom layout (application/views/layout/pagelet.php)
        $this->template->set_layout('pagelet');
        $this->template->set_title('Contact Us');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('contact_model');
		
		
		//validate form input
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('text', 'Text', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() === TRUE)
		{
			//save message in the database
			$this->contact_model->insert();
			
			//show success message
			$this->template->load_view('contact/success');
		}
		else {
			
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$data['name'] = array(
				'type' => 'text',
				'name' => 'name',
				'id' => 'name',
				'value' => $this->form_validation->set_value('name')
			);
			$data['email'] = array(
				'type' => 'email',
				'name' => 'email',
				'id' => 'email',
				'value' => $this->form_validation->set_value('email')
			);
			
			$data['text'] = array(
				'name' => 'text',
				'value' => $this->form_validation->set_value('text')
			);
				
				
			
			
			$this->template->load_view('contact/index',$data);
		}
        
    }
    
    public function all() {
		
		if (!$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
        
		$this->load->model('contact_model');
		$this->template->set_layout('pagelet');
        $this->template->set_title('Contact Us');
		$messages = $this->contact_model->all();
		$this->template->load_view('contact/admin', array(
            'items' => $messages,
            'count' => $this->contact_model->count()
        ));
	}
	
	public function get_by_id($id) {
		
		$this->load->model('contact_model');
        
		$message = $this->contact_model->get($id);
		$this->template->load_view('contact/admin_contact_get_one', array(
            'item' => $message[0]
        ));
	}
	
	public function delete($id) {
		
		if (!$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
        
		$this->load->model('contact_model');
		
		$this->contact_model->delete($id);
		redirect("/contact/all", 'refresh');
	}
    
	public function _pagelet_contact() {
		
		if (!$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
        
		$this->load->model('contact_model');
		
		$messages = $this->contact_model->get_3();
		$this->load->view('contact/pagelet_contact', array(
            'items' => $messages,
            'count' => $this->contact_model->count()
        ));
	}      

}

/* End of file todo.php */
/* Location: ./application/modules/contact/controllers/contact.php */
