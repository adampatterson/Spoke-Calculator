<?php 
class api_controller {
	
	public function index()
	{
		
	}
	
	
	public function rim($argument='')
	{
		$rim = load::model ( 'hub' );
		
		if (is_numeric($argument)) {
			$rims = $rim->get_single( $argument );
		} else {
			$rims = $rim->get( $argument );
		}
		
		echo json_encode( $rims );
	}
	
	
	public function hub($orientation, $size, $argument='')
	{	
		$hub = load::model ( 'hub' );
		
		if (is_numeric($argument)) {
			$hubs = $hub->get_single( $argument );
		} else {
			$hubs = $hub->get( $orientation, $size, $argument );
		}
		
		echo json_encode( $hub );
	}
	

	public function group($id='')
	{
		echo json_encode( $group );
	}
}
