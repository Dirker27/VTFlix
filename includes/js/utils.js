function sendRelation(r) {
	var form = document.getElementById('portal');
	var data = document.getElementById('r_v');
	data.setAttribute('value', r);
	form.submit();
}

function sendQuery(q) {
	var form = document.getElementById('portal');
	var data = document.getElementById('q_v');
	data.setAttribute('value', q);
	form.submit();
}