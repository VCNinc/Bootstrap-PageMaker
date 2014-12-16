<?php
function indent($src) {
	$src = str_replace("\n", "\n\t", $src);
	return "\t".$src;
}

function parser($srcs) {
	$me = "";
	foreach($srcs as $src) {
		$me .= "\n".indent($src);
	}
	return $me;
}

function PageMaker() {
	$me = "";
	$me .= '<!DOCTYPE html>'."\n";
	$me .= '<html lang="en">';
	$me .= parser(func_get_args());
	$me .= "\n".'</html>';
	echo $me;
}

function Head() {
	$me = "";
	$me .= '<head>';
	$me .= parser(func_get_args());
	$me .= "\n".'</head>';
	return $me;
}

function Body() {
	$me = "";
	$me .= '<body>';
	$me .= parser(func_get_args());
	$me .= "\n".'</body>';
	return $me;
}

function XCMetas() {
	$me = "";
	$me .= '<meta charset="utf=8">';
	$me .= "\n".'<meta http-equiv="X-UA-Compatible" content="IE=edge">';
	$me .= "\n".'<meta name="viewport" content="width=device-width, initial-scale=1">';
	$me .= "\n".'<!--[if lt IE 9]>';
	$me .= "\n\t".'<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	$me .= "\n\t".'<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	$me .= "\n".'<![endif]-->';
	return $me;
}

function BootCDN() {
	$me = "";
	$me .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">';
	$me .= "\n".'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">';
	return $me;
}

function BootLocal() {
	$me = "";
	foreach(func_get_args() as $key=>$arg) {
		if($key>0) {
			$me .= "\n";
		}
		$me .= '<link rel="stylesheet" href="'.$arg.'">';
	}
	return $me;
}

function Jumbotron() {
	$me = "";
	$me .= '<div class="jumbotron">';
	$me .= parser(func_get_args());
	$me .= "\n".'</div>';
	return $me;
}

function Contain() {
	$me = "";
	$me .= '<div class="container-fluid">';
	$me .= parser(func_get_args());
	$me .= "\n".'</div>';
	return $me;
}

function Button($text, $to = "#", $args = ["default"]) {
	$me = "";
	$me .= '<a class="btn';
	foreach($args as $arg) {
		$me .= " btn-".$arg;
	}
	$me .= '" href="'.$to.'">'.$text."</a>";
	return $me;
}

function Label($text, $args = ["default"]) {
	$me = "";
	$me .= '<span class="label';
	foreach($args as $arg) {
		$me .= " label-".$arg;
	}
	$me .= '">'.$text.'</span>';
	return $me;
}

function PageBreak() {
	$me = "";
	$me .= '<hr>';
	return $me;
}

function Paragraph() {
	$me = "";
	$me .= '<p>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</p>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</p>';
	}
	return $me;
}

function Title() {
	$me = "";
	$me .= '<h1>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</h1>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</h1>';
	}
	return $me;
}

function Subtitle() {
	$me = "";
	$me .= '<h2>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</h2>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</h2>';
	}
	return $me;
}

function Subtitle2() {
	$me = "";
	$me .= '<h3>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</h3>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</h3>';
	}
	return $me;
}

function Subtitle3() {
	$me = "";
	$me .= '<h4>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</h4>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</h4>';
	}
	return $me;
}

function Subtitle4() {
	$me = "";
	$me .= '<h5>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</h5>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</h5>';
	}
	return $me;
}

function Subtitle5() {
	$me = "";
	$me .= '<h6>';
	if(func_num_args() == 1) {
		$me .= func_get_arg(0);
		$me .= '</h6>';
	} else {
		$me .= parser(func_get_args());
		$me .= "\n".'</h6>';
	}
	return $me;
}

function Badge($text) {
	$me = "";
	$me .= '<span class="badge">';
	$me .= $text;
	$me .= '</span>';
	return $me;
}

function Tabulate() {
	$me = "";
	$me .= '<table class="table">';
	$me .= parser(func_get_args());
	$me .= "\n".'</table>';
	return $me;
}

function Row() {
	$me = "";
	$me .= '<tr>';
	foreach(func_get_args() as $arg) {
		$me .= "\n\t".'<td>'.$arg.'</td>';
	}
	$me .= "\n".'</tr>';
	return $me;
}

function RowH() {
	$me = "";
	$me .= '<tr>';
	foreach(func_get_args() as $arg) {
		$me .= "\n\t".'<th>'.$arg.'</th>';
	}
	$me .= "\n".'</tr>';
	return $me;
}

function Image($url, $style = ["thumbnail"], $width = "", $height = "") {
	$me = "";
	$me .= '<img src="';
	$me .= $url;
	$me .= '" class="img';
	foreach($style as $class) {
		$me .= ' img-'.$class;
	}
	$me .= '" width="' . $width . '" height="' . $height . '">';
	return $me;
}

function Columns() {
	$me = "";
	if(12%func_num_args() != 0) {
		throw new Exception("Split() Requires 1, 2, 3, 4, 6, or 12 arguements.", 1);
	} else {
		for($x = 0; $x < func_num_args(); $x++) {
			$q = 12/func_num_args();
			if($x != 0) {
				$me .= "\n";
			}
			$me .= '<div class="col-md-'.$q.'">';
			$me .= parser([func_get_arg($x)]);
			$me .= "\n".'</div>';
		}
	}
	$me = parser([$me]);
	$me = '<div class="row">'.$me."\n".'</div>';
	return $me;
}

function Well() {
	$me = "";
	$me .= '<div class="well">';
	$me .= parser(func_get_args());
	$me .= "\n".'</div>';
	return $me;
}

function Left() {
	$me = "";
	$me .= '<span class="text-left">';
	$me .= parser(func_get_args());
	$me .= "\n".'</span>';
	return $me;
}

function Center() {
	$me = "";
	$me .= '<span class="text-center">';
	$me .= parser(func_get_args());
	$me .= "\n".'</span>';
	return $me;
}

function Right() {
	$me = "";
	$me .= '<span class="text-right">';
	$me .= parser(func_get_args());
	$me .= "\n".'</span>';
	return $me;
}
