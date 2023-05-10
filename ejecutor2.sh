#!/bin/bash


obtenedor="$(find /media -type f -name "reloj.conf")"

value="asasa"
if [[ -z "$obtenedor" ]]; then
echo "\$param consists of spaces only"
else
value="$(cat $obtenedor)"
fi

if [[ $value = *[!\ ]* ]]; then
  date -s "$value"
else
  echo "\$param consists of spaces only"
fi



mysql -hlocalhost -uroot -pClavedebase -e 'Select * from temp_database.tempLog' > /home/server/temperatura.xls
obtenedor="$(find /media -type f -name "temperatura.xls")"
find /media -type d -exec cp /home/server/temperatura.xls {} \;



#wget http://localhost/sensor/sensador.php
# do stuff
#sleep $SLEEP
# /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php
# do stuff
#sleep $SLEEP
#wget http://localhost/sensor/sensador.php
# do stuff
#sleep $SLEEP
# /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php
#sleep $SLEEP
# /home/pi/readTempSQL.py
#wget http://localhost/sensor/sensador.php


