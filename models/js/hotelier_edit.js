$("#form_Hotelier").validate({
rules: {
	id: {
	},
	c_ts: {
		string: true
	},
	m_ts: {
		string: true
	},
	identifier: {
		string: true,
		maxlength: 50
	},
	Name: {
		string: true,
		maxlength: 50
	},
	Vorname: {
		string: true,
		maxlength: 50
	},
	Email: {
		string: true,
		maxlength: 50
	},
	Passwort: {
		string: true,
		maxlength: 50
	}
}
});
