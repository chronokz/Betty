<?php

namespace Modules\Main\Composers;

use Illuminate\View\View;
use Modules\Menu\Database\Models\Menu;
use Modules\Social\Database\Models\SocialLink;

class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = Menu::wherePublic(1)
            ->where('parent_id', 0)
            ->orderBy('position')
            ->get();

        $view->with('menu', $menu);
    }
}