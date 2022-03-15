<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Participants extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect = admin("participants");
	}

	private $name = 'participants';
    private $title = 'event participants';
    private $table = "participants";

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
        $fetch_data = $this->main->make_datatables('participants_model');
        $sr = $_POST['start'] + 1;
        $data = array();

        foreach($fetch_data as $row)  
        {  
            $sub_array = array();
            $sub_array[] = $sr;
            $sub_array[] = $row->name;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->city;

            $data[] = $sub_array;  
            $sr++;
        }
        
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash();  

        $output = array(  
            "draw"              => intval($_POST["draw"]),  
            "recordsTotal"      => $this->main->count($this->table, []),
            "recordsFiltered"   => $this->main->get_filtered_data('participants_model'),
            "data"              => $data,
            $csrf_name          => $csrf_hash
        );
        
        echo json_encode($output);
    }
}