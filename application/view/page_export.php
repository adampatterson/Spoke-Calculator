<? $this->load->view('template_header', array( 'title'=>'Export' )); ?>
<div class="column span-21 last content-section">
<strong>Edport</strong> <a href="<?=url::page("index.php/export/sql/hub"); ?>">Hubs</a>
<br/>
<strong>Export</strong> <a href="<?=url::page("index.php/export/sql/rim"); ?>">Rims</a>
</div>
<? $this->load->view('template_footer'); ?>
