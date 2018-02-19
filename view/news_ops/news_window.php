<?php
include_once'../../model/news_ops/add_news_mod.php'; #file that gets all news feeds

$news = get_news(); #variable to store retrieved feeds
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>News</title>

	<base target="_parent">

	<link rel="stylesheet" href="news_window.css" type="text/css">


</head>

<body class="news-page">

	<!-- START NEWS -->
	<div id="NewsArea">

		<div class="news-text-if">

			<!-- NEWS CONTENT STARTS HERE -->


			<span class="news-title-if">
				Church News Feeds<br>
			</span>

			<?php $x = 1; foreach($news as $feed): ?>
				<span class="news-title-if">
					<?php echo $x++.'. '.$feed['title']?><br>
				</span>

				<span>

					<?php echo $feed['caption']; ?>

					<a href="<?php echo $feed['link']; ?>" target="_blank" >Read more...</a>.

					<br>
				</span>
				<br><br>
			<?php endforeach; ?>



			<!-- END NEWS CONTENT -->

		</div>

	</div>
	<!-- END NEWS -->

</body>

</html>