<?php

//deletes all session data currently set
session_destroy();

header("Location: ?controller=home/general_home");