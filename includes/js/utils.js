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

	data.value = sql;
	form.submit();
}

function sendQuery(q) {
	var form = document.getElementById('portal');
	var data = document.getElementById('q_v');
	var sql = '';

	switch(q) {
		case 1:
		// Brad Pitt Movies
		sql = 'SELECT title FROM VideoInfo WHERE vid IN farts....;';
		break;

		case 2:
		// User w/ most friends
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

	data.value = sql;
	form.submit();
}

function userReccomend() {
	var form = document.getElementById('portal');
	var user_box = document.getElementById('user_id');
	var data = document.getElementById('q_v');

	var user_id = Number(user_box.value);

	if (user_id == NaN) {
		alert('User ID must be a number!');
		return;
	}

	var sql = 'SELECT mtitle FROM MovieInfo WHERE mid IN (';
	sql += 'SELECT mid FROM Ratings WHERE rate_score > 3 AND uid IN (';
	sql += 'SELECT uid2 FROM Friends WHERE uid1 = ' + user_id + '))';

	data.value = sql;
	user_box.value = "";
	form.submit();
}