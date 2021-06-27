<style>
  body{
    background-color:#255550;
  }
  .loginform{
    align-items:center;
    display:flex;
    flex-direction:column;
    background-color:#476E6A;
    width:30%;
    top:50%;
    margin:0 auto;
    height:400px;
    color:white;
    border-radius:20px;
    padding-left:10px;
    font-size:16px;
  }
  
</style>
<div class="loginform">
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

  </div>
<?php echo form_close();?>

