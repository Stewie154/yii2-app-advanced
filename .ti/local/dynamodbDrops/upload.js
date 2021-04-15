var exec = require('child_process').execSync;
const fs = require('fs');

var SOURCE_JSON_FILE = null;
var TABLE_NAME = null;

process.argv.forEach(function (val, index, array) {
	if(val.indexOf('-') == 0) {
		var parts = val.split('=');
		switch(parts[0]) {
			case '-source':
				SOURCE_JSON_FILE = parts[1];
			break;

			case '-table':
				TABLE_NAME = parts[1];
			break;
		}
	}
});

if(SOURCE_JSON_FILE == null) {
	console.log('No source file entered');
	process.exit(0);
}

if(TABLE_NAME == null) {
	console.log('No target table');
	process.exit(0);
}

var source_content = require('./' + SOURCE_JSON_FILE);

var latest_content = source_content.items;//source_content.items.filter(entry => entry.PutRequest.Item.import_id.N > 380);

for(var i = 0; i < latest_content.length; i++) {
	var command = 'awslocal dynamodb put-item --table-name ' + TABLE_NAME + ' --item \'' + JSON.stringify(latest_content[i].PutRequest.Item) + '\'';
  exec(command);
	process.stdout.write("Processing: " + i + "/" + latest_content.length + "\r");
}
console.log('done');
