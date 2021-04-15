#!/usr/bin/env bash

/usr/bin/env bash /home/vagrant/ti-utils/4.always-as-user.sh

yiiLoc="/app/yii"
sed "s#PATH#$yiiLoc#g" /app/.ti/build/crontab > /app/.ti/build/cron
crontab /app/.ti/build/cron
rm /app/.ti/build/cron