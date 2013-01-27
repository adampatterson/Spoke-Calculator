<? load::view('partials/header', array( 'title'=>'Calculate' )); ?>

<script type="text/javascript" charset="utf-8">

	$(document).ready(function(){
        $('#hub_search').keyup(get_hubs);
        $('#rim_search').keyup(get_rims);

	});

	function get_hubs() {
        $(".hub_results").html('');

        var hub_search = $('#hub_search').val();

        hub_search = hub_search.replace(/ /g, '+');

        var front_rear = $("input[name='frontrear']:checked").val();

		if(hub_search.length > 3)
		{
			var url_base = '<?= BASE_URL ?>api/hub/'+ front_rear +'/';
			var url_param = hub_search;

			var url = url_base+url_param;

			//console.log(url);

			$.ajax({
                dataType: "json",
                url: url,
				cache: false,
				success: function(response){
					if(response != '')
					{
                        //console.log(response);

                        $.getJSON(url,
                            function(data){

                                $.each(data.slice(0,10), function(i, item){
                                    $(".hub_results").append('<li>' + item.name +' '+ item.model + '</li>');
                                });
                            });
					}
				}
			});

		}
	}

    function get_rims() {
        $(".rim_results").html('');

        var rim_search = $('#rim_search').val();

        rim_search = rim_search.replace(/ /g, '+');

        var size = $("input[name='rsize']").val();

        if(rim_search.length > 3)
        {
            var url_base = '<?= BASE_URL ?>api/rim/'+ size +'/';
            var url_param = rim_search;

            var url = url_base+url_param;

            //console.log(url);

            $.ajax({
                dataType: "json",
                url: url,
                cache: false,
                success: function(response){
                    if(response != '')
                    {
                        //console.log(response);

                        $.getJSON(url,
                            function(data){

                                $.each(data.slice(0,10), function(i, item){
                                    $(".rim_results").append('<li>' + item.name +' '+ item.model + '</li>');
                                });
                            });
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
				<input type='radio' value="front" data-front-rear="front" name="frontrear" checked class="front_rear">Front <input type='radio' value="rear" data-front-rear="rear" name="frontrear" class="front_rear">Rear wheel has
				<input type="text" class="" placeholder="32" name="spokes" required> spokes,
				<input type="text" class="" placeholder="3" name="cross" required> cross and is
				<input type="text" class="" placeholder="26" value='26' name="rsize" required> big.</p>
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
