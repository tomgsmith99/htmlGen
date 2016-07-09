<?php


function getScripts() {

	$scriptsDir = $_SERVER['DOCUMENT_ROOT'] . "/" . HOME . "/scripts/";

	$files = scandir($scriptsDir);

	foreach ($files as $file) {
		if (substr($file, -3) == ".js") {
			$scripts[] = $file;
		}
	}

	return $scripts;

}