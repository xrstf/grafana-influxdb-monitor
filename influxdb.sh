#!/usr/bin/env sh
#
# This script starts an InfluxDB shell.

docker-compose run --rm influxdb influx -host influxdb
