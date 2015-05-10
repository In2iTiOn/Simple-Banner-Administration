<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html">	
		<title>All Pages</title>
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        

	</head>
	<body>
		<table class="table table-striped table-bordered table-hover">
        	<thead>
		        <tr>
		            <th>ID</th>
		            <th>url</th>
		            <th></th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($data as $value): ?>
		        <tr>
		            <td><?=$value->id?></td>
		            <td><?=$value->url?></td>
		            <td><a href="page/delete/<?=$value->id?>">Delete</a>
		        </tr>
		    <?php endforeach; ?>
		    </tbody>
		</table>
		<a href="page/add"><div class="btn btn-default">Add</div></a>
	</body>
</html>