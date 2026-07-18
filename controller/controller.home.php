<?php
Core::$title = "Wingbooking";
Core::setView("home", "view1");

$istHotelier = isset(Core::$user->Gruppe_literal)
    && strcasecmp((string) Core::$user->Gruppe_literal, "Hotelier") === 0;
Core::publish($istHotelier, "istHotelier");
