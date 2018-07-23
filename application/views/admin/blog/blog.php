<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>
  <main role="main" class="container" style="margin-top: 5rem;">
    <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>
    <h1>Blog</h1>
    <a href="<?php echo base_url("index.php/admin/Blog/tambah") ?>" class="btn btn-primary mb-3">Tambah Blog</a>
   <table class="table table-striped table-bordered" width="100%" id="example">
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
      <?php foreach ($getAll as $d) : ?>
       <tr>
         <td><?php echo $d['id'] ?></td>
         <td><?php echo $d['date'] ?></td>
         <td><?php echo $d['title'] ?></td>
         <td><?php echo $d['content'] ?></td>
         <td><?php echo $d['image_file'] ?></td>
         <td> <a class="btn btn-sm btn-success" href="<?php echo base_url('index.php/admin/Blog/update/'.$d['id']) ?>">Update  </a>
            <a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/admin/Blog/delete/'.$d['id']) ?>">Delete </a></td>
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
<?php $this->load->view('admin/footer') ?>