# #!/usr/bin/env bash

supervisord;

sudo rabbitmqctl stop_app;
sudo rabbitmqctl force_reset;
sudo rabbitmqctl start_app;
sudo rabbitmqctl delete_user guest;
sudo rabbitmqctl add_user vagrant vagrant;
sudo rabbitmqctl set_user_tags vagrant administrator;
sudo rabbitmqctl set_permissions -p / vagrant ".*" ".*" ".*";

sudo supervisorctl stop all;
sudo supervisorctl start all;
