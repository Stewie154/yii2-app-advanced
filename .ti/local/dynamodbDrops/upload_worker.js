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

const workerFarm = require('worker-farm');
const service = workerFarm(require.resolve('/app/.ti/local/dynamodbDrops/upload_worker_task.js'));

var source_content = require('./' + SOURCE_JSON_FILE);

var latest_content = source_content.items.filter(entry => entry.PutRequest.Item.import_id.N > 380);

var i,j,temparray,chunk = 10;
for (i = 0,j = latest_content.length; i < j; i += chunk) {
    temparray = latest_content.slice(i, i + chunk);
    service(temparray, function (err, output) {
      console.log(output)
    })
}
