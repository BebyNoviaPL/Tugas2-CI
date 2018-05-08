<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8"> 
 <title>bbb</title> 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/> 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 

</head> 
<body> 
  <nav class="navbar navbar-expand-md navbar-dark bg-warning mb-4"> 
    <a class="navbar-brand" href="#">Top navbar</a> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> 
      <span class="navbar-toggler-icon"></span> 
    </button> 
    <div class="collapse navbar-collapse" id="navbarCollapse"> 
      <ul class="navbar-nav mr-auto"> 
        <li class="nav-item active"> 
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> 
        </li> 
        <li class="nav-item"> 
          <a class="nav-link" href="<?php echo base_url("index.php/Blog") ?>">Blog</a> 
        </li> 
        <li class="nav-item"> 
          <a class="nav-link disabled" href="#">Disabled</a> 
        </li> 
      </ul> 
    </div> 
  </nav> 
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
</body> 
</html>