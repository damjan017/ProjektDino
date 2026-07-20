$("#form_Unterkunft").validate({
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
	created_id: {
		string: true
	},
	modified_id: {
		string: true
	},
	owner_id: {
		string: true
	},
	Unterkunftsart: {
	},
	Name: {
		string: true,
		maxlength: 50
	},
	Bild: {
		string: true
	},
	Beschreibung: {
		string: true,
		maxlength: 50
	},
	Bewertung: {
		integer: true,
		digits: true
	},
	_Adresse: {
		string: true,
		required: true
	},
	_Hotelier: {
		string: true,
		required: true
	},
	Unterkunftsart_literal: {
		string: true,
		maxlength: 50
	},
	_Adresse_identifier: {
		string: true,
		maxlength: 50
	},
	_Hotelier_identifier: {
		string: true,
		maxlength: 50
	}
}
});
