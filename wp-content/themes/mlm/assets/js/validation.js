const formElementsSelector = 'input, textarea';
const action = $('input[name="action"]').val();

const form = jQuery('#contact-form');
const formBtn = jQuery('#submit-btn');

jQuery(formBtn).click(function (e) {
	e.preventDefault();

	// validate each input
	let topic = checkRadioField('contact-topic');
	let email = checkField('contact-email');
	let message = checkField('contact-message');

	if (!topic || !email || !message) {
		return false;
	}

	let formData = new FormData();
	formData.append('Topic', topic);
	formData.append('Email', email);
	formData.append('Message', message);

	sendMail(action, formData);
});

function sendMail(action, data) {
	jQuery.ajax({
		url: action,
		type: 'POST',
		dataType: 'json',
		processData: false,
		contentType: false,
		data: data,
		success: function(data) {
			console.log(data);
			$('body').addClass('overflow-h');
			$('.modal').fadeIn(300);

			$(form).find(formElementsSelector).val('');
		},
		error: function (error) {
			console.log('error' + error);
		},
	});
}

$('.reload-btn').click(function() {
	window.location = url;
});

function formValidate() {
	let error = 0;
	let formReq = $(formElementsSelector);

	for (let index = 0; index < formReq.length; index++) {
		const input = formReq[index];
		formRemoveError(input);

		if (input.value === '') {
			error++;
		} else if ((input.type == 'email' && !validateEmail(input.value))) {
			formAddError(input);
			error++;
		}
	}
	return error;
}

function checkRadioField(name) {
	let e = $('input[name="' + name + '"]');
	let v = $('input[name="' + name + '"]:checked').val();
	let p = $(e).closest('.dropdown-section');

	if (v === undefined) {
		$(p).addClass('input-error');
		return false;
	}

	$(p).removeClass('input-error');
	return v;
}

function checkEmail(email) {
	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

function checkField(name) {
	let e = $('#' + name);
	let v = $(e).val();
	let t = $(e).prop('type');
	let p = $(e).closest('.form-group')

	if (t !== 'undefined' &&
		t !== 'select-one') {
		v = v.trim();
	}

	if (t == 'email' && !checkEmail(v)) {
		$(p).addClass('input-error');
		return false;
	}

	if (v === '' || v === '0' || v === 0) {
		$(p).addClass('input-error');
		return false;
	}

	$(p).removeClass('input-error');
	return v;
}