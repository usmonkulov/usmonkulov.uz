<?php foreach ($networks as $network): ?>
	<li>
 		<a href="<?=$network->url?>" target="_blank"><i class="fa fa-<?= $network->messenjer?>"></i></a>
 	</li>
<?php endforeach; ?>