<?php 

if ($this->ion_auth->logged_in()) {
	$user = $this->ion_auth->user()->row(); 
	$fullname = $user->username; 
}
?>

<header class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo site_url(); ?>" class="navbar-brand">CoShareTask</a>
        </div>
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('mylist'); ?>"><span class="glyphicon glyphicon-list"></span> My Task List</a></li>
                <li><a href="<?php echo site_url('todo'); ?>"><span class="glyphicon glyphicon-plus"></span> New Task</a></li>
            </ul>
             <div class="col-sm-3 col-md-3">
				<form class="navbar-form" method="POST" role="search" action="<?=site_url('/search')?>">
				<div class="input-group">
					
					<input type="text" class="form-control" placeholder="Search" name="q">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
				</form>
			</div>
            <ul class="nav navbar-nav navbar-right">
            <?php if ( !$this->ion_auth->logged_in()): ?>
                <li>
                    <a href="<?php echo site_url('auth/create_user'); ?>">
                        Sign Up
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('auth/login'); ?>"
                        rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/login'); ?>"
                    >
                        Login
                    </a>
                </li>
            <?php else: ?>
            <?php if($this->ion_auth->is_admin()): ?>
					<?php echo Modules::run('contact/_pagelet_contact'); ?>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users &amp; Groups <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?=anchor('auth', '<span class="glyphicon glyphicon-cog"></span> Manage Users')?></li>
							<li class="divider"></li>
							<li><?=anchor('auth/create_user', '<span class="glyphicon glyphicon-user"></span> New User')?></li>
							<li><?=anchor('auth/create_group', '<span class="glyphicon glyphicon-open"></span> New Group')?></li>
							 
						</ul>
					</li>
				<?php endif; ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-user"></span> <?=$fullname?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
						<li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <strong><?=$fullname; ?></strong>
                                        <p class="text-muted small"><?=$user->email; ?></p>
                                        <p class="text-left">
                                            <a href="profile" class="btn btn-primary btn-block btn-sm">My Profile</a>
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <?=anchor('auth/logout', 'Logout','class="btn btn-danger btn-block"')?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
					</ul>
				</li>
                </li>
            <?php endif; ?>
        </ul>
        </nav>
    </div>
</header>
