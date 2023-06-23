<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Transaction;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserTransactionsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public User $user;
    public Transaction $transaction;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Transaction';

    protected $rules = [
        'transaction.vers' => ['required', 'in:mali,maroc'],
        'transaction.prenom' => ['nullable', 'max:255', 'string'],
        'transaction.envoye' => ['required', 'numeric'],
        'transaction.nom' => ['nullable', 'max:255', 'string'],
        'transaction.recu' => ['nullable', 'numeric'],
        'transaction.frais' => ['required', 'numeric'],
        'transaction.taux' => ['required', 'numeric'],
        'transaction.charges' => ['nullable', 'numeric'],
        'transaction.statut' => ['nullable', 'in:effectue,attente,annulle'],
        'transaction.description' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->resetTransactionData();
    }

    public function resetTransactionData(): void
    {
        $this->transaction = new Transaction();

        $this->transaction->vers = 'mali';
        $this->transaction->statut = 'effectue';

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTransaction(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_transactions.new_title');
        $this->resetTransactionData();

        $this->showModal();
    }

    public function editTransaction(Transaction $transaction): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_transactions.edit_title');
        $this->transaction = $transaction;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->transaction->user_id) {
            $this->authorize('create', Transaction::class);

            $this->transaction->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->transaction);
        }

        $this->transaction->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Transaction::class);

        Transaction::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTransactionData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->transactions as $transaction) {
            array_push($this->selected, $transaction->id);
        }
    }

    public function render(): View
    {
        return view('livewire.user-transactions-detail', [
            'transactions' => $this->user->transactions()->paginate(20),
        ]);
    }
}
