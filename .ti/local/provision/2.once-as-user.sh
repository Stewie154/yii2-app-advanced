#!/usr/bin/env bash

/usr/bin/env bash /home/vagrant/ti-utils/2.once-as-user.sh

pip3 install awscli --upgrade --user
pip3 install awscli-local  --user
pip3 install aws-sam-cli --user
pip3 install localstack --user

mkdir -p ~/.aws
echo "[default]" > ~/.aws/credentials
echo "aws_access_key_id = fake" >> ~/.aws/credentials
echo "aws_secret_access_key = fake" >> ~/.aws/credentials
echo "region=us-east-1" >> ~/.aws/credentials

echo 'alias amazon="SERVICES=s3,sqs,dynamodb DATA_DIR=/home/vagrant/localstack/data localstack start --docker"' >> ~/.bash_aliases
echo 'alias aws-up="supervisorctl start localstack"' >> ~/.bash_aliases
echo 'alias aws-down="bash /app/.ti/local/utils/localstack-stop.sh"' >> ~/.bash_aliases
