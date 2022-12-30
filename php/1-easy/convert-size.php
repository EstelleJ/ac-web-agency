<?php

$unitsArray = [
		'B',
		'KB',
		'MB',
		'GB',
		'TB',
		'PB',
		'EB',
		'ZB',
		'YB',
		'HB',
];

function convertSize($fileSize, $precision = 2, $i = 0): string {
	global $unitsArray;

	if($fileSize > 1024 && $i < count($unitsArray) - 1) {

		$fileSize = $fileSize / 1024;

		return convertSize($fileSize, $precision, ++$i);
	} else {
		return round($fileSize, $precision) . ' ' . $unitsArray[$i];
	}
}