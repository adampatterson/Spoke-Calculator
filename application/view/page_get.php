<? $this->load->view('template_header', array( 'title'=>'Get Information' )); ?>
<div class="column span-10 append-1 last content-section">
<h2>Hubs</h2>
			<select>
			<? foreach ($groups as $group): ?>
			<option value="<?=$group['gid'];?>"><?=$group['groups'];?></option>
	 		<? endforeach; ?>
			</select>
<? foreach ($hubs as $hub): ?> 
	<div class="span-10">
		<div class="span-1"><input type="checkbox" value="<?= $hub["hubid"]; ?>" /></div>
		<div class="span-6"><?= $hub["hname"]; ?></div>
		<div class="span-6"><?= $hub["hmodel"]; ?></div>
		<!--<div class="span-1"><?= $hub["fdl"]; ?></div>
		<div class="span-1"><?= $hub["fdr"]; ?></div>
		<div class="span-1"><?= $hub["cfl"]; ?></div>
		<div class="span-1"><?= $hub["cfr"]; ?></div>-->
		<div class="span-1"><?= $hub["hspace"]; ?></div>
		<div class="span-2"><?= $hub["frontrear"]; ?></div>
		<!--<div class="span-1 last"><?= $hub["gid"]; ?></div>-->
	</div>
<?php endforeach; ?>
</div>

<div class="column span-10 last content-section">
<h2>Rims</h2>
			<select>
			<? foreach ($groups as $group): ?>
			<option value="<?=$group['gid'];?>"><?=$group['groups'];?></option>
	 		<? endforeach; ?>
			</select>
 <? foreach ($rims as $rim): ?> 
	<div class="span-10">
		<div class="span-1"><input type="checkbox" value="<?= $rim["rimid"]; ?>" /></div>
		<div class="span-6"><?= $rim["rname"]; ?></div>
		<div class="span-10"><?= $rim["rmodel"]; ?></div>
		<!--<div class="span-1"><?= $rim["erd"]; ?></div>
		<div class="span-1"><?= $rim["spokes"]; ?></div>-->
		<div class="span-1"><?= $rim["rsize"]; ?></div>

		<!--<div class="span-1 last"><?= $rim["gid"]; ?></div>-->

		</div>
	<?php endforeach; ?>
</div>
<?php 
if (isset($page)){
if ($page->next()): ?>
<a href="<?php echo url::page("index.php/page/hubs/{$page->next_page()}");  ?>
">Previous</a>
<?php endif; ?>
<?php if ($page->prev()): ?>
<a href="<?php echo url::page("index.php/page/hubs/{$page->prev_page()}");  ?>
">Next</a>
<?php endif; 
}
?>
<? $this->load->view('template_footer'); ?>
