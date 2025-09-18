<?php
require_once __DIR__ . '/ClassAutoLoad.php';

// Configuration (site settings)
$conf = [
    "title" => "Spa & Wellness Center",
    "tagline" => "Relax, Refresh & Rejuvenate"
];

// Create Layouts object
$layouts = new Layouts();

// Build the page in order
$layouts->header($conf);   // Includes HTML <head> + CSS link
$layouts->navbar($conf);   // Navigation menu
$layouts->banner($conf);   // Banner/hero section
$layouts->content($conf);  // Main content
$layouts->footer($conf);   // Footer + closes </body></html>
?>
