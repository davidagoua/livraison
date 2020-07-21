<?php

namespace App\Listeners;

use App\Helpers\SMSHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;



class LivraisonStateListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $livraison = $event->livraison;
        $livraison->livreur->dispo = false;


        switch ($livraison->status){
            case 0:
                $message = <<<Message
Salut Mr/Mme {$livraison->client->nom},

votre commande de livreur a été validé.
Nom du livreur: {$livraison->livreur->nom}
Contact : {$livraison->livreur->contact}
Merci !
Message;
                SMSHelper::send($livraison->client->contact, $message);
                $msg = <<<Message
Salut {$livraison->livreur->nom},

Nouvelle livraison pour toi.
Origine:
Mr/Mme {$livraison->client->nom}
{$livraison->client->commune->nom}
{$livraison->client->contact}
Destination:
Mr/Mme {$livraison->recepteur->nom}
{$livraison->recepteur->commune->nom}
{$livraison->recepteur->contact}

Merci !
Message;
                SMSHelper::send($livraison->livreur->contact, $msg);
                break;
            case 1:
                $message = <<<Message
Salut Mr/Mme {$livraison->recepteur->nom},

Votre colis a bien été receptionné par notre livreur.
Nom du livreur: {$livraison->livreur->nom}
Contact du livreur: {$livraison->livreur->contact}

Merci !
Message;

                SMSHelper::send($livraison->recepteur->contact, $message);
                break;
            case 2:
                $message = <<<Message
Salut Mr/Mme {$livraison->client->nom},

le colis vient d'être remis a Mr/Mme {$livraison->recepteur->nom}
Merci !
Message;
;
                SMSHelper::send($livraison->client->contact, $message);
                break;
            case 3:
                $livraison->livreur->dispo = true;
                break;
            default:
                break;
        }

        $message = "Client: {$livraison->client->nom}({$livraison->client->contact})";

        $livraison->livreur->save();
    }
}
