<div class="row">
    <div class="col-md-10">
        <div>
            <h1 id="welcome">Co-Shared Tasks <?php if (isset($task_count)) echo ('- Search Results, Found '. $task_count .' Tasks')?></h1>
            <p class="welcome-warning">Co-Shared Tasks is a vulnerable application created to practice secure development standards for CodeIgniter v2.X.</p>
            
            
            <?php
                // Show warning if the assets URL didn't set correctly
                if ( ! preg_match('/^http/', assets_url())):
            ?>
                <div class="alert alert-warning">
                    Please follow the guide
                    <a class="alert-link" href="https://github.com/anvoz/CodeIgniter-Skeleton#setup" target="_blank">here</a>
                    to setup your <code>assets_url</code>. You should use absolute path, including the protocol.
                </div>
            <?php
                endif;
            ?>
        </div>
        <?php foreach ($coshare_data as $task): ?>
            <div class="row">
				<div class="col-md-8">
					<div class="panel panel-default panel-google-plus">
						<?php if ($this->ion_auth->is_admin()): ?>
						<div class="dropdown">
							<span class="dropdown-toggle" type="button" data-toggle="dropdown">
								<span class="glyphicon glyphicon-chevron-down"></span>
							</span>
							<ul class="dropdown-menu" role="menu">
								<li class="dropdown-header">Options</li>
								<li role="presentation"><?=anchor('/delete/'.$task['id'],'Delete Task')?></li>
							</ul>
						</div>
						<?php endif; ?>
						
						<!-- Future Hashtag Implementation -->
						<!--
						<div class="panel-google-plus-tags">
							<ul>
								<li>#Millennials</li>
								<li>#Generation</li>
							</ul>
						</div>
						-->
						
						<div class="panel-heading">
							<img class="img-circle pull-left" src="http://www.gravatar.com/avatar/<?=md5(strtolower($task['email']))?>?&size=80" alt="Image of <?=$task['username']?>"/>
							<h3><?=$task['username']?></h3>
							<h5><span>Shared publicly</span> - <span><?=$task['created']?></span> </h5>
						</div>
						<div class="panel-body">
							<p><?=$task['text']?></p>
						</div>
						<!-- Future Comment Implementation -->
						<!--
						<div class="panel-footer">
							<button type="button" class="btn btn-default">+1</button>
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-share-alt"></span>
							</button>
							<div class="input-placeholder">Add a comment...</div>
						</div>
						<div class="panel-google-plus-comment">
							<img class="img-circle pull-left" src="http://www.gravatar.com/avatar/<?=md5(strtolower($task['email']))?>?&size=80" alt="Image of <?=$task['username']?>"/>
							<div class="panel-google-plus-textarea">
								<textarea rows="4"></textarea>
								<button type="submit" class="btn btn-success disabled">Post comment</button>
								<button type="reset" class="btn btn-default">Cancel</button>
							</div>
							<div class="clearfix"></div>
						</div>
						-->
					</div>
				</div>
			</div>
        <?php endforeach; ?>

        <!--
        <p>
         Page rendered in <strong>{elapsed_time}</strong> seconds.
         <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </p>-->
	</div>
 </div>
