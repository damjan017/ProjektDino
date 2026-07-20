$("#form_Zimmertyp").validate({
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
	Bezeichnung: {
	},
	Anzahltbett: {
		integer: true,
		digits: true
	},
	ArtBett: {
		string: true,
		maxlength: 50
	},
	Preis: {
		float: true,
		float: true
	},
	Aktionspreis: {
		float: true,
		float: true
	},
	Aktionaktiv: {
		integer: true,
		digits: true
	},
	Bild: {
		string: true
	},
	AnzahlVerfuegbarkeit: {
		integer: true,
		digits: true
	},
	_Unterkunft: {
		string: true,
		required: true
	},
	Bezeichnung_literal: {
		string: true,
		maxlength: 50
	},
	_Unterkunft_identifier: {
		string: true,
		maxlength: 50
	}
}
});
