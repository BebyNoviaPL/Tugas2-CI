
	 
     <a href="<?php echo base_url("index.php/Blog/add_view") ?>" class="btn btn-primary">Tambah Blog</a>
    <main role="main" class="container">
<ul class="list-unstyled">
  <?php foreach ($records as $key => $value): ?>
   <li class="media">
   <img class="mr-3" src="<?php echo base_url() ?>uploads/<?php echo $value['image_file'] ?>" alt="Generic placeholder image" width="100px" height="150px">
    <div class="media-body">
    <h6 class="text-muted"><?php echo $value['date'] ?></h6>
      <h5 class="mt-0 mb-1"><?php echo $value['title'] ?></h5>
      <?php echo $value['content'] ?>
      <br>

    <a class="btn btn-sm btn-success" href="<?php echo base_url('index.php/Blog/update_view/'.$value['id']) ?>">Update </a>
      <a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/Blog/delete_action/'.$value['id']) ?>">Delete </a>
      <a href="<?php echo base_url('index.php/Blog/byId/'.$value['id']) ?>">View Details</a>
    </div>
  </li>
  <?php endforeach ?>
  
</ul>
<?php  
        if(isset($links)){ 
          echo $links; 
        } ?>
    </main>
   
      

