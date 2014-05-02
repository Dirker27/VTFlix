function sendRelation(r) {
	var form = document.getElementById('portal');
	var data = document.getElementById('q_v');
	var sql = '';

	switch(r) {
		case 1:
		sql = 'SELECT pid, vid FROM ActIn LIMIT 20;';
		break;

		case 2:
		sql = 'SELECT vid, genre FROM BelongToGenre LIMIT 20;';
		break;

		case 3:
		sql = 'SELECT uid, vid, rate_score, rating_time FROM Ratings LIMIT 20;';
		break;

		case 4:
		sql = 'SELECT uid1, uid2, response, requesttime, responsetime FROM FriendRequests LIMIT 20;';
		break;

		case 5:
		sql = 'SELECT collection_id, season_num, season_title FROM InCollection LIMIT 20;';
		break;

		default:
		break;
	}

	data.setAttribute('value', sql);
	form.submit();
}

function sendQuery(q) {
	var form = document.getElementById('portal');
	var data = document.getElementById('q_v');
	var sql = '';

	switch(q) {
		case 1:
		sql = 'SELECT pid, vid FROM ActIn LIMIT 20;';
		break;

		case 2:
		sql = 'SELECT pid, vid FROM ActIn LIMIT 20;';
		break;

		case 3:
		sql = 'SELECT pid, vid FROM ActIn LIMIT 20;';
		break;

		case 4:
		sql = 'SELECT pid, vid FROM ActIn LIMIT 20;';
		break;

		case 5:
		sql = 'SELECT pid, vid FROM ActIn LIMIT 20;';
		break;

		default:
		break;
	}

	data.setAttribute('value', sql);
	form.submit();
}