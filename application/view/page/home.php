<? load::view('partials/header', array( 'title'=>'Calculate' )); ?>
<div class="column span-21 last content-section">
    <form method="post" action="<?php echo url::page('index.php/calculate/process'); ?>" id="spokecalculator">
        <div class="span-10">
            <h2>Rim Measurements</h2>
			<select>
			<? foreach ($groups as $group): ?>
			<option value="<?=$group['gid'];?>"><?=$group['groups'];?></option>
	 		<? endforeach; ?>
			</select>
			
            <dl>
                <dt>
                    Name
                </dt>
                <dd>
                    <input type="text" name="rname" id="rname" tabindex="1" />
                </dd>
                <dt>
                    Model
                </dt>
                <dd>
                    <input type="text" name="rmodel" id="rmodel" value="" tabindex="2" />
                </dd>
                <dt>
                    ERD <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="erd" id="erd" value="" tabindex="3" />
                </dd>
                <dt>
                    Rim Size
                </dt>
                <dd>
                    <input type="text" name="rsize" id="rsize" value="" tabindex="3" />
                </dd>
                <dt>
                    Spoke Holes <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="spokes" id="spokes" value='32' tabindex="4" />
                </dd>
                <dt>
                    Spoke Cross <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="cross" id="cross" value='3' tabindex="5" />
                </dd>
            </dl>
        </div>
        <div class="span-10 prepend-1 last">
            <h2>Hub Measurements</h2>
			<select>
			<? foreach ($groups as $group): ?>
			<option value="<?=$group['gid'];?>"><?=$group['groups'];?></option>
	 		<? endforeach; ?>
			</select>
			
            <dl>
                <dt>
                    Name
                </dt>
                <dd>
                    <input type="text" name="hname" id="hname" value="" tabindex="7" />
                </dd>
                <dt>
                    Model
                </dt>
                <dd>
                    <input type="text" name="hmodel" id="hmodel" value="" tabindex="8" />
                </dd>
                <dt>
                    Front or Rear
                </dt>
                <dd>
                    <input type="radio" name="frontrear" tabindex="9" value="front">Front
                    <br>
                    <input type="radio" name="frontrear" tabindex="10" value="rear">Rear
                </dd>
                <dt>
                    Axel Spacing
                </dt>
                <dd>
                    <input type="text" name="hspace" id="hspace" value="" tabindex="11" />
                </dd>
                <dt>
                    Left FD <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="fdl" id="fdl" value="" tabindex="12" />
                </dd>
                <dt>
                    Right FD <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="fdr" id="fdr" value="" tabindex="13" />
                </dd>
                <dt>
                    Left CF <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="cfl" id="cfl" value='' tabindex="14" />
                </dd>
                <dt>
                    Right CF <span class="red">*</span>
                </dt>
                <dd>
                    <input type="text" name="cfr" id="cfr" value='' tabindex="15" />
                </dd>
            </dl>
        </div>
        <div class="barsubmit">
            <input type="submit" name="Calculate" value="Calculate" class="button" tabindex="16" />
        </div>
    </form>
</div>
<? load::view('partials/footer'); ?>
