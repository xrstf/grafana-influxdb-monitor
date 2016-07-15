<?php

/**
 * returns the current time rounded down to the current minute
 */
function now() {
	return (int) floor(time() / 60) * 60;
}

/**
 * primitive wrapper around InfluxDB
 */
class Database {
	protected $client;
	protected $database;

	public function __construct() {
		$this->client   = new InfluxDB\Client('127.0.0.1', 8086);
		$this->database = $this->client->selectDB('monitor');
	}

	public function record($series, $value, array $tags = [], $time = null) {
		if ($time === null) $time = now();

		$point  = new InfluxDB\Point($series, $value, $tags, [], $time);
		$result = $this->database->writePoints([$point], InfluxDB\Database::PRECISION_SECONDS);

		if (!$result) {
			throw new \RuntimeException('Recording failed with no error message given.');
		}
	}
}
