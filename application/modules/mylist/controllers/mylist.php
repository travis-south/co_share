<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mylist extends MY_Controller {

    /**
     * Example page
     */
    public function index()
    {
		
		if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        
        
        $this->load->library('template');

        // Use custom layout (application/views/layout/pagelet.php)
        $this->template->set_layout('pagelet');
        $this->template->set_title('My Tasks');
		$this->load->model('cosharetask_model');
		
		$tasks = $this->cosharetask_model->get_my_tasks();
		
        $this->template->load_view('mylist/index', array(
            // Load todo pagelet with some fake items
            'pagelet_todo' => Modules::run('mylist/_pagelet_todo', $tasks)
        ));
    }

    /**
     * Render all todo items
     * and an ajax form to submit new item
     */
    public function _pagelet_todo($items = array())
    {
        $this->load->helper('form');

        $items_left = 0;
        foreach ($items as $item)
        {
            if ( ! $item['completed'])
            {
                $items_left++;
            }
        }
        $this->load->view('mylist/pagelet_todo', array(
            'items' => $items,
            'items_left' => $items_left,

            // Show upload control from jQuery file upload add-on
            // if it was already installed
            'pagelet_upload_control' => Modules::run('photo/_pagelet_upload_control', array(
                // Only display upload button and the uploaded photo
                'message' => '',
                'is_multiple' => FALSE,
                'progress_template' => FALSE,
                'item_template' => '
                    <input type="hidden" name="thumbnail" value="{{thumbnailUrl}}">
                    <img src="{{thumbnailUrl}}" style="width: 50px; height: 50px; padding: 1px;">
                ',
            )),
        ));
    }

    /**
     * Render todo item
     */
    public function _pagelet_item($item)
    {
        $this->load->view('mylist/pagelet_item', $item);
    }
}

/* End of file todo.php */
/* Location: ./application/modules/todo/controllers/todo.php */
