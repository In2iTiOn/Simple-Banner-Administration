<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html">	
		<title>Banner Administration Main Page</title>
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        

	</head>
	<body>
		<table class="table table-striped table-bordered table-hover">
        	<thead>
		        <tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Visible</th>
		            <th>Body</th>
		            <th></th>
		            <th></th>
		            <th></th>
		            <th></th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($data as $value): ?>
		        <tr>
		            <td><a href="banner/show/<?=$value->id?>"><?=$value->id?></a></td>
		            <td><?=$value->name?></td>
		            <td><?=$value->visible?></td>
		            <td><?php print htmlentities($value->body);?></td>
		            <td><a href="banner/link/<?=$value->id?>">Link Page</a>
		            <td><a href="banner/unlink/<?=$value->id?>">Unlink Page</a>
		            <td><a href="banner/update/<?=$value->id?>">Edit</a>
		            <td><a href="banner/delete/<?=$value->id?>">Delete</a>
		        </tr>
		    <?php endforeach; ?>
		    </tbody>
		</table>
		<a href="banner/add"><div class="btn btn-default" type="button">Add</div></a>
		<br><br><a href ="page">Go to Pages</a>
	</body>
</html>