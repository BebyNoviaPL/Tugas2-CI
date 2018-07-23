<?php echo form_open('user/register', array('class' => 'needs-validation', 'novalidate' => '')); ?> 
<?php echo validation_errors(); ?>
<main role="main" class="container"> 
   <div class="form-group"> 
       <label>Nama Lengkap</label> 
       <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>"> 
   </div> 

   <div class="form-group"> 
       <label>Kodepos</label> 
       <input type="text" class="form-control" name="kodepos" placeholder="Kodepos" value="<?php echo set_value('kodepos') ?>"> 
   </div> 

   <div class="form-group"> 
       <label>Email</label> 
       <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email') ?>"> 
   </div> 

   <div class="form-group"> 
       <label>Username</label> 
       <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username') ?>"> 
   </div> 

   <div class="form-group"> 
       <label>Password</label> 
       <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>"> 
   </div> 

  <div class="form-group">
  <label>Konfirmasi Password</label>
 <input type="text" class="form-control" name="password2" placeholder="Konfirmasi Password" value="<?php echo set_value('password') ?>">
  </div>

   <div class="form-group">
       <label for="">Membership</label>
       <div class="form-check">
           <input class="form-check-input" type="radio" name="membership" id="goldmember" value="2" checked>
           <label class="form-check-label" for="goldmember">Gold</label>
       </div>
       <div class="form-check">
           <input class="form-check-input" type="radio" name="membership" id="silvermember" value="3">
           <label class="form-check-label" for="silvermember">Silver</label>
       </div>
   </div>
   <button type="submit" class="btn btn-primary btn-block">Daftar</button>
   </main> 
   <script> 
  $(document).ready(function() { 
    $('#dt-basic').DataTable(); 
  } ); 
</script> 
<?php echo form_close(); ?>
<?php $this->load->view('templates/footer'); ?>