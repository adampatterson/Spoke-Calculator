<? $this->load->view('template_header', array( 'title'=>'Hubs' )); ?>
<div class="column span-21 last content-section">
<h2>Hubs</h2>
			<select>
			<? foreach ($groups as $group): ?>
			<option value="<?=$group['gid'];?>"><?=$group['groups'];?></option>
	 		<? endforeach; ?>
			</select>
<? foreach ($hubs as $hub): ?> 
	<div class="span-21 last">
		<div class="span-1"><input type="checkbox" value="<?= $hub["hubid"]; ?>" /></div>
		<div class="span-4"><?= $hub["hname"]; ?></div>
		<div class="span-5"><?= $hub["hmodel"]; ?></div>
		<div class="span-1"><?= $hub["fdl"]; ?></div>
		<div class="span-1"> <?= $hub["fdr"]; ?></div>
		<div class="span-1"><?= $hub["cfl"]; ?></div>
		<div class="span-1"><?= $hub["cfr"]; ?></div>
		<div class="span-1"><?= $hub["hspace"]; ?></div>
		<div class="span-2"><?= $hub["frontrear"]; ?></div>
		<div class="span-1"><?= $hub["gid"]; ?></div>
		<div class="span-3 last"><a href="<?php echo url::page("index.php/admin/update_hub/{$hub['hubid']}"); ?>" >Edit</a> <a href="<?php echo url::page("index.php/admin/delete_hub/{$hub['hubid']}"); ?>" class="red">Delete</a></div>
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