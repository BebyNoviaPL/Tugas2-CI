<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>beby novia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	 <nav class="navbar navbar-expand-md navbar-dark bg-warning mb-4">
      <a class="navbar-brand" href="#">My Jobs'</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Contact<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Berita<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
      </div>
    </nav>
    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Beby Novia Putri Lovenida</h1>
        <p class="lead">1641720073/TI-2B</p>
        
      </div>
      <div class="row">
        <div class="col-6 ">

          <h5><B>BIODATA MENGGUNAKAN QUERY DENGAN ARRAY</B></h5>
           <table class="table">
              <?php foreach ($biodata_query_array as $key => $value): ?>
              
             <tr>
              <td><?php echo $value['id']?></td> 
           </tr>
             <tr>
              <td><?php echo $value['nama']?></td> 
           </tr>
            <tr>
              <td><?php echo $value['nim']?></td> 
           </tr>
            <tr>
              <td><?php echo $value['alamat']?></td> 
           </tr>

              <?php endforeach ?>
         </table>
       </div>
       <div class="col-6 ">
          <h5><B>BIODATA MENGGUNAKAN QUERY DENGAN OBJECT</B></h5>
            <table class="table">
              <?php foreach ($biodata_query_object as $key => $value): ?>
              
             <tr>
              <td><?php echo $value->id ?></td> 
           </tr>
             <tr>
              <td><?php echo $value->nama ?></td> 
           </tr>
            <tr>
              <td><?php echo $value->nim ?></td> 
           </tr>
            <tr>
              <td><?php echo $value->alamat ?></td> 
           </tr>

              <?php endforeach ?>
         </table>
          </div>
       <div class="col-6 ">
          <h5><B>BIODATA MENGGUNAKAN BUILDER DENGAN ARRAY</B></h5>
            <table class="table">
              <?php foreach ($biodata_builder_array as $key => $value): ?>
              
             <tr>
              <td><?php echo $value['id']?></td> 
           </tr>
             <tr>
              <td><?php echo $value['nama']?></td> 
           </tr>
            <tr>
              <td><?php echo $value['nim']?></td> 
           </tr>
            <tr>
              <td><?php echo $value['alamat']?></td> 
           </tr>

              <?php endforeach ?>
         </table>
            </div>
       <div class="col-6 ">
          <h5><B>BIODATA MENGGUNAKAN BUILDER DENGAN OBJECT</B></h5>
          <table class="table">
              <?php foreach ($biodata_builder_object as $key => $value): ?>
              
             <tr>
              <td><?php echo $value->id ?></td> 
           </tr>
             <tr>
              <td><?php echo $value->nama ?></td> 
           </tr>
            <tr>
              <td><?php echo $value->nim ?></td> 
           </tr>
            <tr>
              <td><?php echo $value->alamat ?></td> 
           </tr>

              <?php endforeach ?>
         </table>
          </div>
       <div class="col-6 ">


    </main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>