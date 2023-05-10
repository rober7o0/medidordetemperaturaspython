#!/bin/sh

SLEEP=15
mysql -hlocalhost -uroot -pClavedebase -e 'DELETE FROM temp_database.tempLog WHERE datetime < DATE_SUB(NOW(), INTERVAL 30 DAY);'
#wget http://localhost/sensor/sensador.php
# do stuff
#sleep $SLEEP
# /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php
# do stuff
#sleep $SLEEP
 /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php
# do stuff
#sleep $SLEEP
# /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php
#sleep $SLEEP
# /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php

rm -f sensador.php.*
