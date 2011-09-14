<? bench::mark('start'); 

  $browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    if ($browser == true){
    $browser = 'iphone';
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<base href="<?=BASE_URL; ?>" />
	<?php if($browser == 'iphone'){ ?>
 	<title>Spoke Calculator</title>
	<? }else{ ?>
 	 <title>Spoke Calculator - <?= $title?></title>
	<? } ?>
	<?php if($browser == 'iphone'){ ?>
  	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/lib/blueprint/liquid.css" media="screen, projection" />
	<? } else {  ?>
	<link rel="stylesheet" href="<?=BASE_URL; ?>assets/lib/blueprint/screen.css" type="text/css" media="screen, projection" />
	<? } ?>
	<link rel="stylesheet" href="<?=BASE_URL; ?>assets/css/custom.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL; ?>assets/lib/blueprint/print.css" media="print" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/validation.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/showHide.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/appendElement.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.passwordmask.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.validate.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.highlightFade.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/lib/jQuery/plugins/jquery.tabs.js"></script>
	<script type="text/javascript" src="<?=BASE_URL; ?>assets/js/utility.js"></script>
    <link rel="apple-touch-icon" href="<?=BASE_URL; ?>apple_icon.png" />
    <link rel="shortcut icon" href="<?=BASE_URL; ?>favicon.ico" />
    <script type="text/javascript">
        $(document).ready(function(){
            $(".markItUp").markItUp(mySettings);
        });
    </script>
	<? if($browser == 'iphone'){ ?>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<? } ?>
</head>
<body> 
    <div class="container">
        <div class="column span-24 header last">
            <div class="column span-12 logo">
                <img src="<?=BASE_URL; ?>assets/images/logo.png" alt="Spoke Calculator" />
            </div>
            <div class="column span-11 utility last">
                <div class="column utility-nav last">
                    <a href="<?=url::page('index.php/admin/login'); ?>" class="utilLogin">Login</a>
                    <a href="<?=url::page('index.php/admin/profile'); ?>" class="utilProfile">Profile</a>
                    <a href="<?=url::page('index.php/page/about'); ?>" class="utilAbout">About</a>
                    <a href="<?=url::page('index.php/page/help'); ?>" class="utilHelp">Help</a>
                </div>
                <div id="header-search" class="search-box column utility-search last right">
                    <form id="main-search-form" action="<?=url::page('index.php/page/search'); ?>" method="post">
                        <div class="search-button">
                            <input class="submit" value="" type="submit" />
                        </div>
                        <div class="center">
                            <input class="search placeholder" name="search" title="Search for a Contact" value="" type="text" />
                        </div>
                        <div class="left">
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <div class="column span-23 last contentWrapper">
            <div class="column span-23 last navigation">
                <ul>
                    <li class="page <? if ($title == 'Home') echo 'currentpage'; ?>"><a href="<?=url::page('index.php/page/home'); ?>">Home</a></li>
					<li class="page <? if ($title == 'Get') echo 'currentpage'; ?>"><a href="<?=url::page('index.php/page/get'); ?>">Get</a></li>
                    <li class="page <? if ($title == 'Hubs') echo 'currentpage'; ?>"><a href="<?=url::page('index.php/page/hubs'); ?>">Hubs</a></li>
                    <li class="page <? if ($title == 'Rims') echo 'currentpage'; ?>"><a href="<?=url::page('index.php/page/rims'); ?>">Rims</a></li>
                    <li class="page <? if ($title == 'Export') echo 'currentpage'; ?>"><a href="<?=url::page('index.php/page/export'); ?>">Export</a></li>
                    <li class="page <? if ($title == 'Import') echo 'currentpage'; ?> none"><a href="<?=url::page('index.php/page/import'); ?>">Import</a></li>
                    <li class="page <? if ($title == 'Members') echo 'currentpage'; ?> none"><a href="<?=url::page('index.php/page/members'); ?>">Members</a></li>
                </ul>
            </div>

            <div class="column span-21 prepend-1 append-1 content last">
