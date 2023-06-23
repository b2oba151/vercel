@component('mail::message')
# Nouvelle transaction effectuée

Bonjour **{{ $recepteur_user->name.' '.$recepteur_user->firstname }}**, une transaction vient d'etre effectuéé, Voici les details

@component('mail::table')
| Information | Valeur |
| ----------- | ------ |
| Nom et prenom de la personne | {{ $transaction->nom.' '.$transaction->prenom  }} |
| Motant envoyée | {{ $transaction->envoye }} |
| Motant qui doit etre donne | {{ $transaction->recu }} |
| Le frais du transfert | {{ $transaction->frais }} |
| Le taux du transfert | {{ $transaction->taux }} |
@endcomponent

La description de la transaction est la suivante :
{{ $transaction->description ?? '-' }}


Vous pouvez consulter la transaction en suivant le lien ci-dessous :
@component('mail::button', ['url' => $url])
Consulter la Transaction
@endcomponent

Merci,<br>
IBOK
@endcomponent
