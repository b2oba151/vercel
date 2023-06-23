<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Events\NewTransactionEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Events\DeleteTransactionEvent;
use App\Events\UpdateTransactionEvent;
use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Transaction::class);

        $search = $request->get('search', '');

        $transactions = Transaction::All();

        return view(
            'app.transactions.index',
            compact('transactions', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Transaction::class);

        $users = User::pluck('name', 'id');

        return view('app.transactions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            ->route('transactions.edit',$transaction)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Transaction $transaction): View
    {
        $this->authorize('view', $transaction);

        return view('app.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Transaction $transaction): View
    {
        $this->authorize('update', $transaction);

        $users = User::pluck('name', 'id');

        return view('app.transactions.edit', compact('transaction', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TransactionUpdateRequest $request,
        Transaction $transaction
    ): RedirectResponse {
        $this->authorize('update', $transaction);
        $transaction_old = Transaction::find($transaction->id);
        $transaction_oldd = $transaction;
        $nom_old=$transaction_oldd->nom ;
        $prenom_old=$transaction_oldd->prenom ;
        $envoye_old=$transaction_oldd->envoye ;
        $recu_old=$transaction_oldd->recu ;
        $frais_old=$transaction_oldd->frais ;
        $taux_old=$transaction_oldd->taux ;
        $charges_old=$transaction_oldd->charges ?? 0 ;
        $vers_old=$transaction_oldd->vers ;


        if($vers_old == "mali"){
                        $user_recep = User::where('location','mali')->first();
                            $new_compte_recepteur=$user_recep->compte+$recu_old;

                        $user_env = User::where('location','maroc')->first();
                            $new_compte_envoyeur=$user_env->compte-($envoye_old+$charges_old);
                            // $test=$envoye_old+$charges_old;
                            //             dd($recu_old,$user_recep_old,$new_compte_recepteur,$test,$user_env_old,$new_compte_envoyeur);

                        $user_recep->update(['compte'=>$new_compte_recepteur]);
                        $user_env->update(['compte'=>$new_compte_envoyeur]);
                }elseif($vers_old == "maroc"){
                    $user_recep = User::where('location','maroc')->first();
                    $new_compte_recepteur=$user_recep->compte+$recu_old;

                $user_env = User::where('location','mali')->first();
                    $new_compte_envoyeur=$user_env->compte-($envoye_old+$charges_old);
                    //dd($new_compte_envoyeur);
                    // $test=$envoye_old+$charges_old;
                    //             dd($recu_old,$user_recep_old,$new_compte_recepteur,$test,$user_env_old,$new_compte_envoyeur);

                $user_recep->update(['compte'=>$new_compte_recepteur]);
                $user_env->update(['compte'=>$new_compte_envoyeur]);
                }


/////////////////////////////////
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

        $transaction->update($validated);

        event(new UpdateTransactionEvent($transaction,$transaction_old));

        return redirect()
            ->route('transactions.edit', $transaction)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Transaction $transaction
    ): RedirectResponse {
        $this->authorize('delete', $transaction);

        $nom=$transaction->nom ;
        $prenom=$transaction->prenom ;
        $envoye=$transaction->envoye ;
        $recu=$transaction->recu ;
        $frais=$transaction->frais ;
        $taux=$transaction->taux ;
        $charges=$transaction->charges ?? 0 ;
        $vers=$transaction->vers ;

        if($vers == "mali"){
                $user_recep = User::where('location','mali')->first();
                    $new_compte_recepteur=$user_recep->compte+$recu;

                $user_env = User::where('location','maroc')->first();
                    $new_compte_envoyeur=$user_env->compte-($envoye+$charges);
                    // $test=$envoye+$charges;
                    //             dd($recu,$user_recep->compte,$new_compte_recepteur,$test,$user_env->compte,$new_compte_envoyeur);

                $user_recep->update(['compte'=>$new_compte_recepteur]);
                $user_env->update(['compte'=>$new_compte_envoyeur]);
        }elseif($vers == "maroc"){
            $user_recep = User::where('location','maroc')->first();
            $new_compte_recepteur=$user_recep->compte+$recu;

        $user_env = User::where('location','mali')->first();
            $new_compte_envoyeur=$user_env->compte-($envoye+$charges);
            // $test=$envoye+$charges;
            //             dd($recu,$user_recep->compte,$new_compte_recepteur,$test,$user_env->compte,$new_compte_envoyeur);

        $user_recep->update(['compte'=>$new_compte_recepteur]);
        $user_env->update(['compte'=>$new_compte_envoyeur]);
        }


        event(new DeleteTransactionEvent($transaction));
        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
