<?php

include_once 'model/categories.php'; #model to fetcth categories
include_once'lib/messaging.php';

$categories = select_categories(); #assign returned category names to a variable

$contacts = select_numbers();  #assign returned category contacts to a variable

//add error and success messages from updating categories i.e., update_cat_con.php
$successMessages = getMessagesRegister('success');

include_once 'view/view_categories.phtml';

finishMessagesRegister(); #clear previous success messages