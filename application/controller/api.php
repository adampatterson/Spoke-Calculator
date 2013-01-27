<?php 
class api_controller {
	
	public function index()
	{
		
	}

	public function rim($size='', $argument='')
	{
		$rim = load::model ( 'rim' );
		
		if (is_numeric($argument)) {
			$rims = $rim->get_single( $argument );
		} else {
			$rims = $rim->get( $size, $argument );
		}
		
		echo json_encode( $rims );
	}
	
	
	public function hub($frontrear='', $argument='')
	{	
		$hub = load::model ( 'hub' );
		
		if (is_numeric($argument)) {
			$hubs = $hub->get_single( $argument );
		} else {
			$hubs = $hub->get( $frontrear, $argument );
		}
		
		echo json_encode( $hubs );
	}
	

	public function group($id='')
	{
		echo json_encode( $group );
	}
}
