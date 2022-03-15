<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("quiz");
	}

	private $name = 'quiz';
    private $title = 'quiz';
    private $table = "quiz_ans";

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
        $fetch_data = $this->main->make_datatables('quiz_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->name;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->city;
            $sub_array[] = $row->school;

            $action = '<div class="ml-0 table-display row">'.anchor($this->redirect.'/view/'.e_id($row->id), '<i class="fa fa-eye"></i>', 'class="btn btn-outline-primary mr-2"');
            
            if(!$row->winner) $action .= anchor($this->redirect.'/winner/'.e_id($row->id), '<i class="fa fa-thumbs-up"></i>', 'class="btn btn-outline-success mr-2"');
            $action .= '</div>';
            $sub_array[] = $action;

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();  

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, []),
            "recordsFiltered"   => $this->main->get_filtered_data('quiz_model'),
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
        
        return $this->template->load(admin('template'), $this->redirect.'/view', $data);
    }

    public function winner($id)
    {
        $id = $this->main->update(['id' => d_id($id)], ['winner' => 1], $this->table);

		flashMsg($id, ucwords($this->title)." Updated Successfully.", ucwords($this->title)." Not Updated. Try again.", $this->redirect);
    }
}