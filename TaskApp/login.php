<?php
require_once __DIR__ . '/ClassAutoLoad.php';

$conf = [
    "title" => "Spa & Wellness Center",
    "tagline" => "Relax, Refresh & Rejuvenate"
];

$layouts = new Layouts();

$layouts->header($conf);
$layouts->navbar($conf);
?>

<main>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</main>

<?php
$layouts->footer($conf);
?>
