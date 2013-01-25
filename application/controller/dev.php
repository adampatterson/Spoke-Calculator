<?

class dev_controller {

    public function index ()
    {

        $rims = json_decode( file_get_contents( 'http://lenni.info/edd/rims?query=a' ) );
        $hubs = json_decode( file_get_contents( 'http://lenni.info/edd/hubs?query=a' ) );

//        foreach( $rims as $rim ){
//            var_dump($rim->fields);
//            die;
//        }

        foreach( $hubs as $hub ){
            var_dump($hub->fields);
            die;
        }
    }

}