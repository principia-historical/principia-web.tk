<?php

$useragent = $_SERVER['HTTP_USER_AGENT'] ?? null;
$uri = $_SERVER['REQUEST_URI'] ?? null;

if (str_contains($useragent, 'Principia WebView')) {
	if ($uri == '/') {
		require('moved.html');
	} else {
		header("Location: https://principia-web.se".$uri, true, 301);
	}
} elseif (str_contains($useragent, "Principia")) {
	if (str_contains($uri, 'principia-version-code')) {
		die('34');
	} elseif (str_contains($uri, 'apZodIaL1/get_feature.php')) {
		echo readfile('fl.cache');
		die();
	}

	die('please just update');
} else {
	// Permanent redirect to new domain
	header("Location: https://principia-web.se".$uri, true, 301);
}
