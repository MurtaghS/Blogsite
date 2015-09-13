<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nostalgic Blogging</title>
    <meta name="description" content="Blogging with Paper">
    <meta name="author" content="Sean Murtagh">
    
    <!--Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="scripts/html5shiv-printshiv.js"></script>
    <![endif]-->

    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src = "js/script.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bloggy.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="wrapper">
		<header>
			<p id="newentry">Write New Blog Post</p>
			<form id="entryform" class="hidden">
				<textarea autofocus placeholder="Diary Entry" id="entrybox" cols="90" rows="4"></textarea>
				<input type="button" value="Add Entry" id="submitbox" class="hidden"  />
			</form>
		</header>
		<div id="main">
			<div id="top-of-page">
				
			</div>
			<ul id="blog-posts-list">
			<?php
				require_once 'php/database.php';
			?>
			</ul>
			<div id="bottom-of-page">
				
			</div>
		</div>
	</div>
</body>
</html>