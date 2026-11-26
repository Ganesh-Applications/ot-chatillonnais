<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class FooterOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Pied de page';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Pied de page';

    /**
     * The option page menu position.
     *
     * @var int
     */
    public $position = 0;

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('footer_options');

        $fields
            ->addFlexibleContent('contacts',[
                'Label' => 'Coordonnées',
                'button_label' => 'Ajouter'
            ])
                ->addLayout('simple_text', ['label' => 'Texte simple'])
                    ->addText('text', ['label' => 'Texte'])
                ->addLayout('link', ['label' => 'Lien'])
                    ->addLink('link', ['label' => 'Lien'])
            ->endFlexibleContent()

            ->addGoogleMap('address', [
                'label' => 'Adresse',
                'required' => true,
            ])

            ->addRepeater('partners', [
                'label' => 'Partenaires',
                'button_label' => 'Ajouter un partenaire',
            ])
                ->addText('name', ['label' => 'Nom'])
                ->addImage('logo', ['label' => 'Logo'])
            ->endRepeater();
        ;

        return $fields->build();
    }
}
