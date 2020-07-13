const requrst = require('request');

const apiurl = 'https://api.twitch.tv/kraken/games/top';
const clientid = '0dhlqk9cir8w6pdvh8opafwc691ufr';

requrst(
{
	url: apiurl,
	headers: {
		'Client-ID': clientid,
		'Accept': 'application/vnd.twitchtv.v5+json',
	},
},
	(error, response, body) => {
		if (error) {
			console.log(error);
		}
		const data = JSON.parse(body);
		for (let i = 0; i < data.top.length; i += 1) {
			console.log(`${data.top[i].viewers} ${data.top[i].game.name}`);
		}
	},
);
