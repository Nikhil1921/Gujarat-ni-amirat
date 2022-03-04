<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Video_model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public $table = "videos v";  
	public $select_column = ['v.id', 'v.title'];
	public $search_column = ['v.title'];
    public $order_column = [null, 'v.title', null];
	public $order = ['v.id' => 'DESC'];

	public function make_query()  
	{  
        $this->db->select($this->select_column)	
            ->from($this->table)
            ->where(['v.is_deleted' => 0]);

        $i = 0;

        foreach ($this->search_column as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->search_column) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

    public function getVideos($slug)
    {
        return $this->db->select('v.title, v.video, description')
                        ->from($this->table)
                        ->where(['v.is_deleted' => 0, 'c.cat_slug' => $slug])
                        ->join('blog_category c', 'c.id = v.cat_id')
                        ->get()
                        ->result_array();
    }
}