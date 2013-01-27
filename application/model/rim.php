<?

class rim_model
{
	public function get( $size='', $string = '' )
	{
	    $string = make_for_search( $string );
	
		return db::query("SELECT * FROM rims WHERE `size` = '$size' AND `name` LIKE '%$string%'");

	}
	
	
	public function get_single( $id = '' )
	{
		
		$rims = db('rims')->select('*')
		                 ->where('id','=',$id)
		                 ->execute();
		
		return $rims;

	}

	
	public function update($id='')
	{
		
	}

	public function delete($id='')
	{
		
	}
}