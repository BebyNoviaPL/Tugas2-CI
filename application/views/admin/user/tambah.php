<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>

<main role="main" class="container" style="margin-top: 5rem;">
  <h1>Tambah User</h1>
  <?php echo form_open( '', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
      <?php echo validation_errors(); ?>
      <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama') ?>">
          <div class="invalid-feedback">Isi judul dulu gan</div>
      </div>

      <div class="form-group">
        <label>Kodepos</label>
        <input type="text" class="form-control" name="kodepos" placeholder="Kodepos" value="<?php echo set_value('kodepos') ?>">
        <div class="invalid-feedback">Isi judul dulu gan</div>
      </div>

      <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email') ?>" required>
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
    <button id="submitBtn" type="submit" class="btn btn-primary">Save</button>
</main>                             
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<?php $this->load->view('admin/footer') ?>