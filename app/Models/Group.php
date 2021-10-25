<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Group
 * @package App\Models
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Group extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_mst_group';
}
