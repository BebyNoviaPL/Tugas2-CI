
  
       <h1 class="text-center"><?php echo $records[0]['title'] ?></h1>
   <h6 class="text-muted">Tanggal : <?php echo  $records[0]['date']  ?></h6>
   <div class="row">
          <div class="col-2"> </div>
          <div class="col-8"> 
    <img src="<?php echo  base_url() ?>uploads/<?php echo $records[0]['image_file']  ?>" alt=" " class="">
          </div>
          <div class="col-2"> </div>
          <p><?php echo $records[0]['content'] ?></p>
        </div>
  
  <?php $this->load->view('templates/footer') ?>