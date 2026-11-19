<?php

namespace App\View\Composers;

use Log1x\Navi\Navi;
use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.header',
    ];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        $navigation = Navi::make()->build('primary_navigation');

        $items = $navigation->all();

        $this->addAcfValues($items);

        return [
            'primaryNavigation' => $items,
            'primaryNavigationName' => $navigation->get('name', __('Navigation principale', 'ot-chatillonnais')),
        ];
    }

    /**
     * Fonction récursive qui ajoute aux items de menu les valeurs des champs ACF
     */
    private function addAcfValues($items)
    {
        foreach ($items as $item)
        {
            $item->isGroup = (bool) get_field('is_group', $item->id);
            $item->useLabel = (bool) get_field('has_label', $item->id);
            $item->isSticker = (bool) get_field('is_sticker', $item->id);

            if (! empty($item->children))
                $this->addAcfValues($item->children);
        }
    }
}
