<?php
class Layouts {
    public function header($conf) {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>{$conf['title']}</title>
            <link rel='stylesheet' href='style.css'>
        </head>
        <body>
        <header>
            <h1>{$conf['title']}</h1>
            <p>{$conf['tagline']}</p>
        </header>";
    }

    public function navbar($conf) {
        echo "<nav>
            <a href='index.php'>Home</a> |
            <a href='register.php'>Register</a> |
            <a href='login.php'>Login</a>
        </nav>";
    }

    public function banner($conf) {
        echo "<section class='banner'>
            <h2>Welcome to {$conf['title']}</h2>
        </section>";
    }

    public function content($conf) {
        echo "<main>
            <p>This is the main content area.</p>
        </main>";
    }

    public function footer($conf) {
        echo "<footer>
            <p>&copy; " . date('Y') . " {$conf['title']}. All rights reserved.</p>
        </footer>
        </body>
        </html>";
    }
}
