module.exports = (input, callback) => {
  for (var i = 0; i < input.length; i++) {
    var command = 'awslocal dynamodb put-item --table-name ' + TABLE_NAME + ' --item \'' + JSON.stringify(input[i].PutRequest.Item) + '\'';
    exec(command);
  }
  callback(null, 'Done!');
  process.exit (0);
}
