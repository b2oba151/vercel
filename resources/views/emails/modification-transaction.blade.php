@component('mail::message')
# La transaction a été modifiée

Bonjour **{{ $recepteur_user->name.' '.$recepteur_user->firstname }}**,une transaction vient d'etre modifiée, Voici les nouvelles details

@component('mail::table')
| Information | Valeur |
| ----------- | ------ |
| Nom et prenom de la personne | {{ $transaction->nom.' '.$transaction->prenom  }} |
| Motant envoyée | {{ $transaction->envoye }} |
| Motant qui doit etre donne | {{ $transaction->recu }} |
| Le frais du transfert | {{ $transaction->frais }} |
| Le taux du transfert | {{ $transaction->taux }} |
@endcomponent

La description de la transaction est la suivante :<br/>
{{ $transaction->description ?? '-' }}


<hr/>

 **Avant la modification :**
 @component('mail::table')
| Information | Valeur |
| ----------- | ------ |
| Nom et prenom de la personne | {{ $transaction_old->nom.' '.$transaction_old->prenom  }} |
| Motant envoyée | {{ $transaction_old->envoye }} |
| Motant qui doit etre donne | {{ $transaction_old->recu }} |
| Le frais du transfert | {{ $transaction_old->frais }} |
| Le taux du transfert | {{ $transaction_old->taux }} |
@endcomponent
Vous pouvez consulter la transaction en suivant le lien ci-dessous :
@component('mail::button', ['url' => $url])
Consulter la Transaction
@endcomponent

Merci,<br>
IBOK
@endcomponent
