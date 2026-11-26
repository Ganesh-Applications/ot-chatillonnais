<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class FooterBannerOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Bandeau contacts';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Bandeau contacts';

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
        $fields = Builder::make('footer_banner_options');

        $fields
            ->addImage('banner_image', [
                'label' => 'Image de fond',
                'return_format' => 'id',
                'preview_size' => 'medium',
            ])

            ->addText('banner_socials_title', [
                'label' => 'Titre des réseaux',
                'default_value' => 'Nos réseaux',
            ])
            ->addRepeater('banner_socials', [
                'label' => 'Réseaux sociaux',
                'button_label' => 'Ajouter un réseau',
                'layout' => 'table',
            ])
                ->addUrl('url', ['label' => 'URL', 'required' => true])
                ->addImage('icon', [
                    'label' => 'Icône',
                    'required' => true,
                    'return_format' => 'id',
                    'preview_size' => 'thumbnail',
                ])
            ->endRepeater()

            ->addText('banner_newsletter_title', [
                'label' => 'Titre de la newsletter',
                'default_value' => 'S’abonner à la newsletter',
            ])

            ->addText('banner_tagline', [
                'label' => 'Accroche',
                'default_value' => '#chatillonnais',
            ])
            ->addText('banner_title', [
                'label' => 'Titre',
                'default_value' => 'Suivez-nous',
            ]);

        return $fields->build();
    }
}
