<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menu
 * @package App\Models
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_mst_menu';

    public function parent()
    {
        return $this->belongsTo(Menu::class,'parent_id')->where('parent_id',0)->with('parent');
    }

    public function children()
    {
        return $this->hasMany(Menu::class,'parent_id')->with('children');
    }
}
