<?php
class controller {
	
	public function process() {

/*
// Process the rim data from get.php
		if ( isset($rimid) ) {	
		// Make a MySQL Connection
		        $rimid = $_REQUEST["rimid"];
		
		        # setup SQL statement to retrieve link that we want to edit
		        $sql  = " SELECT * FROM riminfo ";
		        $sql .= " WHERE rimid = $rimid ";
		
		        # execute SQL statement
		        $result = mysql_query($sql);
		
		        # retrieve values
				$row = mysql_fetch_array($result);
				$rname = $row["rname"];
				$rsize = $row["rsize"];
				$rmodel = $row["rmodel"];
				$erd = $row["erd"];
		}
		
		// Process the hub data from get.php
		if ( isset($hubid) ) {	
				$hubid = $_REQUEST["hubid"];
		
		        # setup SQL statement to retrieve link that we want to edit
				$sql  = " SELECT * FROM hubinfo ";
		        $sql .= " WHERE hubid = $hubid ";
		
		        # execute SQL statement
		        $result = mysql_query($sql);
		
		        # retrieve values
				$row = mysql_fetch_array($result);
		    	$hubid = $row["hubid"];
				$hname = $row["hname"];
				$hmodel = $row["hmodel"];
				$fdl = $row["fdl"];
				$fdr = $row["fdr"];
				$cfl = $row["cfl"];
				$cfr = $row["cfr"];
				$hspace = $row["hspace"];
				$frontrear = $row["frontrear"];
		}
	
		// Print out Error message.	
		if ($erd == '') { echo "<span class=\"error\">please go back and enter the Rim ERD.<br></span>"; 
				}
		if ($fdl == '') { echo "<span class=\"error\">please go back and enter The Left Flange Diamiter.<br></span>"; 
				}
		if ($fdr == '') { echo "<span class=\"error\">please go back and enter The Right Flange Diamiter.<br></span>"; 
				}
		if ($cfl == '') { echo "<span class=\"error\">please go back and enter The Left Center to Flange.<br></span>"; 
				}
		if ($cfr == '') { echo "<span class=\"error\">please go back and enter The Right Center to Flange.<br></span>"; 
		exit();
		}
		

// Save calculation data to DB.
		if ( $saverim == "saverim" ) {
		// Make a MySQL Connection
		    $cid = mysql_connect($host,$dbuser,$dbpwd);
		    if (!$cid) { print "ERROR: " . mysql_error() . "\n";    }
		#select database to use
			mysql_select_db("$dbname") or die(mysql_error());
		
		// Insert a row of information into the table
		mysql_query("INSERT INTO riminfo 
		(rname, rmodel, erd, spokes, rsize) VALUES('$rname', '$rmodel', '$erd', '$spokes', '$rsize' ) ") 
		or die(mysql_error());  
		
		echo "Rim Data Saved!<br />";
		}
		
		if ( $savehub == "savehub" ) {
		// Make a MySQL Connection
		mysql_connect("$host", "$dbuser", "$dbpwd") or die(mysql_error());
		#select database to use
		mysql_select_db("$dbname") or die(mysql_error());
		
		// Insert a row of information into the table
		mysql_query("INSERT INTO hubinfo 
		(hname, hmodel, fdl, fdr, cfl, cfr, spokes, hspace, frontrear) VALUES('$hname', '$hmodel', '$fdl', '$fdr', '$cfl', '$cfr', '$spokes', '$hspace', '$frontrear' ) ") 
		or die(mysql_error());  
		
		echo "Hub Data Saved!<br />";
		}	
*/
		
		// Constants
		$two="2";
		$degree="360";
		$power="2";
		$bmx="20";
		
		
		$cfl = 			$this->input->post('cfl');
		$cfr = 			$this->input->post('cfr');
		$fdl = 			$this->input->post('fdl');
		$fdr = 			$this->input->post('fdr');
		$erd = 			$this->input->post('erd');
		
		$hname = 		$this->input->post('hname');
		$hmodel = 		$this->input->post('hmodel');
		$spokes = 		$this->input->post('spokes');
		$hspace = 		$this->input->post('hspace');
		$frontrear = 	$this->input->post('frontrear');

		$rname = 		$this->input->post('rname');
		$rmodel = 		$this->input->post('rmodel');
		$spokes = 		$this->input->post('spokes');
		$rsize = 		$this->input->post('rsize');
		
		$cross = 		$this->input->post('cross');
		
		if ($rsize >= $bmx){ 
				$correction="3.2"; //BMX wheels
				} else {
				$correction="1.4"; //Anything else
				}

		// Powers
		$cflpower= pow($cfl, $power);
		$cfrpower= pow($cfr, $power);
		$fdlpower= pow($fdl, $power);
		$fdrpower= pow($fdr, $power);
		$erdpower= pow($erd, $power);
		
		// Getting the value for alpha
		$alpha= $degree/($spokes/$two)*$cross;
		
		// Cosin of alpha
		$cosine= cos(deg2rad($alpha));
		
		// Left side calculation
		$leftside= $cflpower + $fdlpower + $erdpower - $two * $fdl * $erd * $cosine;
		
		// Right side calulation
		$rightside= $cfrpower + $fdrpower + $erdpower - $two * $fdr * $erd * $cosine;
		
		// The left Spoke Length
		$leftlength= sqrt($leftside)/2+$correction;
		$rightlength= sqrt($rightside)/2+$correction;
		
		/**
		echo "<pre>";
		print_r(get_defined_vars());
		echo "</pre>";
		**/
		
		$this->load->view('page_calculation', array('data'=>get_defined_vars()));


	}
	
}

?>
