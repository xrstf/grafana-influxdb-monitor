<?php
/**
 * This script records the local machine's system load.
 */

require __DIR__.'/vendor/autoload.php';

$now  = now();
$load = sys_getloadavg();

$db = new Database();
$db->record('sysload_1min', $load[0], [], $now);
$db->record('sysload_5min', $load[1], [], $now);
$db->record('sysload_15min', $load[2], [], $now);
