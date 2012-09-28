<?

class group_model {
	public function get($id='')
	{
		if (isset($id)) {
			
			return null;
			
		} else {
			$groups_table  = db( 'groups' );
					
			$groups = $groups_table->select('*')
							->order_by('groups','ASC')
							->execute();
							
			return $goups;
		}
	}
	
	
	public function update($id='')
	{
		
	}


	public function delete($id='')
	{
		
	}
}
