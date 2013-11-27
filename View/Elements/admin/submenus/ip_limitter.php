<?php
/**
 * [ADMIN] IP Limitter プラグイン 共通メニュー
 *
 * @package			ip_limitter.views
 */
?>
<tr>
	<th>IPリミッター管理メニュー</th>
	<td>
		<ul>
			<li><?php $this->BcBaser->link('IPリミッター設定',array('controller' => 'ip_limitter_configs', 'action'=>'index')) ?></li>
		</ul>
	</td>
</tr>
