
<!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		   <!-- Bootstrap -->
    		   <link href="/ci3/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    		   <style type="text/css">
    		   	body{
    		   		padding-top: 60px;
    		   	}
    		   	.form_control{
    		   		padding: 20px;
    		   	}
    		   </style>
		   <link href="/ci3/static/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">    		   
            </head>
            <body>
            		<?php
            			if($this->session->flashdata('message')){
            		?>
            		<script type="text/javascript">
            			alert('<?=$this->session->flashdata('message')?>')
            		</script>
            		<?php
            		}
            		?>
			<div class="navbar navbar navbar-fixed-top">
			<div class="navbar-inner">
			<div class="container">
		 
			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
		 
			<!-- Be sure to leave the brand out there if you want it shown -->
			<a class="brand" href="#">JavaScript</a>
		 
			<!-- Everything you want hidden at 940px or less, place within here -->
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<?php
						if ($this->session->userdata('is_login')) {
					?>
						<li><a href="/ci3/index.php/auth/logout">로그아웃</a></li>
					<?php
						}else{
					?>
						<li><a href="/ci3/index.php/auth/login">로그인</a></li>
						<li><a href="/ci3/index.php/auth/register">회원가입</a></li>
					<?php
						}
					?>
				</ul>
			</div>
		 
		    </div>
		  </div>
		</div>
            	    <div class="container">
  		    <div class="row-fluid">