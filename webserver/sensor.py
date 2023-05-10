#!/usr/bin/env python
import os
import time
import datetime
import glob
from time import strftime

os.system('modprobe w1-gpio')
os.system('modprobe w1-therm')
temp_sensor = '/sys/bus/w1/devices/28-0516a1186bff/w1_slave'
temp_sensor2 = '/sys/bus/w1/devices/28-0516a1186bff/w1_slave'

# Variables for MySQL
#db = MySQLdb.connect(host="localhost", user="root",passwd="Clavedebase", db="temp_database")
#cur = db.cursor()

def tempRead():
    t = open(temp_sensor, 'r')
    lines = t.readlines()
    t.close()

    temp_output = lines[1].find('t=')
    if temp_output != -1:
        temp_string = lines[1].strip()[temp_output+2:]
        temp_c = float(temp_string)/1000.0
    return round(temp_c,1)

while True:
    temp = tempRead()
    print temp

    datetimeWrite = (time.strftime("%Y-%m-%d ") + time.strftime("%H:%M:%S"))
    print datetimeWrite
#    sql = ("""INSERT INTO tempLog (datetime,temperature) VALUES (%s,%s)""",(datetimeWrite,temp))
#    try:
#        print "Writing to database..."
        # Execute the SQL command
      #  cur.execute(*sql)
        # Commit your changes in the database
    url = "https://remoteserver.com/temperaturas/recibetemps3.php?temperatura=%s" % temp
    f = os.popen('wget -qO- %s &> /dev/null' % url)
    now = f.read()
    print "Write Complete"
#    except:
        # Rollback in case there is any error
       # db.rollback()
    print "Failed writing to database"

#    cur.close()
#    db.close()
    break


