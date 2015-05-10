<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html">	
		<title>Banner <?=$data->id?></title>
		
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        
	</head>
	<body>
		<div align="left">
            <span class="label label-primary">ID:</span>
                <?=$data->id?>
            </div>
            <div align="left">
                <span class="label label-primary">Name:</span>
                <?=$data->name?>
            </div>
            <div align="left">
                <span class="label label-primary">Visible:</span>
                <?=$data->visible?>
            </div>
            <div align="left">
                <span class="label label-primary">Body:</span>
            <?=$data->body;?>
            </div>
            <div align="left">
                <span class="label label-primary">Pages:</span>
                <?php foreach ($data->pages as $page): ?>
				<?=$page->url?>;
				<?php endforeach; ?>
            </div>
	</body>
</html>