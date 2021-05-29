<?php
include_once('resources/init.php');
if(isset($_POST['name'])){
    $name = trim($_POST['name']);
    
    if(empty($name)){
        $error = 'You must submit the category name';
    }
    else if(category_exists('name',$name) == true){ 
        $error = 'That category already exists';
    } else if(strlen($name)> 24){
        $error = 'The category name only be up to 24 characters only';
    }

    if(!isset($error)){
        $save = add_category($name);
          header("Location:add_category.php");
        die();
    }
}

?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>WEBMED</title>
	<meta name="description" content="">  
	<meta name="author" content="">

	<!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">  
	<link rel="stylesheet" href="css/media-queries.css"> 

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>

   <!-- Header
   ================================================== -->
   <header id="top">

   	<div class="row">

   		<div class="header-content twelve columns" >

		      <h1 id="logo-text"><a href="index.php" title="">WEBMED</a></h1>
				<p id="intro" >Your Health is our first priority!</p>
				

			</div>			

	   </div>
	   


	   <nav id="nav-wrap" style="z-index:9999;"> 
	   

	   	<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
		   <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
		   

	   	<div class="row">    		            

			   	<ul id="nav" class="nav">
			      
					<li><a href="index.php">Home</a>
					</li>
					<li><a class="fixed-navbar" href="medi.php">Medicines</a></li>
					<li>
						<a class="fixed-navbar" href="doctor.php">Primary Doctors</a>
						<ul>
						<li><a href="CardioDoctor.php">Cardiologists</a></li>
							<li><a href="DermaDoctor.php">Dermatologists</a></li>
							<li><a href="EndoDoctor.php">Endocrinologists</a>
							<li><a href="GastroDoctor.php">Gastroenterologists</a></li>
							<li><a href="GyneDoctor.php">Gynecologists</a></li>
							<li><a href="MediDoctor.php">Medicine doctors</a></li>
							<li><a href="NeuroDoctor.php">Neurologists</a></li>
							<li><a href="Pedidoctor.php">Peditricians</a></li>
						</ul>
					</li>
					<li><a class="fixed-navbar" href="blog.php">Blog</a></li>
					
<!-- 					<li><a class="fixed-navbar" href="#">Surgical specialists</a>
						<ul>
							<li><a href="#">Cardiothoracic surgery</a></li>
							<li><a href="#">General surgery</a></li>
							<li><a href="#">Neuro surgery</a></li>
							<li><a href="#">Paediatric surgery</a></li>
							<li><a href="#">plastic surgery</a></li>
							<li><a href="#">Urological surgery</a></li>
						</ul>
				  </li> -->

<!-- 				  <li><a class="fixed-navbar" href="#">Others</a>
				  	<ul>
				  		<li><a href="#">Blog</a></li>
				  		<li><a href="#">Research</a></li>
				  		<li><a href="#">Weekly health advice</a></li>
				  	</ul>
				  </li> -->
					<li><a class="fixed-navbar" href="#contact">Contact</a></li>
				
			   	</ul> <!-- end #nav -->			   	 

	   	</div> 

	   </nav> <!-- end #nav-wrap --> 	     

   </header> <!-- Header End -->


   <!-- Content
   ================================================== -->
   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">

	   		<article class="entry">
					<header class="entry-header">
	     <?php if(isset($error)){
            echo $error;
            } ?>
						<h2 class="entry-title">
							<h2>Add Category</h2>
						</h2> 				 
					
						<div class="entry-meta">
		<form action='' method='post'>
        <label for='name'>Name </label>
        <input type='text' name='name' />
        <input type='submit' value='Add Category' />
		</form>
						</div> 
					 
					</header> 
	
					
					<div class="entry-content">
						<p><!--insert here--></p>
					</div> 


				</article> <!-- end entry -->

   		</div> <!-- end main -->

   		<div id="sidebar" class="four columns">

   			<div class="widget widget_categories group">
   				<h3>Categories</h3> 
   				<?php
     foreach(get_categories() as $category){
     ?>
      <p><a href="manage_category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a>
     <?php  
     }
     ?>
				</div>

				<div class="widget widget_text group">
					<h3>Daily Quote of the Day</h3>
   				<p>What is success?</p><br/>
				<p>"Success is not final; failure is not fatal: It is the courage to continue that counts." - Winston S. Churchill</p>

   			</div>
   			
   		</div> <!-- end sidebar -->

   	</div> <!-- end row -->

   </div> <!-- end content-wrap -->
   

   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row"> 

         <p class="copyright">Copyright &copy; 2021, webMed</p>
        
      </div> <!-- End row -->

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-chevron-up"></i></a></div>

   </footer> <!-- End Footer-->


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>  
   <script src="js/main.js"></script>

</body>

</html>