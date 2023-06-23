<thead>
    <tr>
        <th style="font-size:12px">Nom</th>
        <th style="font-size:12px">Prénom</th>
        <th style="font-size:12px">Direction</th>
        <th style="font-size:12px">Montant envoyé</th>
        <th style="font-size:12px">Montant réçu</th>
        <th style="font-size:12px">date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td style="font-size:13px">{{ $transaction->nom }}</td>
            <td style="font-size:13px">{{ $transaction->prenom }}</td>
            <td style="font-size:13px">Vers le {{ $transaction->vers }}</td>
            <td style="font-size:13px">{{ $transaction->envoye }} {{ $transaction->vers == 'mali' ? 'mad' : 'fcfa' }}</td>
            <td style="font-size:13px">{{ $transaction->recu }} {{ $transaction->vers == 'mali' ? 'mad' : 'fcfa' }}</td>
            <td style="font-size:13px">{{ $transaction->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
