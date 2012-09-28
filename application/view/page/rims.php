<? load::view('partials/header', array( 'title'=>'Rims' )); ?>
<div class="column span-21 last content-section">
<h2>Rims</h2>
			<select>
			<? foreach ($groups as $group): ?>
			<option value="<?=$group['gid'];?>"><?=$group['groups'];?></option>
	 		<? endforeach; ?>
			</select>
 <? foreach ($rims as $rim): ?> 
 	<div class="span-21 last">
		<div class="span-1"><input type="checkbox" value="<?= $rim["rimid"]; ?>" /></div>
		<div class="span-6"><?= $rim["rname"]; ?></div>
		<div class="span-7"><?= $rim["rmodel"]; ?></div>
		<div class="span-1"><?= $rim["erd"]; ?></div>
		<div class="span-1"><?= $rim["spokes"]; ?></div>
		<div class="span-1"><?= $rim["rsize"]; ?></div>
		<div class="span-1 "><?= $rim["gid"]; ?></div>
		<div class="span-3 last"><a href="<?php echo url::page("index.php/admin/update_hub/{$rim['rimid']}"); ?>" >Edit</a> <a href="<?php echo url::page("index.php/admin/delete_hub/{$rim['rimid']}"); ?>" class="red">Delete</a></div>
		</div>
	<?php endforeach; ?>
</div>
<?php 
if (isset($page)){
if ($page->next()): ?>
<a href="<?php echo url::page("index.php/page/rims/{$page->next_page()}");  ?>
">Previous</a>
<?php endif; ?>
<?php if ($page->prev()): ?>
<a href="<?php echo url::page("index.php/page/rims/{$page->prev_page()}");  ?>
">Next</a>
<?php endif; 
}
?>
<? load::view('partials/footer'); ?>