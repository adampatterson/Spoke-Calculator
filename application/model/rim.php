<?

class rim_model {
	public function get( $size='', $string = '' )
	{
		$index_text = strip_tags( $string );
	    $index_text = str_replace(".", " ", $index_text );
	    $index_text = str_replace(",", " ", $index_text );
	    $index_text = str_replace("'", " ", $index_text );
	    $index_text = str_replace("\"", " ", $index_text );
		$index_text = str_replace("or", " ", $index_text );
		$index_text = str_replace("and", " ", $index_text );


	    $index_text = str_replace("\n", " ", $index_text );
	    $index_text = str_replace("\r", " ", $index_text );
	    $index_text = preg_replace("(\s+)", " ", $index_text );

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