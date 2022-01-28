<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Youcanwrite extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("youcanwrite");
	}

	private $name = 'youcanwrite';
    private $title = 'you can write';
    private $table = "you_can_write";

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
        $fetch_data = $this->main->make_datatables('you_can_write_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = ucwords($row->name);
            $sub_array[] = $row->mobile;
            $sub_array[] = $row->email;
            $sub_array[] = $row->topic;

           $sub_array[] = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/view/'.e_id($row->id), '<i class="fa fa-eye"></i>', 'class="btn btn-outline-info mr-2"').anchor($this->redirect.'/update/'.e_id($row->id), '<i class="fa fa-edit"></i>', 'class="btn btn-outline-primary mr-2"').
                    form_open($this->redirect.'/delete', ['id' => e_id($row->id)], ['id' => e_id($row->id)]).form_button([ 'content' => '<i class="fas fa-trash"></i>','type'  => 'button','class' => 'btn btn-outline-danger', 'onclick' => "remove(".e_id($row->id).")"]).form_close().'</div>';

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();  

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, ['is_deleted' => 0]),
            "recordsFiltered"   => $this->main->get_filtered_data('you_can_write_model'),
            "data"              => $data,
            $csrf_name          => $csrf_hash
        );
        
        echo json_encode($output);
    }

    public function view($id)
    {
        $data['name'] = $this->name;
        $data['title'] = $this->title;
        $data['operation'] = "view";
        $data['url'] = $this->redirect;
        $data['data'] = $this->main->get($this->table, '*', ['id' => d_id($id)]);

        if ($data['data']) 
            return $this->template->load(admin('template'), $this->redirect.'/view', $data);
        else
            return $this->error_404();
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
            $data['url'] = $this->redirect;
            
            $data['data'] = $this->main->get($this->table, 'blog_slug', ['id' => d_id($id)]);
            
            if ($data['data']) 
            {
                $this->session->set_flashdata('updateId', $id);
                return $this->template->load(admin('template'), $this->redirect.'/update', $data);
            }
            else
                return $this->error_404();
        }
        else
        {
            $updateId = $this->session->updateId;
            $post = [
                'blog_slug'    => str_replace(" ", "-", strtolower($this->input->post('blog_slug')))
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

    protected $validate = [
        [
            'field' => 'blog_slug',
            'label' => 'Blog URL',
            'rules' => 'required|callback_slug_check',
            'errors' => [
                'required' => "%s is Required"
            ]
        ]
    ];

    public function slug_check($str)
    {   
        $id = $this->session->updateId;
        
        if ((!empty($id) && $this->main->check($this->table, ['blog_slug' => $str, 'id != ' => d_id($id)], 'id')) || (empty($id) && $this->main->check($this->table, ['blog_slug' => $str], 'id')))
        {
            $this->form_validation->set_message('slug_check', 'The %s is already in use');
            return FALSE;
        } else{
            return TRUE;
        }
    }
}