<?php
/**
 * IP Limitter設定
 *
 * @package ip_limitter.controllers
 */
?>
<script type="text/javascript">
$(window).load(function() {
	$("#IpLimitterConfigAllowedIp").focus();
});
</script>

<?php echo $bcForm->create('IpLimitterConfig', array('url' => array('action' => 'index'))) ?>
<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<tr>
		<th class="col-head"><?php echo $bcForm->label('IpLimitterConfig.allowed_ip', '許可するIPアドレス') ?></th>
		<td class="col-input">
			<small>* (アスタリスク)でグループ指定が行えます。カンマ区切りで複数指定できます。</small><br />
			<?php echo $bcForm->input('IpLimitterConfig.allowed_ip', array('type' => 'text', 'size' => 60, 'style' => 'width:98%')) ?>
			<?php echo $bcForm->error('IpLimitterConfig.allowed_ip') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head"><?php echo $bcForm->label('IpLimitterConfig.limit_folders', 'フォルダー指定') ?></th>
		<td class="col-input">
			<small>指定したフォルダのみに制限をかける事ができます。カンマ区切りで複数指定できます。</small><br />
			<?php echo $bcForm->input('IpLimitterConfig.limit_folders', array('type' => 'text', 'size' => 60, 'style' => 'width:98%')) ?>
			<?php echo $bcForm->error('IpLimitterConfig.limit_folders') ?>
		</td>
	</tr>
	<tr>
		<th class="col-head"><?php echo $bcForm->label('IpLimitterConfig.redirect_url', 'リダイレクト先URL') ?></th>
		<td class="col-input">
			<small>指定しない場合は、Not Found ページが表示されます。</small><br />
			<?php echo $bcForm->input('IpLimitterConfig.redirect_url', array('type' => 'text', 'size' => 60, 'style' => 'width:98%')) ?>
			<?php echo $bcForm->error('IpLimitterConfig.redirect_url') ?>
		</td>
	</tr>
</table>

<div class="submit">
	<?php echo $bcForm->submit('更　新', array('div' => false, 'class' => 'button')) ?>
</div>

<?php echo $bcForm->end() ?>