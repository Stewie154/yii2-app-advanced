pip3 install awscli-local  --user
pip3 install localstack --user

if [ -d "/tmp/localstack" ]; then sudo rm -Rf /tmp/localstack; fi

docker run -d -e LOCALSTACK_HOSTNAME="localhost" -e SERVICES="s3,sqs,dynamodb" -e DEFAULT_REGION="us-east-1" -e TEST_AWS_ACCOUNT_ID="000000000000" -e DATA_DIR="/tmp/localstack_data" --rm --privileged --name localstack_main -p 8080:8080 -p 8081:8081   -p 4576:4576 -p 4569:4569 -p 4572:4572 -v "/home/vagrant/localstack/data:/tmp/localstack_data" -v "/tmp/localstack:/tmp/localstack" -v "/var/run/docker.sock:/var/run/docker.sock" -e DOCKER_HOST="unix:///var/run/docker.sock" -e HOST_TMP_FOLDER="/tmp/localstack" "localstack/localstack"

sleep 15

until awslocal --no-sign-request sqs create-queue --queue-name localbucket; do
  sleep 1
done

/app/yii amazon/provision
/app/yii amazon/make-table



docker wait localstack_main
