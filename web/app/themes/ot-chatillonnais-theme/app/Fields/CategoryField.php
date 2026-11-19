<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class CategoryField extends Field
{
    private const COLORS = [
        'red' => 'Rouge',
        'blue' => 'Bleu',
        'green' => 'Vert',
        'purple' => 'Violet'
    ];

    public function fields(): array
    {
        $fields = Builder::make('category_field');

        $fields
            ->setLocation('taxonomy', '==', 'category');

        $fields
            ->addSelect('color', [
                'label' => 'Couleur',
                'choices' => self::COLORS
            ])
            ->addTextarea('icon', [
                'label' => 'Icon',
                'instructions' => 'Code svg d\'une icône utilisant currentColor',
            ])
        ;

        return $fields->build();
    }
}
