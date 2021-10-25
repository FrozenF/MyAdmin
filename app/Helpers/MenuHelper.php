<?php
/**
 * Created By PHPSTORM
 * Name : Farih Nazihullah
 * Date : 19/10/2021 10:41
 *
 */

namespace App\Helpers;

use App\Models\Menu;

class MenuHelper
{
    public static function treeMenu()
    {
        return Menu::with('children')
            ->where('parent_id',null)->get();
    }
}
