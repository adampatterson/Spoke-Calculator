<?

function valid_user ()
{
	if(!user::valid()) 
	{
		//note::set("error","session",NOTE_SESSION);
		note::set('error','session',CURRENT_PAGE);
		url::redirect('developer'); 
	}
}

function current_page ( $page, $alt = '' ) 
{
	if (CURRENT_PAGE == $page)
		echo 'active';
}

function icon ( $page ) 
{
	if (CURRENT_PAGE == $page)
		echo 'icon-white';
	else
		echo 'icon-black';
}


function make_for_search( $string )
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

    return $index_text;
}


/**
 * Function: checked
 * If $val == 1 (true), outputs ' checked="checked"'
 *
 * Parameters:
 *     $val - Value to check.
 */
function checked( $val1, $val2, $return = false ) 
{
	if ( is_array( $val2 ) ) {
		foreach ($val2 as $value) {
		
			if ( $val1 == $value->id )
				if ($return)
					return ' checked="checked"';
				else
					echo ' checked="checked"';
		}
	} else {
		if ( $val1 == $val2 )
			if ($return)
				return ' checked="checked"';
			else
				echo ' checked="checked"';
	}
}