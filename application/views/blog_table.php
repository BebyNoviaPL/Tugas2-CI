  <?php $this->load->view('templates/header') ?>
  <main role="main" class="container"> 
    <a href="<?php echo base_url("index.php/Blog/add_view") ?>" class="btn btn-primary mb-3">Tambah Blog</a> 
    <table id="dt-basic" class="table table-striped table-bordered"> 
     <thead> 
       <tr> 
         <th>ID</th> 
         <th>Tanggal</th> 
         <th>Judul</th> 
         <th>content</th> 
         <th>image</th> 
         <th>Action</th> 
       </tr> 
     </thead> 
     <tbody> 
      <?php foreach ($records as $d) : ?> 
       <tr> 
         <td><?php echo $d['id'] ?></td> 
         <td><?php echo $d['date'] ?></td> 
         <td><?php echo $d['title'] ?></td> 
         <td><?php echo $d['content'] ?></td> 
         <td><?php echo $d['image_file'] ?></td> 
         <td>
          <a href="<?php echo base_url('index.php/Blog/byId/'.$d['id']) ?>">View Details</a> 
           <a class="btn btn-sm btn-success" href="<?php echo base_url('index.php/Blog/update_view/'.$d['id']) ?>">Update  </a> 
            <a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/Blog/delete_action/'.$d['id']) ?>">Delete </a></td> 
        </tr> 
      <?php endforeach; ?> 
    </tbody> 
  </table> 

</main> 
<script> 
  $(document).ready(function() { 
    $('#dt-basic').DataTable(); 
  } ); 
</script> 

</body> 
</html>