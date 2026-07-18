<?php
$istHotelier = Core::import("istHotelier");
$reiseziele  = Core::import("reiseziele");
$kennzahlen  = Core::import("kennzahlen");
?>

<div class="wb-page-wrap">

    <div class="wb-hero">
        <h1 class="wb-hero-title">Wingbooking</h1>
        <p class="wb-hero-subtitle">Unterkünfte in ganz Baden-Württemberg finden und direkt buchen.</p>
        <a href="?task=Zimmersuche" class="ui-btn ui-btn-b ui-icon-search ui-btn-icon-left wb-hero-btn" data-ajax="false">
            Jetzt Zimmer suchen
        </a>
    </div>

    <div class="wb-hero-links">
        <?php if ($istHotelier): ?>
            <a href="?task=Unterkunft" data-ajax="false">Meine Unterkünfte verwalten</a>
        <?php else: ?>
            <a href="?task=login" data-ajax="false">Als Hotelier anmelden</a>
        <?php endif; ?>
    </div>

    <?php if ($kennzahlen): ?>
    <div class="wb-stats-row">
        <div class="wb-stat">
            <span class="wb-stat-number"><?=(int) $kennzahlen->anzahlUnterkuenfte?></span>
            <span class="wb-stat-label">Unterkünfte</span>
        </div>
        <div class="wb-stat">
            <span class="wb-stat-number"><?=(int) $kennzahlen->anzahlStaedte?></span>
            <span class="wb-stat-label">Städte</span>
        </div>
        <div class="wb-stat">
            <span class="wb-stat-number"><?=(int) $kennzahlen->anzahlZimmertypen?></span>
            <span class="wb-stat-label">Zimmertypen</span>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($reiseziele)): ?>
    <h3 class="wb-section-title">Beliebte Reiseziele</h3>
    <div class="wb-destination-grid">
        <?php foreach ($reiseziele as $ziel): ?>
            <a class="wb-destination-card" data-ajax="false"
               href="?task=Zimmersuche&amp;suchbegriff=<?=urlencode($ziel->Ortschaft)?>">
                <img src="images/<?=htmlspecialchars($ziel->Bild)?>" alt="<?=htmlspecialchars($ziel->Ortschaft)?>" />
                <span class="wb-destination-name"><?=htmlspecialchars($ziel->Ortschaft)?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <h3 class="wb-section-title">So funktioniert's</h3>
    <div class="wb-steps-grid">
        <div class="wb-step">
            <div class="wb-step-number">1</div>
            <h4>Suchen</h4>
            <p>Ort, Zeitraum und Gästezahl eingeben – ganz ohne Konto.</p>
        </div>
        <div class="wb-step">
            <div class="wb-step-number">2</div>
            <h4>Vergleichen</h4>
            <p>Preise, Ausstattung und Bewertungen auf einen Blick vergleichen.</p>
        </div>
        <div class="wb-step">
            <div class="wb-step-number">3</div>
            <h4>Buchen</h4>
            <p>Daten eingeben, Zahlungsart wählen, sofort bestätigt bekommen.</p>
        </div>
    </div>

</div>
