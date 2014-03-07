<?

class hub_model
{

	public function get( $frontrear='', $string='' )
	{
		$string = make_for_search( $string );

        return db::query("SELECT * FROM hubs WHERE `frontrear` = '$frontrear' AND `name` LIKE '%$string%' ORDER BY `name`");

//        return db::query("SELECT *, MATCH (name) AGAINST ('$string') AS score FROM hubs WHERE MATCH (name) AGAINST ('$string') AND frontrear = '$frontrear'");
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