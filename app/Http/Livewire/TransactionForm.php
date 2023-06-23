<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TransactionForm extends Component
{
    public $envoye;
    public $recu;
    public $frais;
    public $taux;
    public $charges;

    public function mount()
    {
        $this->envoye = (auth()->user()->location === 'maroc') ? 400 : 20000;
        $this->frais = (auth()->user()->location === 'maroc') ? 45 : 1000;
        $this->taux = (auth()->user()->location === 'mali') ? 62.5 : 60.5;
        $this->recu = $this->calculateRecu();
    }

    public function render()
    {
        return view('livewire.transaction-form');
    }

    public function updated($field)
    {
        if ($field === 'envoye' || $field === 'frais' || $field === 'taux') {
            sleep(0.5); // Pause de 2 secondes

            $this->envoye = floatval($this->envoye);
            $this->frais = floatval($this->frais);
            $this->taux = floatval($this->taux);

            $this->recu = $this->calculateRecu();
        } elseif ($field === 'recu') {
            sleep(0.5); // Pause de 2 secondes

            $this->recu = floatval($this->recu);

            if (auth()->user()->location === 'mali') {
                if ($this->taux != 0) {
                    $this->envoye = ($this->recu * $this->taux) + $this->frais;
                } else {
                    $this->envoye = 0;
                }
            } elseif (auth()->user()->location === 'maroc') {
                if ($this->taux != 0) {
                    $this->envoye = ($this->recu / $this->taux) + $this->frais;
                } else {
                    $this->envoye = 0;
                }
            }
        }
    }

    private function calculateRecu()
    {
        if (auth()->user()->location === 'mali') {
            if ($this->taux != 0) {
                return ($this->envoye - $this->frais) / $this->taux;
            } else {
                return 0;
            }
        } elseif (auth()->user()->location === 'maroc') {
            if ($this->taux != 0) {
                return ($this->envoye - $this->frais) * $this->taux;
            } else {
                return 0;
            }
        }
    }
}
