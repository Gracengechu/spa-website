<?php
class Layouts {
    // HEADER
    public function header($conf) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>{$conf['title']}</title>
            <link rel='stylesheet' href='/Pro/styles.css'>
        </head>
        <body>
        <header>
            {$conf['title']}
        </header>
        ";
    }

    // NAVIGATION BAR
    public function navbar($conf) {
        echo "
        <nav>
            <a href='index.php'>Home</a>
            <a href='about.php'>About</a>
            <a href='services.php'>Services</a>
            <a href='gallery.php'>Gallery</a>
            <a href='appointments.php'>Appointments</a>
            <a href='contact.php'>Contact</a>
            <a href='login.php'>Login</a>
        </nav>
        ";
    }

    // BANNER / HERO SECTION
    public function banner($conf) {
        $tagline = $conf['tagline'] ?? 'Relax, Refresh & Rejuvenate';
        echo "
        <section>
            <h1>Welcome to {$conf['title']}</h1>
            <p>{$tagline}</p>
        </section>
        ";
    }

    // MAIN CONTENT
    public function content($conf) {
        echo "
        <main>
            <h2>Our Services</h2>
            <p>Discover our wide range of wellness treatments, from relaxing massages and facials 
               to holistic spa therapies designed to restore your body and mind.</p>

            <h2>Special Offers</h2>
            <p>Join our membership program and enjoy exclusive discounts, priority bookings, 
               and personalized wellness recommendations.</p>
        </main>
        ";
    }

    // FOOTER
    public function footer($conf) {
        echo "
        <footer>
            &copy; " . date("Y") . " {$conf['title']} — All Rights Reserved
        </footer>
        </body>
        </html>
        ";
    }
}
?>
