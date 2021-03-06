<ul class="nav nav-list">
	<li class="nav-header">Manage</li>
	<li class="<? current_page('developer/dashboard'); ?>"><a href="<?= BASE_URL ?>developer/dashboard"><i class="icon-home <? icon('developer/dashboard'); ?>"></i> Dashboard</a></li>
	<li class="<? current_page('developer/themes'); ?>"><a href="<?= BASE_URL ?>developer/themes"><i class="icon-th <? icon('developer/themes'); ?>"></i> Themes</a></li>
	<li class="<? current_page('developer/plugins'); ?>"><a href="<?= BASE_URL ?>developer/plugins"><i class="icon-th-list <? icon('developer/plugins'); ?>"></i> Plugins</a></li>
	<li class="nav-header">My Account</li>
	<li class="<? current_page('developer/profile'); ?>"><a href="<?= BASE_URL ?>developer/profile"><i class="icon-heart <? icon('developer/profile'); ?>"></i> Profile</a></li>
	<li class="divider"></li>
	<li class="<? current_page('developer/logout'); ?>"><a href="<?= BASE_URL ?>logout"><i class="icon-off <? icon('developer/logout'); ?>"></i> Logout</a></li>
	<? if(user::is_type('owner')): ?>
	<li class="divider"></li>
	<li class="nav-header">System Admin</li>
	<li class="<? current_page('developer/core'); ?>"><a href="<?= BASE_URL ?>developer/core"><i class="icon-cog <? icon('developer/core'); ?>"></i> Manage</a></li>
	<? endif; ?>
</ul>