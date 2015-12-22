<?php
if ( ! headers_sent()) {
	header('HTTP/1.1 503 Service Unavailable');
	header('Retry-After: 300'); // 5 minutes in seconds
}
if ( ! $ob = ob_get_level() && ob_get_length()) {
	print('
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="robots" content="noindex">
			<title>Site is temporarily down for maintenance</title>
			<link rel="stylesheet" type="text/css" href="/styles/index.css?version=' . time() . '">
		</head>
		<body class="jumbotron container bg-faded">
	');
} ?>
	<blockquote class="blockquote">
		<h1>We're Sorry</h1>
		<p class="lead">
			The site is temporarily down for maintenance. Please try again in a few minutes.
		</p>
		<footer class="blockquote-footer">
			<code>503</code>
		</footer>
	</blockquote>
<?php
if ( ! $ob) {
	print('
		</body>
		</html>
	');
}
exit;
