<?php
/**
 * This script can be used to monitor a website's response time.
 *
 * Set it up by giving the full URL to fetch as the first argument
 * to this script, like:
 *
 *    php cron-http.php http://www.example.com/
 *
 * The response time will be recorded as the number of milliseconds
 * in the http_response series, tagged with the URL and the host.
 */

require __DIR__.'/vendor/autoload.php';

$now    = now();
$url    = $argv[1];
$before = microtime(true);

if (@file_get_contents($url) === false) {
	exit(1);
}

$ms = (int) ((microtime(true) - $before) * 1000);

// record result

$db = new Database();
$db->record('http_response', $ms, [
	'url'  => $url,
	'host' => parse_url($url, PHP_URL_HOST),
], $now);
