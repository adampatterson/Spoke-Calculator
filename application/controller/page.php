<?php 
class page_controller {

    public function home() {
    	
		$groups_table = $this->db->table('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
		
        $this->load->view('page_home', array( 'groups'=>$groups));
    }
    
    public function hubs($current_page=1) {
		// Select Database Table
		$hubs_table = $this->db->table('hubinfo');
		$total = $hubs_table->count()->execute();
		$page = new pagination($total, $current_page,25);
		
		$hubs = $hubs_table->select('*')
							->order_by('hname','DESC')
							->order_by('hmodel','ASC')
							->limit($page->limit)
							->offset($page->min)
							->execute();
							
		$groups_table = $this->db->table('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
							
		//print_r(get_defined_vars());
		$hubs_table = $this->load->model('groups');
		
        $this->load->view('page_hubs', array( 'hubs'=>$hubs,'page'=>$page, 'groups'=>$groups));
    }
	
    public function rims($current_page=1) {
    	// Select Database Table
		$rims_table = $this->db->table('riminfo');
		$total = $rims_table->count()->execute();
		$page = new pagination($total, $current_page,25);
		
		$rims = $rims_table->select('*')
							->order_by('rname','DESC')
							->order_by('rmodel','ASC')
							->limit($page->limit)
							->offset($page->min)
							->execute();
		
		$groups_table = $this->db->table('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
										
		//print_r(get_defined_vars());
		$rims_table = $this->load->model('groups');
		
        $this->load->view('page_rims', array( 'rims'=>$rims,'page'=>$page, 'groups'=>$groups));
    }
	
	
	public function get() {
	    	
		// Select Database Table
		$hubs_table = $this->db->table('hubinfo');
		$rims_table = $this->db->table('riminfo');
		
		$hubs = $hubs_table->select('*')
							->order_by('hname','DESC')
							->order_by('hmodel','ASC')
							->execute();
							
		$groups_table = $this->db->table('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();

		$rims = $rims_table->select('*')
							->order_by('rname','DESC')
							->order_by('rmodel','ASC')
							->execute();

		//print_r(get_defined_vars());
		$rims_table = $this->load->model('groups');
		
        $this->load->view('page_get', array('hubs'=>$hubs,'rims'=>$rims,'groups'=>$groups));
    }
	
    public function export() {
        $this->load->view('page_export');
    }
    
    public function help() {
        $this->load->view('page_help');
    }
}

?>
