<?

class hub_model
{

	public function get( $frontrear='', $string='' )
	{
		$string = make_for_search( $string );
		
        return db::query("SELECT * FROM hubs WHERE `frontrear` = '$frontrear' AND `name` LIKE '%$string%'");
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