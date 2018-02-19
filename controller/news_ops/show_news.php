<?php

include_once'model/news_ops/add_news_mod.php'; #file that gets all news feeds

$news = get_news(); #variable to store retrieved feeds

include_once'view/news_ops/news_window.php';