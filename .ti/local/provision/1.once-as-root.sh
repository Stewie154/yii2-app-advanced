#!/usr/bin/env bash

apt-get update

modules=$1
domain=$2

sed -i '$a innodb_buffer_pool_size = 1024MB' /etc/mysql/my.cnf

/usr/bin/env bash /home/vagrant/ti-utils/1.once-as-root.sh "$modules"

apt-get remove docker docker-engine docker.io containerd runc
apt-get install -y unzip
apt-get install -y python3-pip

curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh
sudo usermod -a -G docker vagrant

### adds the modules to the vagrant's host file
delimiter=" "
modules=$(echo $modules | tr "$delimiter" " ")
for element in $modules
do
  if !(grep -Fxq "127.0.0.1 $element.$domain" /etc/hosts)
  then
    echo "127.0.0.1 $element.$domain" >> /etc/hosts
  fi
done


echo "[program:localstack]" >> /etc/supervisord.conf
echo "process_name=localstack" >> /etc/supervisord.conf
echo "command=bash /app/.ti/local/utils/localstack-start.sh" >> /etc/supervisord.conf
echo "autostart=true" >> /etc/supervisord.conf
echo "autorestart=false" >> /etc/supervisord.conf
echo "user=vagrant" >> /etc/supervisord.conf
echo "numprocs=1" >> /etc/supervisord.conf
echo "redirect_stderr=true" >> /etc/supervisord.conf
echo "stdout_logfile=/app/console/runtime/logs/localstack.log" >> /etc/supervisord.conf
