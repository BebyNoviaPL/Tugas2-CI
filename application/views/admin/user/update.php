<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>

<main role="main" class="container" style="margin-top: 5rem;">
    <h1>Update User</h1>
    <?php echo validation_errors() ?>
     <?php echo form_open( 'admin/User/update/'.$update['user_id'], array('class' => 'needs-validation', 'novalidate' => '') ); ?>
    <div class="form-group">
    <label for="cat_name">Nama</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $update['nama'] ?>" required>
    <div class="invalid-feedback">You must fill this category name</div>
    </div>

    <div class="form-group">
    <label for="cat_name">Kodepos</label>
    <input type="text" class="form-control" name="kodepos" value="<?php echo $update['kodepos'] ?>" required>
    <div class="invalid-feedback">You must fill this category name</div>
    </div>

    <div class="form-group">
    <label for="cat_name">Email</label>
    <input type="text" class="form-control" name="email" value="<?php echo $update['email'] ?>" required>
    <div class="invalid-feedback">You must fill this category name</div>
    </div>

    <div class="form-group">
    <label for="cat_name">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $update['username'] ?>" required>
    <div class="invalid-feedback">You must fill this category name</div>
    </div>

    <div class="form-group">
    <label for="cat_name">Password</label>
    <input type="text" class="form-control" name="password" value="" required>
    <div class="invalid-feedback">You must fill this category name</div>
    </div>

    
    <button id="submitBtn" type="submit" class="btn btn-success">Update</button>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<?php $this->load->view('admin/footer') ?>