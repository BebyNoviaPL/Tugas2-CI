<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
<main role="main" class="container" style="margin-top: 5rem;">
  <h1>Tambah Blog</h1>
  <div class="row">
  <div class="col">
      <?php echo  $error ?>
      <?php echo  validation_errors() ?>
      <?php echo form_open_multipart('');?>
<div class="form-group">
     <label for="author">Author</label>
     <input type="text" class="form-control" id="author" name="author" placeholder="Author">
   </div>
 <div class="form-group">
     <label for="date">Date</label>
     <input type="date" class="form-control" id="date" name="date" placeholder="Date">
   </div>
   <div class="form-group">
     <label for="title">Title</label>
     <input type="text" class="form-control" id="title" name="title" placeholder="Title">
   </div>
   <div class="form-group">
     <label for="content">Content</label>
     <input type="text" class="form-control" id="content" name="content" placeholder="Content">
   </div>
   <div class="form-group">
     <label for="image_file">Image</label>
     <input type = "file" name = "image_file" size = "20" /> 
   </div>
   <input type="submit" name="add" value="Tambah" class="btn btn-success">
           </form>
         </div>
       </div>
</main>					
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<?php $this->load->view('admin/footer') ?>