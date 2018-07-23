!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Beby</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-warning text-dark mb-4">
      <a class="navbar-brand" href="#">Beby</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("index.php/Blog") ?>">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("index.php/Blog/datatable") ?>">Blog Datatable</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url("index.php/Category") ?>">Category</a>
          </li>
        </ul>
        <?php if(!$this->session->userdata('user_loggedin')) : ?>
          <div class="btn-group" role="group" aria-label="Data baru">
        <?php echo anchor('User/register', 'Sign Up', array('class' => 'btn btn-outline-light')); ?>
        <?php echo anchor('User/login', 'Login', array('class' => 'btn btn-outline-light')); ?>
        <?php echo anchor('User/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
          </div>
        <?php endif; ?>


        <?php if($this->session->userdata('user_loggedout')) : ?>
          <div class="btn-group" role="group" aria-label="Data baru">
        <?php echo anchor('User/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
          </div>
        <?php endif; ?>
      </div>
    </nav>

    <?php if($this->session->flashdata('user_registered')): ?>
         <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('login_failed')): ?>
         <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
       <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedout')): ?>
         <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
       <?php endif; ?>

    <?php if(!$this->session->userdata('logged_in')) : ?>

      <div class="btn-group" role="group" aria-label="Data baru">
       <?php echo anchor('user/register', 'Register', array('class' => 'btn btn-outline-light')); ?>
       <?php echo anchor('user/login', 'Login', array('class' => 'btn btn-outline-light')); ?>

      </div>

    <?php endif; ?>

    <?php if($this->session->userdata('logged_in')) : ?>
     <div class="btn-group" role="group" aria-label="Data baru">

       <?php echo anchor('blog/create', 'Artikel Baru', array('class' => 'btn btn-outline-light')); ?>
       <?php echo anchor('category/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?>
       <?php echo anchor('user/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
     </div>
    <?php endif; ?>
