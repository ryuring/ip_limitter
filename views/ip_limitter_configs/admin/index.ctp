<h2><?php $baser->contentsTitle() ?></h2>

<?php echo $formEx->create('IpLimitterConfig', array('action' => 'index')) ?>
<table cellpadding="0" cellspacing="0" class="admin-row-table-01">
	<tr>
		<th class="col-head"><?php echo $formEx->label('IpLimitterConfig.allowed_ip', '許可するIPアドレス') ?></th>
		<td class="col-input">
			<small>* (アスタリスク)でグループ指定が行えます。カンマ区切りで複数指定できます。</small><br />
			<?php echo $formEx->input('IpLimitterConfig.allowed_ip', array('type' => 'text', 'size' => 60)) ?>
			<?php echo $formEx->error('IpLimitterConfig.allowed_ip') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head"><?php echo $formEx->label('IpLimitterConfig.limit_folders', 'フォルダー指定') ?></th>
		<td class="col-input">
			<small>指定したフォルダのみに制限をかける事ができます。カンマ区切りで複数指定できます。</small><br />
			<?php echo $formEx->input('IpLimitterConfig.limit_folders', array('type' => 'text', 'size' => 60)) ?>
			<?php echo $formEx->error('IpLimitterConfig.limit_folders') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head"><?php echo $formEx->label('IpLimitterConfig.redirect_url', 'リダイレクト先URL') ?></th>
		<td class="col-input">
			<small>指定しない場合は、Not Found ページが表示されます。</small><br />
			<?php echo $formEx->input('IpLimitterConfig.redirect_url', array('type' => 'text', 'size' => 60)) ?>
			<?php echo $formEx->error('IpLimitterConfig.redirect_url') ?>
		</td>
	</tr>
</table>

<div class="align-center">
	<?php echo $formEx->submit('更　新', array('div' => false, 'class' => 'btn-orange button')) ?>
</div>

<?php echo $formEx->end() ?>