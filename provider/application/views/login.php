
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<?php 				    $this->load->model('Providertype_model');
			$all_providertypes = $this->Providertype_model->get_all_providertypes(); ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login">
  <div class="login-logo">
    <a href="<?php echo site_url(); ?>"><b>Refood <b></a>
  </div>
  <!-- /.login-logo -->
  
  <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
  <div class="login-box-body" style="background-color:#142A4F; border-radius: 50px;color:white">
              <div class="card-header">
                <h3 class="card-title" style="color:#879BAF;margin:0px 40%">Sign up</h3>
              </div>
			              <?php echo form_open('provider/register','enctype="multipart/form-data"'); ?>

              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="providerEmail" value="<?php echo $this->input->post('providerEmail'); ?>" class="form-control" id="providerEmail" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
							<input type="text" name="providerName" value="<?php echo $this->input->post('providerName'); ?>" class="form-control" id="providerName" />
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">Number</label>
							<input type="text" name="providerPhone" value="<?php echo $this->input->post('providerPhone'); ?>" class="form-control" id="providerPhone" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="providerDescription" value="<?php echo $this->input->post('providerDescription'); ?>" class="form-control" id="providerDescription" />
                  </div>
                  <div class="form-group">
                    <label for="gender">Type</label>
                    <select name="providerType" class="form-control">
								<option value="">select providertype</option>
								<?php 
								foreach($all_providertypes as $providertype)
								{
									$selected = ($providertype['providerTypeId'] == $this->input->post('providerType')) ? ' selected="selected"' : "";

									echo '<option value="'.$providertype['providerTypeId'].'" '.$selected.'>'.$providertype['providerTypeName'].'</option>';
								} 
								?>
							</select>          </div>
		
				   
				   <div class="form-group">
                    <label for="exampleInputPassword1">Logo</label>
							<input  type="file" class="custom-file-input" name="providerLogo" value="<?php echo $this->input->post('providerLogo'); ?>" class="form-control" id="providerLogo" />
                  </div>
				 
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary "style=" border-radius: 20px;background-color:#879BAF;margin: 5px 350px;color:#142A4F">Submit</button>
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
