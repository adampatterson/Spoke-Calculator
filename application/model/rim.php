<?

class rim_model
{
	public function get( $size='', $string = '' )
	{
        $index_text = make_for_search( $string );

		$rims = db::query("SELECT * FROM rims WHERE `size` = '$size' AND MATCH(`model`,`name`) AGAINST ('$index_text')");

		return $rims;
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