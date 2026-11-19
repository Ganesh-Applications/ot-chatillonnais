<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HeaderMenuItemField extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('header_menu_item_field');

        $fields
            ->setLocation('nav_menu_item', '==', 'location/primary_navigation');

        $fields
            //-- Sous-menu : un élément de 2e niveau peut regrouper des liens
            ->addTrueFalse('is_group', [
                'label' => 'Afficher comme un groupe',
                'instructions' => '(élément de 2e niveau seulement)',
                'ui' => true,
            ])
                ->conditional('is_sticker', '!=', '1')

            ->addTrueFalse('has_label', [
                'label' => 'Afficher le titre du groupe',
                'default_value' => 1,
                'ui' => true,
            ])
                ->conditional('is_group', '==', '1')

            //-- Afficher comme une étiquette
            ->addTrueFalse('is_sticker', [
                'label' => 'Afficher comme une étiquette',
                'ui' => true
            ])
                ->conditional('is_group', '!=', '1')
        ;

        return $fields->build();
    }
}
