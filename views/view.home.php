<?php
$istHotelier = Core::import("istHotelier");
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
