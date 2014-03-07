<?

class rim_model
{
	public function get( $string = '' )
	{
	    $string = make_for_search( $string );
	
		return db::query("SELECT * FROM rims WHERE `name` LIKE '%$string%' ORDER BY `name`");

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