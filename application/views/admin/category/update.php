<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>

<main role="main" class="container" style="margin-top: 5rem;">
    <h1>Update Category</h1>
    <?php echo validation_errors() ?>
     <?php echo form_open( '', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
    <div class="form-group">
    <label for="cat_name">Nama Kategori</label>
    <input type="text" class="form-control" name="cat_name" value="<?php echo $update['cat_name'] ?>" required>
    <div class="invalid-feedback">You must fill this category name</div>
    </div>

    <div class="form-group">
    <label for="text">Deskripsi</label>
    <input type="text" class="form-control" name="cat_description" value="<?php echo $update['cat_description'] ?>" required>
    <div class="invalid-feedback">You must fill the description</div>
    </div>
    <button id="submitBtn" type="submit" class="btn btn-success">Update</button>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<?php $this->load->view('admin/footer') ?>