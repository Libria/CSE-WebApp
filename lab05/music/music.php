<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
		$song_count = 5678;
		$news_paper = (int) $_GET["newspaper"];
		#file_get_contents는 알파벳 하나하나를 뽑는다.
		$artist = file("favorite.txt");
		$songs = glob("lab5/musicPHP/songs/*.mp3");
		$playlists = glob("lab5/musicPHP/songs/*.m3u");
		?>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			<?php print "I have $song_count total songs,";?>
			which is over 123 hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
				<?php for ($i = 11; $i > 11 - $news_paper; $i--){
					$num = sprintf('%02d', $i); ?>
					<li><a href="https://www.billboard.com/archive/article/2019-<?= $num ?>"\>2019-<?= $num ?></a></li>
				<?php } ?>
			</ol>
		</div>
		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php for ($i = 0; $i < count($artist); $i++){
					$out = explode(" ", $artist[$i]);
					$out = implode("_", $out); ?>
				<li><a href="http://en.wikipedia.org/wiki/<?= $out ?>"\><?= $artist[$i] ?></li>
			<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php foreach ($songs as $songsfile) { ?>
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/<?= basename($songsfile) ?>"><?= basename($songsfile) ?> (<?= floor(filesize($songsfile) / 1024) ?> KB) </a>
				</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php foreach ($playlists as $playfile) {
					$lists = file($playfile); ?>
					<li class="playlistitem"><?= basename($playfile) ?>
						<ul>
							<?php for ($i = 0; $i < count($lists); $i++) {
								if (strpos($lists[$i], "#") === false) { ?>
									<li><?= $lists[$i] ?>
									<?php }
							} ?>
						</li>
					</ul>
				<?php } ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
