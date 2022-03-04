<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("questions");
	}

	private $name = 'questions';
    private $title = 'questions';
    private $table = "questions";

	protected $validate = [
        [
            'field' => 'question',
            'label' => 'Question',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'answer',
            'label' => 'Answer',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'option_a',
            'label' => 'Option A',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'option_b',
            'label' => 'Option B',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'option_c',
            'label' => 'Option C',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'option_d',
            'label' => 'Option D',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
    ];

	public function index()
	{
		$data['name'] = $this->name;
		$data['title'] = $this->title;
        $data['url'] = $this->redirect;
        $data['dataTables'] = TRUE;

        $this->template->load(admin('template'), $this->redirect.'/home', $data);
	}

	public function get()
    {
        $fetch_data = $this->main->make_datatables('Questions_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->question;

            $sub_array[] = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-outline-primary mr-2"').
                    form_open($this->redirect.'/delete', ['id' => e_id($row->id)], ['id' => e_id($row->id)]).form_button([ 'content' => '<i class="fas fa-trash"></i>','type'  => 'button','class' => 'btn btn-outline-danger', 'onclick' => "remove(".e_id($row->id).")"]).form_close().'</div>';

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();  

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, ['is_deleted' => 0]),
            "recordsFiltered"   => $this->main->get_filtered_data('blog_model'),
            "data"              => $data,
            $csrf_name          => $csrf_hash
        );
        
        echo json_encode($output);
    }

    public function add()
	{
		$this->form_validation->set_rules($this->validate);
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['title'] = $this->title;
            $data['operation'] = "add";
            $data['select'] = TRUE;
            $data['url'] = $this->redirect;
            
            return $this->template->load(admin('template'), $this->redirect.'/add', $data);
        }
        else
        {
        	$post = [
        		'question' => $this->input->post('question'),
        		'answer'   => $this->input->post('answer'),
        		'option_a' => $this->input->post('option_a'),
        		'option_b' => $this->input->post('option_b'),
        		'option_c' => $this->input->post('option_c'),
        		'option_d' => $this->input->post('option_d'),
        	];

        	$id = $this->main->add($post, $this->table);
            
        	flashMsg($id, ucwords($this->title)." Added Successfully.", ucwords($this->title)." Not Added. Try again.", $this->redirect);
        }
	}

	public function update($id)
	{
		$this->form_validation->set_rules($this->validate);
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['name'] = $this->name;
            $data['id'] = $id;
			$data['title'] = $this->title;
			$data['operation'] = "update";
	        $data['select'] = TRUE;
            $data['url'] = $this->redirect;
            
			$data['data'] = $this->main->get($this->table, 'id, question, answer, option_a, option_b, option_c, option_d', ['id' => d_id($id)]);
			
			if ($data['data']) 
			{
				$this->session->set_flashdata('updateId', $id);
				return $this->template->load(admin('template'), $this->redirect.'/add', $data);
			}
			else
				return $this->error_404();
        }
        else
        {
        	$updateId = $this->session->updateId;

            $post = [
        		'question' => $this->input->post('question'),
        		'answer'   => $this->input->post('answer'),
        		'option_a' => $this->input->post('option_a'),
        		'option_b' => $this->input->post('option_b'),
        		'option_c' => $this->input->post('option_c'),
        		'option_d' => $this->input->post('option_d'),
        	];

        	$id = $this->main->update(['id' => d_id($updateId)], $post, $this->table);

			flashMsg($id, ucwords($this->title)." Updated Successfully.", ucwords($this->title)." Not Updated. Try again.", $this->redirect);
        }
	}

	public function delete()
	{
		$id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);

		flashMsg($id, ucwords($this->title)." Deleted Successfully.", ucwords($this->title)." Not Deleted. Try again.", $this->redirect);
	}
}