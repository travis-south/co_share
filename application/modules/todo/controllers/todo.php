<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todo extends MY_Controller {

    /**
     * Example page
     */
    public function index()
    {
		if (!$this->ion_auth->logged_in())
        {
            redirect('/auth/login', 'refresh');
        }
        
        $this->load->library('template');

        // Use custom layout (application/views/layout/pagelet.php)
        $this->template->set_layout('pagelet');
        $this->template->set_title('New Task Item');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('cosharetask_model');
		
		//validate form input
        $this->form_validation->set_rules('task', 'Task', 'required|xss_clean');

		
		if ($this->form_validation->run() === TRUE)
		{

			//save message in the database
			$this->cosharetask_model->insert();
			
			//show success message
			$this->session->set_flashdata('message', "Task added successfully.");
			
			redirect('/mylist', 'refresh');
			
		}

		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$data['task'] = array(
			'type' => 'text',
			'name' => 'task',
			'id' => 'task',
			'class' => 'todo-input form-control',
			'placeholder' => 'What needs to be done?',
			'value' => $this->form_validation->set_value('task')
		);
		
		$data['private'] = array(
			'name'        => 'private',
			'id'          => 'private',
			'value'       => '0',
			'checked'     => FALSE
		);
		
		$data['pagelet_upload_control'] = Modules::run('photo/_pagelet_upload_control', array(
                // Only display upload button and the uploaded photo
                'message' => '',
                'is_multiple' => FALSE,
                'progress_template' => FALSE,
                'item_template' => '
                    <input type="hidden" name="thumbnail" value="{{thumbnailUrl}}">
                    <img src="{{thumbnailUrl}}" style="width: 50px; height: 50px; padding: 1px;">
                ',
            ));
		$this->template->load_view('todo/index',$data);

        
    }

}

/* End of file todo.php */
/* Location: ./application/modules/todo/controllers/todo.php */
