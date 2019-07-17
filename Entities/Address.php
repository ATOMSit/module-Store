<?php

namespace Modules\Store\Entities;

use Greabock\Tentacles\EloquentTentacle;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use UsesTenantConnection, EloquentTentacle;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store__addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_code', 'street', 'state', 'city', 'postal_code', 'latitude', 'longitude'
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
        'country_code' => 'string',
        'street' => 'string',
        'state' => 'string',
        'city' => 'boolean',
        'postal_code' => 'boolean',
        'latitude' => 'decimal',
        'longitude' => 'decimal',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
