<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("events");
	}

	private $name = 'events';
    private $title = 'events';
    private $table = "events";

	protected $validate = [
        [
            'field' => 'title',
            'label' => 'title',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'from_date',
            'label' => 'From date',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'from_time',
            'label' => 'From time',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'to_date',
            'label' => 'To date',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'to_time',
            'label' => 'To time',
            'rules' => 'required',
            'errors' => [
                'required' => "%s is Required"
            ]
        ],
        [
            'field' => 'description',
            'label' => 'description',
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
        $fetch_data = $this->main->make_datatables('events_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->title;
            $sub_array[] = $row->from_date;
            $sub_array[] = $row->to_date;

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
        		'title'       => $this->input->post('title'),
        		'from_date'   => $this->input->post('from_date'),
        		'from_time'   => $this->input->post('from_time'),
        		'to_date'     => $this->input->post('to_date'),
        		'to_time'     => $this->input->post('to_time'),
        		'description' => $this->input->post('description'),
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
            
			$data['data'] = $this->main->get($this->table, 'id, title, from_date, from_time, to_date, to_time, description', ['id' => d_id($id)]);
			
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
        		'title'       => $this->input->post('title'),
        		'from_date'   => $this->input->post('from_date'),
        		'from_time'   => $this->input->post('from_time'),
        		'to_date'     => $this->input->post('to_date'),
        		'to_time'     => $this->input->post('to_time'),
        		'description' => $this->input->post('description'),
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

