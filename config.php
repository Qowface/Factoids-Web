<?php

/* Edit these values */
$db['host'] = 'localhost'; // The IP/hostname of your database.
$db['name'] = 'db'; // The name of your database.
$db['user'] = 'name'; // The user for your database.
$db['pass'] = 'pass'; // The password for your database user.
$page['title'] = 'Factoids Web App'; // The header/title to display.
$page['footer'] = 'Documentation and help powered by <a href="http://dev.bukkit.org/bukkit-plugins/factoids/" target="_blank">Factoids</a>'; // The footer to display.

/* Don't mess with these unless you really know what you're doing */
$util['pattern'] = array('/;{2}/', '/&+\w/', '/([a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_#:]+)/');
$util['replace'] = array('<br>', '', '<a href=$1 target="_blank">$1</a>');

?>
