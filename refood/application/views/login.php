
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>Refood</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" />
          <!-- /.login-logo -->
    <!-- Google Font -->
 <style type="text/css">
.hold-transition login-page {
background-color: red;
}} </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<?php 	$this->load->model('Gender_model');
			$all_genders = $this->Gender_model->get_all_genders();

			$this->load->model('City_model');
			$all_cities= $this->City_model->get_all_cities(); ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login">
  <div class="login-logo">
    <a href="<?php echo site_url(); ?>"><b>Refood <b></a>
  </div>


  <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
  <div class="login-box-body" style="background-color:#142A4F; border-radius: 50px;color:white">
              <div class="card-header">
                <h3 class="card-title" style="color:#879BAF;margin:0px 40%">Sign up</h3>
              </div>
			              <?php echo form_open('user/signup','enctype="multipart/form-data"'); ?>

              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email1" value="<?php echo $this->input->post('email1'); ?>" class="form-control" id="email1" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password1" value="<?php echo $this->input->post('password1'); ?>" class="form-control" id="password1" />
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">Firstname</label>
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">lastname</label>
							<input type="text" name="lastname" value="<?php echo $this->input->post('lastname'); ?>" class="form-control" id="lastname" />
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control">
								<option value="">select gender</option>
								<?php 
								foreach($all_genders as $gender)
								{
									$selected = ($gender['genderId'] == $this->input->post('gender')) ? ' selected="selected"' : "";

									echo '<option value="'.$gender['genderId'].'" '.$selected.'>'.$gender['gendeName'].'</option>';
								} 
								?>
							</select>                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">Birthday</label>
							<input type="date" name="datebirthday" value="<?php echo $this->input->post('datebirthday'); ?>" class="has-datepicker form-control" id="datebirthday" />
                  </div>
				  <div class="form-group">
                    <label for="exampleInputPassword1">City from</label>
                    </select>
                    <select name="cityFrom" class="form-control">
								<option value="">select city</option>
								<?php 
								foreach($all_cities as $city)
								{
									$selected = ($city['cityId'] == $this->input->post('cityFrom')) ? ' selected="selected"' : "";

									echo '<option value="'.$city['cityId'].'" '.$selected.'>'.$city['cityname'].'</option>';
								} 
								?>
							</select>              
               </div>
				   
               
						<div class="form-group">
            <label for="organisationLogo" class="control-label">Logo</label>
						<input type="file" name="organisationLogo"  class="form-control" id="organisationLogo" />
						</div>
				 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">City resident</label>
                    <select name="cityResident" class="form-control">
								<option value="">select city</option>
								<?php 
								foreach($all_cities as $city)
								{
									$selected = ($city['cityId'] == $this->input->post('cityResident')) ? ' selected="selected"' : "";

									echo '<option value="'.$city['cityId'].'" '.$selected.'>'.$city['cityname'].'</option>';
								} 
								?>
							</select>             </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary " style=" border-radius: 20px;background-color:#879BAF;margin: 5px 350px;color:#142A4F">Submit</button>
                </div>
              </form>
			   <?php echo form_close(); ?>
            </div>
              </div>

              
         <div class="col-md-6">  		
  <div class="login-box-body" style="background-color:#142A4F; border-radius: 50px;color:white">
              <div class="card-header">
                <h3 class="card-title" style="color:#879BAF;margin:0px 40%">Sign in</h3>
              </div>

    <form action="<?php echo base_url()."Login/connect"?>" method="post">

      <div class="form-group has-feedback">
      <label for="exampleInputPassword1">Login</label>
        <input type="text" class="form-control" name="email" placeholder="Nom d'utilisateur">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" placeholder="Mot de passe" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary " style=" border-radius: 20px;background-color:#879BAF;margin: 5px 350px;color:#142A4F">LogIn</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    </div>
    </div>
    </div>
    
    <section>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
     <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>

</body>
</html>
