<h1 class="page-header">Contact Us</h1>

<div <?php ( ! empty($message)) && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

    <p>
        <?php echo form_label('Name:', 'name');?>
        <?php echo bs_form_input($name);?>
    </p>
    
    <p>
        <?php echo form_label('Email:', 'email');?> 
        <?php echo bs_form_input($email);?>
    </p>
    
    <p>
        <?php echo form_label('Text:', 'text');?> 
        <?php echo bs_form_textarea($text);?>
    </p>
    
    <p><?php echo bs_form_submit('submit', 'Submit');?></p>

<?php echo form_close();?>

