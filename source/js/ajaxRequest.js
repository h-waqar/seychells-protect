class AjaxRequest {
	$ = null;
	constructor($) {
		// Constructor code here
		this.$ = $;
	}
	call(data, dataType, requestType) {
		return this.$.ajax({
			url: ajaxUrl, // Point to server-side controller method.
			dataType: dataType, // What to expect back from the server.
			data: data,
			method: requestType,
			// processData: false, // Don't process the data
			// contentType: false, // Don't set content type
		}).error(function (response) {
			console.log(response);
			// alert('Connection failed.' + JSON.stringify(response.statusText));
		});
	}


	imageCall(data, dataType, requestType) {
		return this.$.ajax({
			url: ajaxUrl, // Point to server-side controller method.
			dataType: dataType, // What to expect back from the server.
			data: data,
			method: requestType,
			processData: false, // Don't process the data
			contentType: false, // Don't set content type
		}).error(function (response) {
			console.log(response);
			// alert('Connection failed.' + JSON.stringify(response.statusText));
		});
	}

	// Class methods go here
}
const _ajaxRequest = new AjaxRequest(jQuery);
