<?php 
class controller {
	public function sql($type="") {
		if ($type="hub") {
			ob_start();
			$db_settings = config::get('db');
			
			$dbhost = $db_settings['host'];
			$dbuser = $db_settings['username'];
			$dbpass = $db_settings['password'];
			$dbname = $db_settings['database'];
			
			// Select Database Table
			$table = $this->db->table('hubinfo');
			
			$backupFile = $dbname.date("Y-m-d-H-i-s").'.sql';
			$command = "mysqldump  --add-drop-table --host=$dbhost --user='$dbuser' --password='$dbpass' $dbname";
			//echo $command;
			
			system($command);
			
			$dump = ob_get_contents();
			ob_end_clean();
			
			$fp = fopen('storage/db-backup/export-spoke-calc-hub-'.date("Y-m-d-H").'.sql', 'w');
			fputs($fp, $dump);
			fclose($fp);


			header('Content-type: application/sql');
			header('Content-Disposition: attachment; filename="storage/db-backup/export-spoke-calc-hub-'.date("Y-m-d-H").'.sql"');
			readfile('storage/db-backup/export-spoke-calc-hub-'.date("Y-m-d-H").'.sql');
				
		} elseif ($type="rim") {
			ob_start();
			$db_settings = config::get('db');
			
			$dbhost = $db_settings['host'];
			$dbuser = $db_settings['username'];
			$dbpass = $db_settings['password'];
			$dbname = $db_settings['database'];
			
			// Select Database Table
			$table = $this->db->table('riminfo');
			
			$backupFile = 'export-addressbook-rim-'.date("Y-m-d-H-i-s").'.sql';
			$command = "mysqldump  --add-drop-table --host=$dbhost --user='$dbuser' --password='$dbpass' $dbname";
			//echo $command;
			
			system($command);
			
			$dump = ob_get_contents();
			ob_end_clean();
			
			$fp = fopen('storage/db-backup/export-spoke-calc-rim-'.date("Y-m-d-H").'.sql', 'w');
			fputs($fp, $dump);
			fclose($fp);


			header('Content-type: application/sql');
			header('Content-Disposition: attachment; filename="storage/db-backup/export-spoke-calc-rim-'.date("Y-m-d-H").'.sql"');
			readfile('storage/db-backup/export-spoke-calc-rim-'.date("Y-m-d-H").'.sql');
		}

	} // END Function SQL Hub

	public function json()
	{
		
	}

}
