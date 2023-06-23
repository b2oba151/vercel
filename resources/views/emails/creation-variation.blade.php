@component('mail::message')
# Nouvelle variation effectuée

Bonjour **{{ $recepteur_user->name.' '.$recepteur_user->firstname }}**, une variation vient d'etre effectuéé, Voici les details

@component('mail::table')
| Information | Valeur |
| ----------- | ------ |
| Compte avant  | {{ $variation->avant }} |
| Compte apres  | {{ $variation->apres }} |
| Motant varie de : | {{ $variation->variation }} |
@endcomponent



Vous pouvez consulter la variation en suivant le lien ci-dessous :
@component('mail::button', ['url' => $url])
Consulter la Variation
@endcomponent

Merci,<br>
IBOK
@endcomponent
