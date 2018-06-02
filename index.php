<?php
header("Content-type: text/javascript; charset=utf-8");
if (empty($_GET['id']) || empty($_GET['type']))
	exit;

$callback = empty($_GET['callback'])?null:$_GET['callback'];
$id = $_GET['id'];
$type = $_GET['type'];

include 'Meting.php';
$api = new Meting('netease');
$api->format(true);

$r = '';

switch ($type) {
	case 'list':
		$r = $api->playlist($id);
		break;
	case 'song':
		$r = $api->url($id);
		break;
	case 'lyric':
		$r = $api->lyric($id);
		break;
}

if ($callback)
	echo "$callback($r);";
else
	echo $r;