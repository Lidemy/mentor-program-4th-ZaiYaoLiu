const request = require('request');

const apiurl = 'https://restcountries.eu/rest/v2/name/';
const name = process.argv[2];

if (!name) {
	console.log('請輸入國家');
	return;
}
request(
	apiurl + name,
	(error, response, body) => {
		const data = JSON.parse(body);
		for (let i = 0; i < data.length; i += 1) {
			if (error) {
				console.log(error);
			}
			if (data[i].name === undefined) {
				console.log('找不到國家資訊');
			}
			console.log('=================');
			console.log(`國家： ${data[i].name}`);
			console.log(`首都： ${data[i].capital}`);
			console.log(`貨幣： ${data[i].currencies[0].code}`);
			console.log(`國碼： ${data[i].callingCodes}`);
		}
	},
);
