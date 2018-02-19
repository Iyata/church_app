<?php
include_once'model/announce_ops/show_announcements.php'; #model

$banns = get_announcement();

include_once'view/announce_ops/marriage_bann_show.phtml';