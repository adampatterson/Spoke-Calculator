<?

class hub_model
{

	public function get( $frontrear='', $string='' )
	{
        $raw_string = explode(' ', $string);
        $raw_total = count($raw_string);

        $name = $raw_string[0];

        if ( $raw_total == 1 )
        {
            return db::query("SELECT * FROM hubs WHERE `frontrear` = '$frontrear' AND `name` LIKE '%$name%'");
        } else {

            $model = ltrim(str_replace($name, '', $string));

            $model = make_for_search( $model );

            return db::query("SELECT * FROM hubs WHERE `frontrear` = '$frontrear' AND `name` LIKE '%$name%' AND `model` LIKE '%$model%'");
        }
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