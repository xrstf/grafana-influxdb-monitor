Docker-based Grafana/InfluxDB Logging Setup
===========================================

This repository contains a the needed files to get a super simple logging service
for personal use up and running. InfluxDB is used to store the data, Grafana then
handles fancy dashboards and queries the database from the InfluxDB. A few PHP
scripts then feed information into the database, triggered by (for example)
crond.

Grafana makes it extremely easy to make yourself some pretty graphs, its InfluxDB
integration is top-notch.

![Sample Dashboard](https://h.xrstf.de/r/akBVgpLKNIdQlyMwbiKZtJraspyFUFPbPrpTQEyszC/grafana-dashboard.png)

Installation
------------

Copy the ``docker-compose.env.dist`` and name it ``docker-compose.env``. Adjust it
to your needs, you find all possible configuration options in the
[Grafana documentation](http://docs.grafana.org/installation/configuration/).

Make sure you have Docker and Docker-Compose installed. To start the services,
simply run

    docker-compose up -d

To inspect your database and create new series (if needed), you can use the
``influxdb.sh`` to open an InfluxDB shell.

Configure Grafana
-----------------

Log-in as administrator and use the menu to add a new datasource. Set these
options:

* **Type:** InfluxDB
* **Http Settings / Url:** ``http://influxdb:8086/``
* **Http Settings / Access:** proxy
* **InfluxDB / Database:** monitor

You have to enter a username and password, but in this basic setup, these
are actually ignored by InfluxDB, so it doesn't matter what you enter.

PHP Scripts
-----------

To use the included PHP scripts, you need to run ``composer install`` first to
install the InfluxDB client library.

License
-------

WTFPL
