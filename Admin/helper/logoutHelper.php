<?php
session_start();
session_destroy();
header("location:" . $base_url . "?p=home");
return;