<?php
$Buchung       = Core::$view->Buchung;
$Zimmertyp     = Core::$view->Zimmertyp;
$Unterkunft    = Core::$view->Unterkunft;
$ZahlungsartT  = Core::import("ZahlungsartT");
$checkin       = $Buchung->checkin  ?: date("Y-m-d");
$checkout      = $Buchung->checkout ?: date("Y-m-d", strtotime("+1 day"));
$anzahl_gaeste = $Buchung->AnzahlGaeste ?: 1;
$zimmertyp_id  = $Buchung->_Zimmertyp  ?: $_GET["zimmertyp_id"];
?>

<div data-role="ui-bar ui-bar-a">
    <a href="?task=Zimmersuche" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all"
       style="display:inline-block;" data-ajax="false">Zurück</a>
    <h1>Zimmer buchen</h1>
</div>

<?php if ($Zimmertyp && $Unterkunft): ?>
<div class="ui-body ui-body-a" style="margin-bottom:15px; padding:10px; border-radius:6px;">
    <h3 style="margin:0 0 5px;"><?=htmlspecialchars($Unterkunft->Name)?></h3>
    <p style="margin:0;">
        <strong><?=htmlspecialchars($Zimmertyp->Bezeichnung_literal)?></strong>
        &middot; <?=(int)$Zimmertyp->Anzahltbett?> Bett(en) &middot; <?=htmlspecialchars($Zimmertyp->ArtBett)?>
    </p>
    <?php
    $preis = ($Zimmertyp->Aktionaktiv && $Zimmertyp->Aktionspreis > 0)
           ? $Zimmertyp->Aktionspreis : $Zimmertyp->Preis;
    ?>
    <p style="margin:5px 0; font-size:1.1em; color:#007;">
        <?=number_format($preis, 2, ',', '.')?> € / Nacht
    </p>
</div>
<?php endif; ?>

<form id="form_Buchung" method="post" action="?task=Buchung_new" data-ajax="false">
    <input type="hidden" name="_Zimmertyp" value="<?=(int)$zimmertyp_id?>" />

    <h3>Reisezeitraum</h3>
    <div class="ui-field-contain">
        <label for="checkin">Check-in Datum:</label>
        <input type="date" id="checkin" name="checkin"
               value="<?=htmlspecialchars($checkin)?>" required />

        <label for="checkout">Check-out Datum:</label>
        <input type="date" id="checkout" name="checkout"
               value="<?=htmlspecialchars($checkout)?>" required />

        <label for="AnzahlGaeste">Anzahl Gäste:</label>
        <input type="number" id="AnzahlGaeste" name="AnzahlGaeste"
               value="<?=(int)$anzahl_gaeste?>" min="1" max="20" required />
    </div>

    <h3>Ihre Daten (Hauptgast)</h3>
    <div class="ui-field-contain">
        <label for="Vorname">Vorname:</label>
        <input type="text" id="Vorname" name="Vorname" required />

        <label for="Nachname">Nachname:</label>
        <input type="text" id="Nachname" name="Nachname" required />

        <label for="Email">E-Mail:</label>
        <input type="email" id="Email" name="Email" required />

        <label for="Geburtsdatum">Geburtsdatum:</label>
        <input type="date" id="Geburtsdatum" name="Geburtsdatum" required />

        <label for="Personalausweisnrummer">Personalausweisnummer:</label>
        <input type="text" id="Personalausweisnrummer" name="Personalausweisnrummer"
               placeholder="Nur für interne Zwecke – keine echten Daten!" required />
    </div>

    <h3>Mitgäste</h3>
    <div id="mitgaeste_container">
        <p id="mitgaeste_hinweis" style="color:#888;">
            Geben Sie oben die Anzahl der Gäste ein – danach erscheinen die Mitgast-Felder.
        </p>
    </div>

    <h3>Zahlung</h3>
    <div class="ui-field-contain">
        <label for="Zahlungsart">Zahlungsart:</label>
        <select id="Zahlungsart" name="Zahlungsart" required>
            <option value="">– bitte wählen –</option>
            <?php if (is_array($ZahlungsartT)): ?>
                <?php foreach ($ZahlungsartT as $za): ?>
                    <option value="<?=$za->id?>"><?=htmlspecialchars($za->literal)?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <div style="background:#fffde7; border:1px solid #f9a825; padding:10px; border-radius:4px; margin:10px 0;">
        <strong>Hinweis:</strong> Die Zahlung ist eine Simulation und wird nicht real verarbeitet.
    </div>

    <button type="submit" name="buchen" value="1"
            class="ui-btn ui-btn-b ui-icon-check ui-btn-icon-left"
            style="margin-top:15px;">
        Jetzt verbindlich buchen
    </button>
</form>

<script>
// Mitgast-Felder dynamisch anzeigen basierend auf Gästeanzahl
document.getElementById("AnzahlGaeste").addEventListener("change", function() {
    var anzahl = parseInt(this.value) - 1;
    var container = document.getElementById("mitgaeste_container");
    var hinweis   = document.getElementById("mitgaeste_hinweis");
    container.innerHTML = "";
    if (anzahl <= 0) {
        hinweis && container.appendChild(document.createTextNode("Keine Mitgäste."));
        return;
    }
    for (var i = 1; i <= anzahl; i++) {
        var html  = '<fieldset class="ui-grid-a" style="margin-bottom:10px;border:1px solid #ddd;padding:8px;border-radius:4px;">';
        html += '<legend><strong>Mitgast ' + i + '</strong></legend>';
        html += '<div class="ui-field-contain"><label>Vorname:</label><input type="text" name="mg_Vorname_' + i + '" /></div>';
        html += '<div class="ui-field-contain"><label>Nachname:</label><input type="text" name="mg_Nachname_' + i + '" /></div>';
        html += '<div class="ui-field-contain"><label>Geburtsdatum:</label><input type="date" name="mg_Geburtsdatum_' + i + '" /></div>';
        html += '<div class="ui-field-contain"><label>Personalausweisnr.:</label><input type="text" name="mg_Personalausweisnr_' + i + '" placeholder="Keine echten Daten!" /></div>';
        html += '</fieldset>';
        var div = document.createElement("div");
        div.innerHTML = html;
        container.appendChild(div);
    }
});
// Beim Laden Felder direkt rendern falls Anzahl gesetzt
if (parseInt(document.getElementById("AnzahlGaeste").value) > 1) {
    document.getElementById("AnzahlGaeste").dispatchEvent(new Event("change"));
}
</script>
