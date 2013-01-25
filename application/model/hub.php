<?

class hub_model
{

	public function get( $frontrear='', $string='' )
	{
        $index_text = make_for_search( $string );

		//SELECT * FROM hubs WHERE `frontrear`='$frontrear' AND `size` ='$size' AND

		$hubs = db::query("SELECT * FROM hubs WHERE `frontrear` = '$frontrear' AND MATCH(`model`,`name`) AGAINST ('$index_text')");
		
		//$hubs = db::query("SELECT * FROM hubs WHERE 'frontrear'='$frontrear' AND  MATCH(`model`,`name`) AGAINST ($index_text')");
		
		return $hubs;
	}
	
	
	public function get_single( $id = '' )
	{
		
		$hub = db('hubs')->select('*')
		                 ->where('id','=',$id)
		                 ->execute();
		
		return $hub;

	}
	
	
	public function update($id='')
	{
		
	}


	public function delete($id='')
	{
		
	}
}