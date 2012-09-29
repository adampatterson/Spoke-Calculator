<?

class hub_model {
	public function get( $orientation, $size, $string )
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

		$hubs = db::query("SELECT * FROM hubs WHERE MATCH(`model`,`name`) AGAINST ('$index_text')");

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