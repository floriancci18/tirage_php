<?php

// Interface pour définir les méthodes de paiement
interface Paiement
{
    public function effectuerPaiement($montant);
    public function annulerPaiement($id);
}

// Trait pour gérer l'enregistrement des paiements
trait EnregistrementPaiement
{
    private array $paiements = [];

    public function enregistrerPaiement($montant, $id)
    {
        $this->paiements[$id] = $montant;
    }

    public function afficherPaiements()
    {
        if (empty($this->paiements)) {
            echo "Aucun paiement enregistré.\n";
        } else {
            echo "Liste des paiements enregistrés :\n";
            foreach ($this->paiements as $id => $montant) {
                echo "ID: $id, Montant: $montant €\n";
            }
        }
    }
}

// Trait pour gérer les notifications
trait Notification
{
    public function envoyerNotification($message)
    {
        echo "Notification : $message\n";
    }
}

// Classe qui implémente l'interface Paiement et utilise les traits
class ServicePaiement implements Paiement
{
    use EnregistrementPaiement, Notification;

    private int $idCounter = 1;

    public function effectuerPaiement($montant)
    {
        if ($montant <= 0) {
            echo "Erreur : Le montant doit être supérieur à 0.\n";
            return;
        }

        $id = $this->idCounter++;
        $this->enregistrerPaiement($montant, $id);
        $this->envoyerNotification("Paiement de $montant € enregistré avec succès (ID: $id).");
    }

    public function annulerPaiement($id)
    {
        if (isset($this->paiements[$id])) {
            unset($this->paiements[$id]);
            $this->envoyerNotification("Le paiement avec l'ID $id a été annulé.");
        } else {
            echo "Erreur : Aucun paiement trouvé avec l'ID $id.\n";
        }
    }
}

// Programme principal pour exécution en ligne de commande
function afficherMenu()
{
    echo "\n=== Système de Paiement ===\n";
    echo "1. Effectuer un paiement\n";
    echo "2. Annuler un paiement\n";
    echo "3. Afficher tous les paiements\n";
    echo "4. Quitter\n";
    echo "Choisissez une option : ";
}

// Fonction principale
function main()
{
    $servicePaiement = new ServicePaiement();

    while (true) {
        afficherMenu();
        $choix = trim(fgets(STDIN));

        switch ($choix) {
            case 1:
                echo "Entrez le montant du paiement : ";
                $montant = trim(fgets(STDIN));
                $servicePaiement->effectuerPaiement((float)$montant);
                break;

            case 2:
                echo "Entrez l'ID du paiement à annuler : ";
                $id = trim(fgets(STDIN));
                $servicePaiement->annulerPaiement((int)$id);
                break;

            case 3:
                $servicePaiement->afficherPaiements();
                break;

            case 4:
                echo "Au revoir !\n";
                exit;

            default:
                echo "Option invalide. Veuillez réessayer.\n";
        }
    }
}

// Exécution du programme principal
main();
?>