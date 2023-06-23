<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $prenom
 * @property string $vers
 * @property string $envoye
 * @property string $recu
 * @property string $frais
 * @property string $taux
 * @property string $charges
 * @property string $statut
 * @property string $description
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\TransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction search(string $search)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction searchLatestPaginated(string $search, int $paginationQuantity = 10)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereEnvoye($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFrais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereRecu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTaux($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereVers($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'vers',
        'envoye',
        'recu',
        'frais',
        'taux',
        'charges',
        'statut',
        'description',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
