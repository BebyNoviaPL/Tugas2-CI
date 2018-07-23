<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>

<main role="main" class="container" style="margin-top: 5rem;">
  <h1>Category</h1>
    <a href="<?php echo base_url('index.php/admin/Category/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-bordered" id="example">
       <thead>
         <th>#</th>
         <th>Name</th>
         <th>Description</th>
         <th>Action</th>
       </thead>
       <tbody>
         <?php foreach ($getData as $key => $value): ?>
           <tr>
              <td><?php echo $key+1 ?></td>
              <td><?php echo $value['cat_name'] ?></td>
              <td><?php echo $value['cat_description'] ?></td>
              <td> <a href="<?php echo base_url('index.php/admin/Category/update/'.$value['cat_id']) ?>" class="btn btn-sm btn-success">Update</a>
                  <a href="<?php echo base_url('index.php/admin/Category/delete/'.$value['cat_id']) ?>" class="btn btn-sm btn-danger">Delete</a>
              </td>
           </tr>
         <?php endforeach ?>
       </tbody>
     </table>

    </main>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<?php $this->load->view('admin/footer') ?>