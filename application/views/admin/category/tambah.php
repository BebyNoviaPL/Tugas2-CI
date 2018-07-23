<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>

  <main role="main" class="container" style="margin-top: 5rem;">
    <h1>Tambah Category</h1>
    <?php echo form_open( 'admin/category/tambah', array('class' => 'needs-validation', 'novalidate' => '') ); ?>

    <div class="form-group">
   <label for="cat_name">Nama Kategori</label>
   <input type="text" class="form-control" name="cat_name" value="<?php echo set_value('cat_name') ?>" required>
   <div class="invalid-feedback">Isi judul dulu gan</div>
    </div>

    <div class="form-group">
   <label for="text">Deskripsi</label>
   <input type="text" class="form-control" name="cat_description" value="<?php echo set_value('cat_description') ?>" required>
   <div class="invalid-feedback">Must fill the description</div>
    </div>
    <button id="submitBtn" type="submit" class="btn btn-primary">Save</button>

    </main>                             
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<?php $this->load->view('admin/footer') ?>