const fs = require('fs');

var SOURCE_JSON_FILE = null;
var TARGET_JSON_FILE = null;

process.argv.forEach(function (val, index, array) {
	if(val.indexOf('-') == 0) {
		var parts = val.split('=');
		switch(parts[0]) {
			case '-source':
				SOURCE_JSON_FILE = parts[1];
			break;
		}
	}
});

if(SOURCE_JSON_FILE == null) {
	console.log('No source file entered');
	process.exit(0);
}

TARGET_JSON_FILE = 'output-' + SOURCE_JSON_FILE;

var sourceContent = require('./' + SOURCE_JSON_FILE);
var outputContent = [];

for(var i = 0; i < sourceContent.Items.length; i++) {
	var template = {
		"PutRequest": {
			"Item": sourceContent.Items[i]
		}
	}
	outputContent.push(template);
}

console.log('Converted ' + sourceContent.Items.length + ' items');

var outputTemplate = {
  items: outputContent
};
fs.writeFileSync(TARGET_JSON_FILE, JSON.stringify(outputTemplate));
