<?php
/* SVN FILE: $Id$ */
/**
 * [IpLimitter] 設定ページ
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			ip_limitter.views
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
 ?>
<script type="text/javascript">
$(window).load(function() {
	$("#IpLimitterConfigAllowedIp").focus();
});
</script>

<?php echo $bcForm->create('IpLimitterConfig', array('action' => 'index')) ?>
<table cellpadding="0" cellspacing="0" class="form-table">
	<tr>
		<th><?php echo $bcForm->label('IpLimitterConfig.allowed_ip', '許可するIPアドレス') ?></th>
		<td>
			<small>* (アスタリスク)でグループ指定が行えます。カンマ区切りで複数指定できます。</small><br />
			<?php echo $bcForm->input('IpLimitterConfig.allowed_ip', array('type' => 'text', 'size' => 60)) ?>
			<?php echo $bcForm->error('IpLimitterConfig.allowed_ip') ?>
		</td>
	</tr>
	<tr>
		<th><?php echo $bcForm->label('IpLimitterConfig.limit_folders', 'フォルダー指定') ?></th>
		<td>
			<small>指定したフォルダのみに制限をかける事ができます。カンマ区切りで複数指定できます。</small><br />
			<?php echo $bcForm->input('IpLimitterConfig.limit_folders', array('type' => 'text', 'size' => 60)) ?>
			<?php echo $bcForm->error('IpLimitterConfig.limit_folders') ?>
		</td>
	</tr>
	<tr>
		<th><?php echo $bcForm->label('IpLimitterConfig.redirect_url', 'リダイレクト先URL') ?></th>
		<td>
			<small>指定しない場合は、Not Found ページが表示されます。</small><br />
			<?php echo $bcForm->input('IpLimitterConfig.redirect_url', array('type' => 'text', 'size' => 60)) ?>
			<?php echo $bcForm->error('IpLimitterConfig.redirect_url') ?>
		</td>
	</tr>
</table>

<div class="submit">
	<?php echo $bcForm->submit('更　新', array('div' => false, 'class' => 'button')) ?>
</div>
<?php echo $bcForm->end() ?>
