<?php
include_once'model/announce_ops/collection_view.php'; #model for getting church collections

$collection = get_collections();

include_once'model/announce_ops/general_view.php'; #model for getting general announcements

$general = get_announcements();


include_once'model/announce_ops/show_announcements.php'; #model for getting all marriage banns

$banns = get_announcement();


include_once'view/announce_ops/all_announcements.phtml';
?>