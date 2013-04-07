<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= TITLE ?> - <?= $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link rel="stylesheet" href="<?= CSS ?>application.css" />

<link href="<?= CSS ?>responsive.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="shortcut icon" href="../assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    <script id="rims" type="text/handlebars">
        {{#fields}}
            <div class="rim_data well well-small" data-name="{{name}}" data-erd="{{erd}}" data-osb="{{osb}}" data-size="{{size}}">
                <strong>{{name}}</strong>
                <ul>
                    <li>ERD: {{erd}} mm</li>
                    <li>OSB: {{osb}} mm</li>
                    <li>Size: {{size}}</li>
                </ul>
            </div>
        {{/fields}}
    </script>

    <script id="hubs" type="text/handlebars">
        {{#fields}}
        <div class="hub_data well" data-name="{{name}}" data-fdl="{{fdl}}" data-fdr="{{fdr}}" data-cfl="{{cfl}}" data-cfr="{{cfr}}" data-shd="{{shd}}">
            <strong>{{name}}</strong>
            <ul>
                <li>Left flange ø: {{fdl}} mm</li>
                <li>Right flange ø: {{fdr}} mm</li>
                <li>Centre to left flange: {{cfl}} mm</li>
                <li>Centre to right flange: {{cfr}} mm</li>
                <li>Spoke hole ø: {{shd}} mm</li>
            </ul>
        </div>
        {{/fields}}
    </script>

<script src="<?= JS ?>jquery.js"></script>
<script src="<?= JS ?>bootstrap.min.js"></script>
<script src="<?= JS ?>application.js"></script>
<script src="<?= JS ?>handlebars.js"></script>
    <!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
            typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,
            e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
        mixpanel.init("67ebb468606777c4ee29505332f58772");</script><!-- end Mixpanel -->
</head>

<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?= BASE_URL ?>"><?= TITLE ?></a>
			<div class="nav-collapse">
                <?/*
				<ul class="nav">
					<li><a href="<?= BASE_URL ?>page/add">Add</a></li>
					<li><a href="<?= BASE_URL ?>page/Update">Update</a></li>
					<li><a href="<?= BASE_URL ?>page/rims">Rims</a></li>
					<li><a href="<?= BASE_URL ?>page/hubs">Hubs</a></li>
					<li><a href="<?= BASE_URL ?>page/submit">Submit</a></li>

					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>

				</ul>*/?>
				<? if ( user::valid() ): ?>
					<p class="pull-right">Logged in as <a href="<?= BASE_URL ?>developer/profile"><?= user_name(); ?></a></p>
				<? endif; ?>		  
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<div class="container">