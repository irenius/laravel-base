<?php

namespace Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * Infrastructure\Model\BaseEntity
 *
 * A base entity for all database entities. Note that User does not inherit from this class since it must inherit from Authenticable.
 */
abstract class BaseModel extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = (string) Uuid::uuid4();
        });
    }
}
