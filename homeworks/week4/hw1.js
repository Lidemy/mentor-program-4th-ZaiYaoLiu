const request = require('request');

const url = 'https://lidemy-book-store.herokuapp.com';

request(
	`${url}/books?_limit=10`,
	(error, response, body) => {
		if (error) {
			console.log(error);
		}
		const data = JSON.parse(body);
		for (let i = 0; i < data.length; i += 1) {
			console.log(data[i].id, data[i].name);
		}
	},
);
