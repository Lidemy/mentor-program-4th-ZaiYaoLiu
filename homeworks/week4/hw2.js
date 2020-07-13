const request = require('request');

const apiurl = 'https://lidemy-book-store.herokuapp.com/books';
const behavior = process.argv[2];
const id = process.argv[3];
const newid = process.argv[4];

function listbooks() {
	request(
		`${apiurl}?_limit=20`,
		(error, response, body) => {
			if (error) {
				console.log(error);
			}
			const data = JSON.parse(body);
			for (let i = 0; i < data.length; i += 1) {
				console.log(data[i].id + data[i].name);
			}
		},
	);
}

function readbooks() {
	request(
		`${apiurl}/${id}`,
		(error, response, body) => {
		if (error) {
			console.log(error);
		}
		const data = JSON.parse(body);
		console.log(data.id, data.name);
		},
	);
}

function deletebooks() {
	request.delete(
		`${apiurl}/${id}`,
		(error) => {
		if (error) {
			console.log(error);
		}
		console.log('deletebook');
		},
	);
}

function createbooks(name) {
	request.post({
		url: apiurl,
		form: { name },
	},
	(error) => {
		if (error) {
			console.log(error);
		}
		console.log('createbook');
	});
}

function updatebooks(updatid, name) {
	request.patch({
		url: `${apiurl}/${id}`,
		form: { name },
	},
	(error) => {
		if (error) {
			console.log(error);
		}
		console.log('updatebook');
	});
}

switch (behavior) {
	case 'list':
		listbooks();
		break;
	case 'read':
		readbooks(id);
		break;
	case 'delete':
		deletebooks(id);
		break;
	case 'create':
		createbooks(id);
		break;
	case 'update':
		updatebooks(id, newid);
		break;
	default:
		console.log('請輸入正確行為模式 list, read, delete, create, update');
}
