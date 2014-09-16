<h1 class="page-header">New Task</h1>

<div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(); ?>
<div class="form-group">
				<?php echo form_label('Task:', 'task');?> <br />
				
					<div class="input-group">
						<input name="task" class="form-control" type="text" placeholder="What needs to be done?">
						<span class="input-group-addon">
							<input type="checkbox" name="private"> Private
						</span>
					</div>
			</div>

           <!--
           <div class="form-group">
            <?php echo form_label('Attachment:', 'files');?> <br />   
                    <?php if ( ! empty($pagelet_upload_control)): ?>
                        <?php echo $pagelet_upload_control; ?>
                    <?php else: ?>
                        Install the <a href="<?php echo site_url('addons#jquery-file-upload'); ?>" target="_blank">jQuery file upload add-on</a>
                        to show an upload control here.
                    <?php endif; ?>
               
           </div>-->
          

          
    
    <p><br/><?php echo bs_form_submit('submit', 'Submit');?></p>

<?php echo form_close();?>
