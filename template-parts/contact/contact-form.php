<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    $consent = isset($_POST['consent']) ? 'Yes' : 'No';

    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission';
    $headers = 'From: ' . $email;

    $body = "Name: $name\nEmail: $email\nMessage: $message\nConsent: $consent";

    wp_mail($to, $subject, $body, $headers);

    echo '<p>Thank you for your message!</p>';
}
?>

<div class="contact-form-section">
    <form method="post" action="">
        <input type="text" id="name" name="name" placeholder="Twoje imię" required>
        <input type="email" id="email" name="email" placeholder="Twój adres e-mail" required>
        <input type="text" id="temat" name="temat" placeholder="Temat wiadomości" required>
        <textarea id="message" name="message" placeholder="Twoja wiadomość" required></textarea>

        <div class="form-actions">
            <label for="consent">
                <input type="checkbox" id="consent" name="consent">
                <p>Wyrażam zgodę na <br/><span>przetwarzanie moich danych.
                </span></p>
            </label>
            <input type="submit" value="Wyślij" class="custom-button">
        </div>
    </form>
</div>