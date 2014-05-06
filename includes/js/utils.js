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
		// List 10 Brad Pitt Movies
		sql = "SELECT title FROM VideoInfo WHERE vid IN (SELECT vid FROM ActIn WHERE pid = (SELECT pid FROM Performer WHERE first_name = 'Brad' AND last_name = 'Pitt')) ORDER BY release_year DESC LIMIT 10";
		break;

		case 2:
		// User with most friends
		sql = "SELECT first_name, last_name FROM UserInfo, (SELECT uid1 AS u, COUNT(*) AS c FROM Friends GROUP BY uid1 ORDER BY c DESC LIMIT 1) AS f WHERE f.u = uid";
		break;

		case 3:
		// Performer in most movies
		sql = "SELECT first_name, last_name FROM Performer WHERE (SELECT pid, COUNT(*) AS c FROM ActIn GROUP BY pid ORDER BY c DESC LIMIT 1 WHERE vid IN (SELECT mid FROM MovieInfo))";
		break;

		case 4:
		// List 10 videos in the Fantasy genre
		sql = "SELECT title FROM Videos WHERE (SELECT vid FROM BelongToGenre WHERE genre = 'Fantasy') DESC LIMIT 10";
		break;

		case 5:
		// List all friends of John Abbey
		sql = "SELECT first_name, last_name FROM UserInfo WHERE (SELECT uid FROM Friends WHERE uid1 = (SELECT uid FROM UserInfo WHERE first_name = 'John' AND last_name = 'Abbey')";
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
	sql += 'SELECT vid FROM Ratings WHERE rate_score > 3 AND uid IN (';
	sql += 'SELECT uid2 FROM Friends WHERE uid1 = ' + user_id + '))';

	data.value = sql;
	user_box.value = "";
	form.submit();
}