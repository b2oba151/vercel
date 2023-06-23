<?php

namespace App\Models;

use App\Models\User;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Variation
 *
 * @property int $id
 * @property string $avant
 * @property string $apres
 * @property string $variation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VariationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Variation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variation search(string $search)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation searchLatestPaginated(string $search, int $paginationQuantity = 10)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereApres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereAvant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variation whereVariation($value)
 * @mixin \Eloquent
 */
class Variation extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['avant', 'apres', 'variation','user_id'];

    protected $searchableFields = ['*'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
