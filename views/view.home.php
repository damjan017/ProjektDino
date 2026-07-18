<?php
$istHotelier = Core::import("istHotelier");
$reiseziele  = Core::import("reiseziele");
?>

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

<?php if (!empty($reiseziele)): ?>
<h3 style="margin-top:24px;">Beliebte Reiseziele</h3>
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
