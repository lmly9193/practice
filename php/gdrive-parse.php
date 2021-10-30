$vid_info='https://drive.google.com/get_video_info?docid='.$vid; //url
$getinfo = file_get_contents($vid_info); // get url content

parse_str($getinfo,$get_array); // parse use '&' to $get_array

$stream = explode(',',$get_array['fmt_stream_map']);  // parse $get_array['fmt_stream_map'] use ',' to $stream

foreach ($stream as &$value) {
	$value=explode('|',$value);
	$q[]=$value[0];
	$l[]=$value[1];
}

$c = array_combine($q,$l);