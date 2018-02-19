<?php
//controller for mailing_categories.phtml
//all operations concerning mailing categories are controlled here

//include file containing activities to be displayed by the sidebar
include_once'model/activity_ops/church_activity.php'; #file that gets weekly church activities

$activities = get_activities(); #function from model church_activity.php

include_once 'view/category_ops/mailing_categories.phtml';