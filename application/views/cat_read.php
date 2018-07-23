
    <main role="main" class="container">
      <a href="<?php echo base_url('index.php/category/create') ?>" class="btn btn-primary mb-3">Tambah</a>
      <table class="table table-bordered">
       <thead>
         <th>No</th>
         <th>Name</th>
         <th>Description</th>
         <th>Action</th>
       </thead>
       <tbody>
         <?php foreach ($cat_read as $key => $value): ?>
           <tr>
              <td><?php echo $key+1 ?></td>
              <td><?php echo $value['cat_name'] ?></td>
              <td><?php echo $value['cat_description'] ?></td>
              <td> <a href="<?php echo base_url('index.php/category/update/'.$value['cat_id']) ?>" class="btn btn-sm btn-success">Ubah</a>
                  <a href="<?php echo base_url('index.php/category/delete/'.$value['cat_id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
              </td>
           </tr>
         <?php endforeach ?>
       </tbody>
     </table>

    </main>
  <?php $this->load->view('templates/footer') ?>
