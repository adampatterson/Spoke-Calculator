<? load::view('partials/header', array( 'title'=>'Calculate' )); ?>

<script type="text/javascript" charset="utf-8">

	$(document).ready(function(){

        $('#hub_search').keyup(get_hubs);
        $('#rim_search').keyup(get_rims);

        $(".rim_data").live("click",function() {

            var name = $(this).data('name');

            console.log("clicked on "+ name);
        });

        $(".hub_data").live("click",function() {

            var name = $(this).data('name');

            console.log("clicked on "+ name);
        });

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

                                $.each(data.slice(0,5), function(i, item){

                                    $html ='<div class="hub_data span3" data-name="' + item.name +'"><strong>' + item.name +'</strong>' +
                                            '<ul>' +
                                                '<li>Left flange ø: '+ item.fdl +' mm</li>' +
                                                '<li>Right flange ø: '+ item.fdr +' mm</li>' +
                                                '<li>Centre to left flange: '+ item.cfl +' mm</li>' +
                                                '<li>Centre to right flange: '+ item.cfr +' mm</li>' +
                                                '<li>Spoke hole ø: '+ item.spo +' mm</li>' +
                                            '</ul></div>';

                                    $(".hub_results").append($html);

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

                                $.each(data.slice(0,5), function(i, item){
                                   
 										$html ='<div class="rim_data span3" data-name="' + item.name +'"><strong>' + item.name +'</strong>' +
                                            '<ul>' +
                                                '<li>ERD: '+ item.erd +' mm</li>' +
                                                '<li>OSB: '+ item.osb +' mm</li>' +
                                                '<li>Size: '+ item.size +'</li>' +
                                            '</ul></div>';

                                    $(".rim_results").append($html);                                    

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
				<input type="text" class="" placeholder="32" value="32" name="spokes" required> spokes,
				<input type="text" class="" placeholder="3" value="3" name="cross" required> cross and is
				<input type="text" class="" placeholder="26" value='26' name="rsize" required> big.</p>
		</div>

        <div class="span12">

			<div class="row">

                <div class="span4 ">

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

                <div class="span4">

                    <h3>Existing</h3>

                    <strong>Rim</strong>:
                    <input class="span3" id="rim_search"type="text" placeholder="">
                    <div class="rim_results"></div>

                </div>

                <div class="span4">

                    <h3>&nbsp;</h3>

                    <strong>Hub</strong>:
                    <input class="span3" id="hub_search" type="text" placeholder="">
                    <div class="hub_results"></div>

                </div>

			</div>

            <div class="row">

                <div class="span8 offset4">
                    <div class="form-actions">
                        <button name="values" class="btn btn-primary">Load Values</button>
                    </div>
                </div>

            </div>

		</div>



	</form>
</div>
<? load::view('partials/footer'); ?>
