<?

class dev_controller {

    public function index ()
    {
		die;
		$rims = json_decode( file_get_contents( 'http://lenni.info/edd/rims?query=9' ) );
        
		$rim_table          = db('rims_copy');
		
		foreach( $rims as $rim )
		{
			$rim_table->insert(array(
   				'name'		=> $rim->fields->name,
   				'erd'		=> $rim->fields->erd,
   				'osb'  		=> $rim->fields->osb,
   				'size'  	=> $rim->fields->size
   			));
        }

		$hubs = json_decode( file_get_contents( 'http://lenni.info/edd/hubs?query=0' ) );

		$hub_table          = db('hubs_copy');
		
		foreach( $hubs as $hub )
		{
			$hub_table->insert(array(
   				'name'		=> $hub->fields->name,
   				'frontrear'	=> $hub->fields->frontrear,
   				'fdl'  		=> $hub->fields->lfd,
   				'fdr'  		=> $hub->fields->rfd,
   				'cfl'		=> $hub->fields->c2l,
   				'cfr'  		=> $hub->fields->c2r,
   				'shd'		=> $hub->fields->shd
   			));
        }

    }

}