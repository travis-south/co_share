<h1>Messages</h1>
<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    </h3>
                <span class="label label-info">
                    <?=$count ?></span>
            </div>
            <div class="panel-body">
                <ul class="list-group">
					<?php foreach ($items as $item) :?>
                    <li class="list-group-item">
						<div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img class="img-circle img-responsive" src="http://www.gravatar.com/avatar/<?=md5(strtolower($item['email']))?>?&size=80" alt="<?=$item['name']?>" />
                            </div>
                            <div class="col-xs-10 col-md-11">
								<div class="Message<?=$item['id']?>">Message #<?=$item['id']?>
                                    <div class="mic-info">
                                        By: <?=mailto($item['email'],$item['name'])?> on <?=$item['created']?>
                                    </div>
                                
                                <div class="comment-text">
                                    <?=$item['text']?>
                                </div>
                                <div class="action">
                                    <?=anchor('contact/delete/'.$item['id'],'<span class="glyphicon glyphicon-trash"></span>',array('class'=>'btn btn-danger btn-xs','title'=>'Delete message from '.$item['name']));?>
                                        
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>             
                </ul>
            </div>
        </div>
    </div>
</div>
