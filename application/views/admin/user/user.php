<?php $this->load->view('admin/header') ?>
<?php $this->load->view('admin/navbar') ?>

<main role="main">
<div class="container" style="margin-top: 5rem;">
  <h1>User</h1>
  <?php if($this->session->flashdata('user_loggedin')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>
    <a href="<?php echo base_url('index.php/admin/User/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>
    <div class="table-responsive">
    <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="example">
       <thead>
         <th>ID</th>
         <th>Name</th>
         <th>Zip Code</th>
         <th>Email</th>
         <th>Username</th>
         <th>Register date</th>
         <th>Action</th>
       </thead>
       <tbody>
         <?php foreach ($getData as $key => $value): ?>
           <tr>
              <td><?php echo $value['user_id'] ?></td>
              <td><?php echo $value['nama'] ?></td>
              <td><?php echo $value['kodepos'] ?></td>
              <td><?php echo $value['email'] ?></td>
              <td><?php echo $value['username'] ?></td>
              <td><?php echo $value['register_date'] ?></td>
              <td> <a href="<?php echo base_url('index.php/admin/User/update/'.$value['user_id']) ?>" class="btn btn-sm btn-success">Update</a>
                  <a href="<?php echo base_url('index.php/admin/User/delete/'.$value['user_id']) ?>" class="btn btn-sm btn-danger">Delete</a>
              </td>
           </tr>
         <?php endforeach ?>
       </tbody>
     </table>
  </div>
</div>
    </main>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<?php $this->load->view('admin/footer') ?>