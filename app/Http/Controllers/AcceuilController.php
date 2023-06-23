<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Events\NewTransactionEvent;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TransactionStoreRequest;

class AcceuilController extends Controller
{
    public function index()
    {

        $users = User::pluck('name', 'id');
        $transactions = Transaction::latest()->take(5)->get();

        return view('welcome', compact('users','transactions'));
    }

public function store(TransactionStoreRequest $request): RedirectResponse
{
    $this->authorize('create', Transaction::class);

    $validated = $request->validated();

    $envoyer = $validated['envoye'];
    $recu = $validated['recu'];
    $frais = $validated['frais'];
    $taux = $validated['taux'];
    $charges = $validated['charges'] ?? 0;

    if ($validated['vers'] === 'mali') {
        $montant_moins_charge = $envoyer - $charges;
        $recu =($envoyer -$frais )* $taux;
        $envoyeur = User::where('location', 'maroc')->first();
        $receveur = User::where('location', 'mali')->first();
        $e = $envoyeur->compte + $montant_moins_charge;
        $r = $receveur->compte - $recu;
       // dd($envoyeur->compte,$e,$receveur->compte ,$r );
    } elseif ($validated['vers'] === 'maroc') {
        $montant_moins_charge = $envoyer - $charges;
        $recu = ($envoyer -$frais )/ $taux;
        $envoyeur = User::where('location', 'mali')->first();
        $receveur = User::where('location', 'maroc')->first();
        $e = $envoyeur->compte + $montant_moins_charge;
        $r = $receveur->compte - $recu;
        //dd($envoyeur->compte,$e,$receveur->compte ,$r );
    }



    $envoyeur->update(['compte' => $e]);
    $receveur->update(['compte' => $r]);

    $validated['recu'] = $recu;
    $validated['user_id'] = Auth()->user()->id;
//dd($montant_moins_charge);
    $transaction = Transaction::create($validated);



    event(new NewTransactionEvent($transaction));
    return redirect()
        ->route('home', $transaction)
        ->withSuccess(__('crud.common.created'));
}



    public function transactions(Request $request): View
    {


        $search = $request->get('search', '');

        $transactions = Transaction::All();

        return view(
            'transactions',
            compact('transactions', 'search')
        );
    }
}
