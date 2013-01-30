<?php 
class api_controller {
	
	public function index()
	{
		
	}

	public function rim( $argument='')
	{
		$rim = load::model ( 'rim' );
		
		if (is_numeric($argument)) {
			$rims = $rim->get_single( $argument );
		} else {
			$rims = $rim->get( $argument );
		}

        $fields = array('fields' => $rims);

        echo json_encode( $fields );
	}
	
	
	public function hub($frontrear='', $argument='')
	{	
		$hub = load::model ( 'hub' );
		
		if (is_numeric($argument)) {
			$hubs = $hub->get_single( $argument );
		} else {
			$hubs = $hub->get( $frontrear, $argument );
		}

        $fields = array('fields' => $hubs);

        echo json_encode( $fields );
	}
	

	public function group($id='')
	{
		echo json_encode( $group );
	}
}
