<?php
// Whitelist für gültige Tasks
Core::setTaskMap(array(
// --- Kunde ---
'Kunde'                   => 'controller.Kunde_overview.php',
'Kunde_new'               => 'controller.Kunde_new.php',
'Kunde_detail'            => 'controller.Kunde_detail.php',
'Kunde_edit'              => 'controller.Kunde_edit.php',
'Kunde_delete'            => 'controller.Kunde_delete.php',
'Kunde_handle_Buchung_b'  => 'controller.Kunde_handle_Buchung_b.php',

// --- Hotelier ---
'Hotelier'                => 'controller.Hotelier_overview.php',
'Hotelier_new'            => 'controller.Hotelier_new.php',
'Hotelier_detail'         => 'controller.Hotelier_detail.php',
'Hotelier_edit'           => 'controller.Hotelier_edit.php',
'Hotelier_delete'         => 'controller.Hotelier_delete.php',

// --- Adresse ---
'Adresse'                 => 'controller.Adresse_overview.php',
'Adresse_new'             => 'controller.Adresse_new.php',
'Adresse_detail'          => 'controller.Adresse_detail.php',
'Adresse_edit'            => 'controller.Adresse_edit.php',
'Adresse_delete'          => 'controller.Adresse_delete.php',

// --- Unterkunft ---
'Unterkunft'              => 'controller.Unterkunft_overview.php',
'Unterkunft_new'          => 'controller.Unterkunft_new.php',
'Unterkunft_detail'       => 'controller.Unterkunft_detail.php',
'Unterkunft_edit'         => 'controller.Unterkunft_edit.php',
'Unterkunft_delete'       => 'controller.Unterkunft_delete.php',

// --- Zimmertyp ---
'Zimmertyp'               => 'controller.Zimmertyp_overview.php',
'Zimmertyp_new'           => 'controller.Zimmertyp_new.php',
'Zimmertyp_detail'        => 'controller.Zimmertyp_detail.php',
'Zimmertyp_edit'          => 'controller.Zimmertyp_edit.php',
'Zimmertyp_delete'        => 'controller.Zimmertyp_delete.php',

// --- Buchung ---
'Buchung'                 => 'controller.Buchung_overview.php',
'Buchung_new'             => 'controller.Buchung_new.php',
'Buchung_detail'          => 'controller.Buchung_detail.php',
'Buchung_edit'            => 'controller.Buchung_edit.php',
'Buchung_delete'          => 'controller.Buchung_delete.php',
'Buchung_bestaetigung'    => 'controller.Buchung_bestaetigung.php',

// --- Mitgast ---
'Mitgast'                 => 'controller.Mitgast_overview.php',
'Mitgast_new'             => 'controller.Mitgast_new.php',
'Mitgast_detail'          => 'controller.Mitgast_detail.php',
'Mitgast_edit'            => 'controller.Mitgast_edit.php',
'Mitgast_delete'          => 'controller.Mitgast_delete.php',

// --- Ausstattung ---
'Ausstattung'             => 'controller.Ausstattung_overview.php',
'Ausstattung_new'         => 'controller.Ausstattung_new.php',
'Ausstattung_detail'      => 'controller.Ausstattung_detail.php',
'Ausstattung_edit'        => 'controller.Ausstattung_edit.php',
'Ausstattung_delete'      => 'controller.Ausstattung_delete.php',

// --- Gast-Workflow ---
'Zimmersuche'             => 'controller.Zimmersuche.php',

// --- Enumerationen ---
'GruppeT'                    => 'controller.GruppeT_overview.php',
'GruppeT_new'                => 'controller.GruppeT_new.php',
'GruppeT_edit'               => 'controller.GruppeT_edit.php',
'GruppeT_delete'             => 'controller.GruppeT_delete.php',
'StatusT'                    => 'controller.StatusT_overview.php',
'StatusT_new'                => 'controller.StatusT_new.php',
'StatusT_edit'               => 'controller.StatusT_edit.php',
'StatusT_delete'             => 'controller.StatusT_delete.php',
'ZahlungsartT'               => 'controller.ZahlungsartT_overview.php',
'ZahlungsartT_new'           => 'controller.ZahlungsartT_new.php',
'ZahlungsartT_edit'          => 'controller.ZahlungsartT_edit.php',
'ZahlungsartT_delete'        => 'controller.ZahlungsartT_delete.php',
'ZimmertypT'                 => 'controller.ZimmertypT_overview.php',
'ZimmertypT_new'             => 'controller.ZimmertypT_new.php',
'ZimmertypT_edit'            => 'controller.ZimmertypT_edit.php',
'ZimmertypT_delete'          => 'controller.ZimmertypT_delete.php',
'UnterkunftsartT'            => 'controller.UnterkunftsartT_overview.php',
'UnterkunftsartT_new'        => 'controller.UnterkunftsartT_new.php',
'UnterkunftsartT_edit'       => 'controller.UnterkunftsartT_edit.php',
'UnterkunftsartT_delete'     => 'controller.UnterkunftsartT_delete.php',
'AusstattungskategorieT'     => 'controller.AusstattungskategorieT_overview.php',
'AusstattungskategorieT_new' => 'controller.AusstattungskategorieT_new.php',
'AusstattungskategorieT_edit'=> 'controller.AusstattungskategorieT_edit.php',
'AusstattungskategorieT_delete'=>'controller.AusstattungskategorieT_delete.php',

// --- System ---
'dashboard'               => 'controller.dashboard.php',
'error'                   => 'controller.error.php',
'login'                   => 'controller.entry.php',
'logout'                  => 'controller.logout.php',
'user_edit'               => 'controller.user_edit.php',
'home'                    => 'controller.home.php',
'favoriten'               => 'controller.favoriten.php',
'speicherstand_delete'    => 'controller.speicherstand_delete.php',
'speicherstand_edit'      => 'controller.speicherstand_edit.php',
'speicherstand_upload'    => 'controller.speicherstand_upload.php',
'speicherstande'          => 'controller.speicherstande_overview.php',
'datenimport'             => 'controller.datenimport.php',
'datenexport'             => 'controller.datenexport.php',
));
