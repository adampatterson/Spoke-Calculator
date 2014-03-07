<? load::view('partials/header', array( 'title'=>'Calculate' )); ?>

<script type="text/javascript" charset="utf-8">

	$(document).ready(function(){

        $('#spokecalculator').submit( function() { return false });

        $('#hub_search').keyup(get_hubs);
        $('#rim_search').keyup(get_rims);

        $(".rim_data").live("click",function() {
            $name   = $(this).data('name');
            $erd    = $(this).data('erd');
            $osb    = $(this).data('osb');
            $size   = $(this).data('size');

            $("input[name='name']").val($name);
            $("input[name='erd']").val($erd);
            $("input[name='osb']").val($osb);

            $(this).find('ul').show();
            $(this).addClass('active');
            $(this).siblings().find('ul').hide();
            $(this).siblings().removeClass('active')
        });

        $(".hub_data").live("click",function() {

            $name   = $(this).data('name');
            $fdl    = $(this).data('fdl');
            $fdr    = $(this).data('fdr');
            $cfl    = $(this).data('cfl');
            $cfr    = $(this).data('cfr');
            $shd    = $(this).data('shd');

            $("input[name='name']").val($name);
            $("input[name='fdl']").val($fdl);
            $("input[name='fdr']").val($fdr);
            $("input[name='cfl']").val($cfl);
            $("input[name='cfr']").val($cfr);
            $("input[name='shd']").val($shd);

            $(this).find('ul').show();
            $(this).addClass('active');
            $(this).siblings().find('ul').hide();
            $(this).siblings().removeClass('active')
        });

        (function($) {
            var compiled = {};
            $.fn.handlebars = function(template, data) {
                if (template instanceof jQuery) {
                    template = $(template).html();
                }
                compiled[template] = Handlebars.compile(template);
                this.html(compiled[template](data));
            };
        })(jQuery);

        $("#calculate").click(function(){

            mixpanel.track("Calculation");

            $selected_erd       = $("input[name='erd']").val();
            $selected_fdl       = $("input[name='fdl']").val();
            $selected_fdr       = $("input[name='fdr']").val();
            $selected_cfl       = $("input[name='cfl']").val();
            $selected_cfr       = $("input[name='cfr']").val();
            $selected_spokes    = $("input[name='spokes']").val();
            $selected_cross     = $("input[name='cross']").val();
            $selected_size      = $("input[name='size']").val();
            $selected_shd       = $("input[name='shd']").val();

//        console.log('erd: ' + $selected_erd);
//        console.log('fdl: ' + $selected_fdl);
//        console.log('fdr: ' + $selected_fdr);
//        console.log('cfl: ' + $selected_cfl);
//        console.log('cfr: ' + $selected_cfr);
//        console.log('spokes: ' + $selected_spokes);
//        console.log('cross: ' + $selected_cross);
//        console.log('size: ' + $selected_size);
//        console.log('shd: ' + $selected_shd);

            $degree_rad = 360*Math.PI/180;

            $alpha = $degree_rad * ($selected_cross/($selected_spokes/2));

            $degrees = $alpha * (Math.PI / 180);

            $cosine = Math.cos($alpha);

            // Left side calculation
            $leftside = Math.sqrt(Math.pow( $selected_cfl, 2) + Math.pow( $selected_fdl, 2) + Math.pow($selected_erd, 2 ) - 2 * $selected_fdl * $selected_erd * $cosine - $selected_shd)/2;

            // Right side calculation
            $rightside = Math.sqrt(Math.pow( $selected_cfr, 2) + Math.pow( $selected_fdr, 2) + Math.pow($selected_erd, 2 ) - 2 * $selected_fdr * $selected_erd * $cosine - $selected_shd)/2;

            $('input[name="left"]').val($leftside.toFixed(2));
            $('input[name="right"]').val($rightside.toFixed(2));

            return false;
        });

    });

	function get_hubs() {
        $(".hub_results").html('');

        var hub_search = $('#hub_search').val();

        hub_search = hub_search.replace(/ /g, '+');

        var front_rear = $("input[name='frontrear']").val();

        if (front_rear == 'Front' || front_rear == 'front'){
            front_rear = 'front'
        } else if ( front_rear == 'Rear' || front_rear == 'rear' || front_rear == 'back' || front_rear == 'back') {
            front_rear = 'rear';
        }

		if(hub_search.length > 1)
		{
			var url_base = '<?= BASE_URL ?>api/hub/'+ front_rear +'/';
			var url_param = hub_search;

			var url = url_base+url_param;

			$.ajax({
                dataType: "json", url: url, cache: false,
				success: function(response){
					if(response != '')
					{
                        $.getJSON(url, function($hub_data){
                            $('.hub_results').handlebars($('#hubs'), $hub_data);
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

        var size = $("input[name='size']").val();

        if(rim_search.length > 1)
        {
            var url_base = '<?= BASE_URL ?>api/rim/';
            var url_param = rim_search;

            var url = url_base+url_param;

            $.ajax({
                dataType: "json", url: url, cache: false,
                success: function(response){
                    if(response != '')
                    {
                        $.getJSON(url, function($rim_data){
                            $('.rim_results').handlebars($('#rims'), $rim_data);
                        });
                    }
                }
            });

        }

    }

</script>

<div class="row content-section">

    <form method="post" action="<?#= url::page('index.php/calculate/process'); ?>" id="spokecalculator">
		<div class="span12">
			<p class="lead">The
				<input type='text' value="front" data-front-rear="front" name="frontrear" class="front_rear large"> wheel has
				<input type="text" class="" placeholder="32" value="32" name="spokes" required> spokes and is
				<input type="text" class="" placeholder="3" value="3" name="cross" required> cross.
            </p>
		</div>

        <div class="span12">

			<div class="row">

                <div class="span12">

                    <div class="row">
                        <div class="span6">

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
                                        <td>&nbsp;mm</td>
                                        <td colspan="2"><input name="shd" value="" type="hidden" class="span1"></td>
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
                                    </tr>
                                        <td colspan="5">&nbsp;</td>
                                    <tr>
                                        <td><h4>Spoke Length:</h4></td>
                                        <td><input name="left" value="" type="text" class="span1"></td>
                                        <td>&nbsp;mm&nbsp;&nbsp;</td>
                                        <td><input name="right" value="" type="text" class="span1"></td>
                                        <td>&nbsp;mm</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="form-actions">
                                    <button name="values" class="btn btn-primary" id="calculate">Calculate!</button>
                                </div>
                            </div>

                        </div>
                        <div class="span6">
                            <h3>Details</h3>
                            <p>Coming soon.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="span6">

                    <h3>Existing Measurements</h3>

                    <strong>Rim</strong>:
                    <input class="span6" id="rim_search"type="text" placeholder="">
                    <div class="rim_results"></div>

                </div>

                <div class="span6">

                    <h3>&nbsp;</h3>

                    <strong>Hub</strong>:
                    <input class="span6" id="hub_search" type="text" placeholder="">
                    <div class="hub_results"></div>

                </div>

			</div>

		</div>

	</form>
</div>
<? load::view('partials/footer'); ?>
