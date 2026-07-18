$("#form_Buchung").validate({
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
	checkin: {
		string: true
	},
	checkout: {
		string: true
	},
	AnzahlGaeste: {
		integer: true,
		digits: true
	},
	Gesamtpreis: {
		float: true,
		float: true
	},
	Zahlungsart: {
	},
	Zahlungsbetrag: {
		float: true,
		float: true
	},
	Status: {
	},
	_Hotelier: {
		string: true,
		required: true
	},
	_Kunde: {
		string: true,
		required: true
	},
	_Zimmertyp: {
		string: true,
		required: true
	},
	Zahlungsart_literal: {
		string: true,
		maxlength: 50
	},
	Status_literal: {
		string: true,
		maxlength: 50
	},
	_Hotelier_identifier: {
		string: true,
		maxlength: 50
	},
	_Kunde_identifier: {
		string: true,
		maxlength: 50
	},
	_Zimmertyp_identifier: {
		string: true,
		maxlength: 50
	}
}
});
