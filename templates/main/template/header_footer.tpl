
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WikiMusic</title>
    <!-- Bootstrap Core CSS -->
    <link href="templates/main/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/main/template/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/main/template/css/blog-post.css" rel="stylesheet">
	<link href="templates/main/template/css/stile.css" rel="stylesheet" type="text/css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
			
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <a class="navbar-brand" href="index.php"><b><big>WikiMusic</big></b></a>
				<a class="navbar-brand" href="index.php?controller=scheda&task=profilo"><i><b> {$username}</b></i></a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
            
                <ul class="nav navbar-nav">
       
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            {$main_content}            
		        {$cerca}
				{$login}
					
        </div>
        <hr>

        <!-- Footer -->
        <footer>
 
                	<div class="col-lg-2">
                   	 <p id="copy" ><i>Copyright &copy CasualWeb</i></p>
                	</div>
            </div>
            <!-- /.row -->
        </footer>

		
    </div>
					<script type="text/javascript" src="templates/main/template/js/script.js"></script>

</body>

</html>

