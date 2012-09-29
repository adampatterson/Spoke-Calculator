<? load::view('partials/header', array( 'title'=>'Calculate' )); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('#hub_search').keyup(get_hubs);
	});

	function get_hubs() {	
		var hub_search = $('#hub_search').val();
		
		if(hub_search.length > 3)
		{
			var url_base = '<?= BASE_URL ?>api/hub/';
			var url_param = encodeURIComponent( hub_search );
			
			var url = url_base+url_param;
			
			console.log(url);
			
			jQuery.ajax({
				url: url,
				cache: false,
				success: function(response){
					if(response != '')
					{
						console.log(response);
					}
				}
			});
			
		}
	}
</script>

<div class="row content-section">
	<form method="post" action="<?= url::page('index.php/calculate/process'); ?>" id="spokecalculator">
		<div class="span12">
			<p class="lead">The
				<button class="btn" type="button">Front</button><button class="btn" type="button">Rear</button>wheel has
				<input type="text" class="" placeholder="32" name="spokes" required> spokes,
				<input type="text" class="" placeholder="3" name="cross" required> cross and is
				<input type="text" class="" placeholder="26" name="rsize" required> big.</p>
		</div>
		<div class="span12">
			<h3>Existing</h3>
			<div class="row">
				<div class="span1"><strong>Rim</strong>:</div>
				<div class="span4">
					<input class="span3" id="rim_search"type="text" placeholder="">
					<div class="rim_results"></div>
				</div>
				<div class="span1"><strong>Hub</strong>:</div>
				<div class="span4">
					<input class="span3" id="hub_search" type="text" placeholder="">
					<div class="hub_results"></div>
				</div>
			</div>
		</div>
		<div class="span12">
			<div class="form-actions">
				<button name="values" class="btn btn-primary">Load Values</button>
			</div>
		</div>
		<div class="span12">
			<h3>Measurements</h3>
			<table cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td></td>
						<td align="center"><div class="sc_label">left</div></td>
						<td></td>
						<td align="center"><div class="sc_label">right</div></td>
						<td></td>
					</tr>
					<tr>
						<td>Effective rim diameter <strong>(ERD)</strong>:&nbsp;</td>
						<td><input name="erd" value="" type="text" class="span1"></td>
						<td colspan="3">&nbsp;mm</td>
					</tr>
					<tr>
						<td>Flange diamiter <strong>(FD)</strong>:&nbsp;</td>
						<td><input name="fdl" value="" type="text" class="span1"></td>
						<td>&nbsp;mm&nbsp;&nbsp;</td>
						<td><input name="fdr" value="" type="text" class="span1"></td>
						<td>&nbsp;mm</td>
					</tr>
					<tr>
						<td>Center to Flange <strong>(CF)</strong>:&nbsp;</td>
						<td><input name="cfl" value="" type="text" class="span1"></td>
						<td>&nbsp;mm&nbsp;&nbsp;</td>
						<td><input name="cfr" value="" type="text" class="span1"></td>
						<td>&nbsp;mm</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="span12">
			<div class="form-actions">
				<input type="submit" name="Calculate" value="Calculate" class="btn btn-primary" tabindex="16" />
			</div>
		</div>
	</form>
</div>
<? load::view('partials/footer'); ?>
