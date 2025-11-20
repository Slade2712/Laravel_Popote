<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuration SMTP pour Mailpit
    $mail->isSMTP();
    $mail->Host = 'mailpit';   // nom du conteneur Mailpit dans le réseau Docker
    $mail->Port = 1025;        // port SMTP exposé
    $mail->SMTPAutoTLS = false; // pas de TLS pour Mailpit

    // Expéditeur et destinataire
    $mail->setFrom('no-reply@localhost.com', 'Herd Test');
    $mail->addAddress('elie.uzan@yahoo.fr');

    // Contenu du mail
    $mail->Subject = 'Test Mail Herd via SMTP';
    $mail->Body    = 'Hello, ceci est un test depuis PHP vers Mailpit !';

    // Envoi du mail
    $mail->send();
    echo "Mail envoyé avec succès via SMTP !";
} catch (Exception $e) {
    echo "Erreur SMTP : {$mail->ErrorInfo}";
}
