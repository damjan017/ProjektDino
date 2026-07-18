$("#form_Ausstattung").validate({
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
	Bezeichnung: {
		string: true,
		maxlength: 50
	},
	Kategorie: {
	},
	Kategorie_literal: {
		string: true,
		maxlength: 50
	}
}
});
