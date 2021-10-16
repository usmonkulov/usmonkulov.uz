<?php foreach ($informations as $information):?>
<li><a><i class="fa fa-phone"></i> <?=$information->phone?></a></li>
<li><a><i class="fa fa-envelope-o"></i> <?=$information->email?></a></li>
<li><a><i class="fa fa-map-marker"></i> <?=$information->address?></a></li>
<?php endforeach?>