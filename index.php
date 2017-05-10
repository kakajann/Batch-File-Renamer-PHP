<?

	$path 		   = 'music/'; // batch files folder
	$count_at_zero = false;    // 0, 1, 2
	$append_zero   = true;	   // 01, 02, .., 11, 12
	$shuffle_files = true;     // shuffle_files

	// select only files
	$songs = array_filter(scandir($path), function($file) {
		return !is_dir($path . $file);
	});

	// shuffle files
	$shuffle_files == true ? shuffle($songs) : '';

	foreach ($songs as $index => $song)
	{
		$count_at_zero == false ? $index++ : '';
		$numbering = $append_zero == true && $index < 10 ? '0' . $index : $index;
		
		// renaming...
		rename($path . $song, $path . '/'. $numbering.' '.$song);
	}