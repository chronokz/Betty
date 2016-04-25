<?php

namespace Modules\Main\Composers;

use Illuminate\View\View;
use Modules\Social\Database\Models\SocialLink;

class ConfigComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $config = [];
        foreach(\Modules\Config\Database\Models\Config::all() as $item)
        {
            $config[$item->name] = $item->value;
        }
        $view->with('config', $config);

        $links = SocialLink::orderBy('position')
            ->get();
        $view->with('social_links', $links);

    }
}