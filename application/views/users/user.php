<?php $this->load->view('templates/header') ?>
  <main role="main" class="container"> 
    <a href="<?php echo base_url("index.php/User") ?>" class="btn btn-primary mb-3">Tambah User Baru</a> 
    <table id="dt-basic" class="table table-striped table-bordered"> 
     <thead> 
       <tr> 
         <th>ID</th> 
         <th>Nama</th> 
         <th>Kode Pos</th> 
         <th>Email</th> 
         <th>Username</th> 
         <th>Level</th>
         <th>Action</th> 
       </tr> 
     </thead> 
     <tbody> 
      <?php foreach ($records as $d) : ?> 
       <tr> 
        <td><?php echo $d['user_id'] ?></td>
         <td><?php echo $d['nama'] ?></td> 
         <td><?php echo $d['kodepos'] ?></td> 
         <td><?php echo $d['email'] ?></td> 
         <td><?php echo $d['username'] ?></td> 
         <td><?php echo $d['level'] ?></td> 
         <td>
      <a class="btn btn-sm btn-success" href="<?php echo base_url('User/update/'.$d['user_id']) ?>">Update  </a> 
            <a class="btn btn-sm btn-danger" href="<?php echo base_url('User/delete_action/'.$d['user_id']) ?>">Delete </a></td> 
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
<?php $this->load->view('templates/footer') ?>