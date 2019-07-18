<?php

namespace Modules\Store\Entities;

use Greabock\Tentacles\EloquentTentacle;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use UsesTenantConnection, EloquentTentacle;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store__stores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'domain', 'description', 'web_site'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'null'
    ];

    /**
     * The attributes that should be translate for arrays.
     *
     * @var array
     */
    public $translatable = [
        'null'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'domain' => 'string',
        'description' => 'string',
        'web_site' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
