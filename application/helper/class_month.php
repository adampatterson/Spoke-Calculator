<?
class current_month {
	public function currentMonth($currentMonth = '') {
	    $numberList = range('1', '12');
	    
	    // Loop NumberList
	    foreach ($numberList as $number) {
	        
	        $month = date("F", mktime(0, 0, 0, $number, 0, 0)); // March
	        $numberOutput .= '<option value="'.$number.'">'.$month.'</option>';
	    } // END foreach

	    return $numberOutput;
		} // END Function Current Month
	} // END Class Current Month
?>
