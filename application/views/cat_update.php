
    <main role="main" class="container">
     
      <?php echo validation_errors() ?> 
     <?php echo form_open( 'category/update/'.$cat_update['cat_id'], array('class' => 'needs-validation', 'novalidate' => '') ); ?> 
 <div class="form-group"> 
    <label for="cat_name">Nama Kategori</label> 
    <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_update['cat_name'] ?>" required> 
    <div class="invalid-feedback">Isi judul dulu gan</div> 
 </div> 

 <div class="form-group"> 
    <label for="text">Deskripsi</label> 
    <input type="text" class="form-control" name="cat_description" value="<?php echo $cat_update['cat_description'] ?>" required> 
    <div class="invalid-feedback">Isi deskripsinya dulu gan</div> 
 </div> 
 <button id="submitBtn" type="submit" class="btn btn-success">Ubah</button>
    </main>

  <?php $this->load->view('templates/footer') ?>
</body>
</html>