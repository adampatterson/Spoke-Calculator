<?php 
class page_controller {

    public function home() {
		$group = load::model ( 'group' );
		
		$group = $group->get();
		
        load::view('page/home', array( 'groups'=>$group));
    }
    
    public function hubs($current_page=1) {
		// Select Database Table
		$hubs_table = db('hubinfo');
		
		$total = $hubs_table->count()->execute();
		$page = new pagination($total, $current_page,25);
		
		$hubs = $hubs_table->select('*')
							->order_by('hname','DESC')
							->order_by('hmodel','ASC')
							->limit($page->limit)
							->offset($page->min)
							->execute();
							
		$groups_table = db('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
							
		//print_r(get_defined_vars());
		$hubs_table = load::model('groups');
		
        load::view('page_hubs', array( 'hubs'=>$hubs,'page'=>$page, 'groups'=>$groups));
    }
	
    public function rims($current_page=1) {
    	// Select Database Table
		$rims_table = db('riminfo');
		$total = $rims_table->count()->execute();
		$page = new pagination($total, $current_page,25);
		
		$rims = $rims_table->select('*')
							->order_by('rname','DESC')
							->order_by('rmodel','ASC')
							->limit($page->limit)
							->offset($page->min)
							->execute();
		
		$groups_table = db('groups');				
		$groups = $groups_table->select('*')
						->order_by('groups','ASC')
						->execute();
										
		//print_r(get_defined_vars());
		$rims_table = $this->load->model('groups');
		
        $this->load->view('page_rims', array( 'rims'=>$rims,'page'=>$page, 'groups'=>$groups));
    }
	
	
	public function get() {
	    	
		// Select Database Table
		$hubs_table = db('hubinfo');
		$rims_table = db('riminfo');
		
		$hubs = $hubs_table->select('*')
							->order_by('hname','DESC')
							->order_by('hmodel','ASC')
							->execute();
							
		$groups_table = db('groups');				
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
