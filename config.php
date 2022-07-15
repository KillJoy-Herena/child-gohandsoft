
<?php
$mysql_host = "localhost:3306";
$mysql_database = "wp_lco6k";
$mysql_user = "wp-x9m9w";
$mysql_password = "";
CREATE TABLE `ip` (
    `site` VARCHAR(256) CHARACTER SET ascii NOT NULL,
    `ip` BINARY(16) NOT NULL,
     PRIMARY KEY (`site`)
   );