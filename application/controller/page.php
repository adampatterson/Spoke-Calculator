<?php 
class page_controller {

    public function home() {
		$group = load::model ( 'group' );
		
		$group = $group->get();
		
        load::view('page/home', array( 'groups'=>$group));
    }
    
    public function hubs( $frontrear = '', $string = '' ) {

        $hub = load::model('hub');

        $hubs = $hub->get( $frontrear, $string );

        var_dump( $hubs );

    }
	
    public function rims( $size = '', $string = '' ) {

        $rim = load::model('rim');

        $rims = $rim->get( $size, $string );

        var_dump( $rims );
    }
	
	
	public function get() {
	    	


    }
	
    public function export() {
        $this->load->view('page_export');
    }
    
    public function help() {
        $this->load->view('page_help');
    }
}

?>
