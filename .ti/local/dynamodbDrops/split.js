const fs = require('fs');
var exec = require('child_process').execSync;

var source_content = require('./output-dump.json');

var i,j,temparray,chunk = 25;
for (i = 0,j = source_content.production_import_block.length; i < j; i += chunk) {
    temparray = source_content.production_import_block.slice(i, i + chunk);
    var tmp = {
      import_block: temparray
    };
    fs.writeFileSync('./tmp.json', JSON.stringify(tmp));
    process.stdout.write("Processing: " + i + "/" + j + "\r");
    var command = "awslocal dynamodb batch-write-item --request-items file://tmp.json";
    exec(command);
}
