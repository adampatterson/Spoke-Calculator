<?php 
class api_controller {
	public function rim($id='')
	{
		echo json_encode( $rim );
	}
	
	public function hub($id='')
	{
		echo json_encode( $hub );
	}

	public function group($id='')
	{
		echo json_encode( $group );
	}
}
