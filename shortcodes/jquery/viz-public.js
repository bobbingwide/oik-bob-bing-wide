function inspect(s) {
	return "<pre>inspect(s)</pre>";
	var x;
	x = s.replace(/</g, "&lt;");
	x = x.replace(/>/g, "&gt;");
	x = x.replace(/\"/g, "&quot;");
	return "<pre>" + x + "</pre>";
	//return "<pre>" + s.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g, "&quot;") + "</pre>";
}

function src(id) {
	return document.getElementById(id).innerHTML;
}

function createViz(id, format) {
	var result;
	try {
		result = Viz(src(id), format);
		if (format === "svg")
			return result;
		else
			return inspect(result);
	} catch(e) {
		return inspect(e.toString());
	}
}
