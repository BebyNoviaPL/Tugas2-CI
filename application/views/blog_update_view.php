    <main role="main" class="container">
      <div class="row"> 
      <div class="col"> 
        <?php echo  $error ?> 
        <?php echo  validation_errors() ?>
        <?php echo form_open_multipart('Blog/update_view/'.$records[0]['id']);?>
        <div class="form-group"> 
          <label for="id">Id</label> 
          <input type="text" class="form-control" id="id" name="id" value="<?php echo $records[0]['id'] ?>"> 
          <input type="hidden" name="old_id" value="<?php echo $records[0]['id']?>">
        </div> 
        <div class="form-group"> 
          <label for="author">Author</label> 
          <input type="text" class="form-control" id="author" name="author" value="<?php echo $records[0]['author'] ?>"> 
        </div> 
        <div class="form-group"> 
          <label for="date">Date</label> 
          <input type="date" class="form-control" id="date" name="date" value="<?php echo $records[0]['date'] ?>"> 
        </div> 
        <div class="form-group"> 
          <label for="title">Title</label> 
          <input type="text" class="form-control" id="title" name="title" value="<?php echo $records[0]['title'] ?>"> 
        </div> 
        <div class="form-group"> 
          <label for="content">Content</label> 
          <input type="text" class="form-control" id="content" name="content" value="<?php echo $records[0]['content'] ?>"> 
        </div>
        <img src="<?php echo base_url(); ?>/uploads/<?php echo $records[0]['image_file'] ?>" alt="File Tidak Ada" height="100px" width="100px">
        <div class="form-group"> 
          <label for="image_file">Image</label> 
          <input type = "file" name = "image_file" size = "20" />  
        </div> 
        <input type="submit" name="update" value="Update" class="btn btn-success"> 
      </form> 
      </div> 
  </div>
    </main>

  <?php $this->load->view('templates/footer') ?>

</body>
</html>

