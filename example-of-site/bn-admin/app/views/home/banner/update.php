<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html">	
		<title>Update banner</title>
		
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        
	</head>
	<body>
		<form method="POST" action="">
		     <label for="name" class="label label-primary">Name:</label><br/>                    
		     <input type="text" name="name" value="<?=$data->name?>"/>
		     <br/>          
		     <label for="width" class="label label-primary">Visible:</label><br/>                   
		     <input type="text" name="visible" value="<?=$data->visible?>"/>
		     <br/>
		     <label for="height" class="label label-primary">Body:</label><br/>                    
		     <textarea name="body" rows="5" cols="70"><?=$data->body?></textarea>
		     <br/><br/>
		     <input type="submit" class = "btn btn-success" value="Submit" />
		</form>
	</body>
</html>