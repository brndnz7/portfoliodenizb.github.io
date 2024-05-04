<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse e-mail n'est pas valide.";
        exit; // Arrêter l'exécution du script
    }

    // Adresse e-mail où envoyer le message
    $destinataire = "nrb5867@gmail.com"; // Remplacez par votre adresse e-mail

    // Sujet du message
    $sujet = "Nouveau message depuis le formulaire de contact";

    // Construction du corps du message
    $contenu = "Nom: $name\n";
    $contenu .= "Email: $email\n";
    $contenu .= "Sujet: $subject\n";
    $contenu .= "Message:\n$message";

    // Envoi du message
    if (mail($destinataire, $sujet, $contenu)) {
        echo "Votre message a bien été envoyé.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>
