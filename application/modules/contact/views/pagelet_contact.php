<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<span class="glyphicon glyphicon-envelope"></span> Messages <span class="label label-info"><?=$count?></span>
</a>
	<ul class="dropdown-menu">
		<?php foreach ($items as $item) :?>
		<li><?=anchor('contact/'.$item['id'],'<span class="label label-warning">'.date('H:i', strtotime($item['created'])).'</span> '.$item['text'])?></li>
		<?php endforeach; ?>
		<li class="divider"></li>
		<li><?=anchor('contact/all','View All')?></li>
	</ul>
</li>

