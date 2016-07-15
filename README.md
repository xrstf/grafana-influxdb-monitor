Docker-based Grafana/InfluxDB Logging Setup
===========================================

This repository contains a the needed files to get a super simple logging service
for personal use up and running. InfluxDB is used to store the data, Grafana then
handles fancy dashboards and queries the database from the InfluxDB. A few PHP
scripts then feed information into the database, triggered by (for example)
cronjobs.

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

License
-------

WTFPL
