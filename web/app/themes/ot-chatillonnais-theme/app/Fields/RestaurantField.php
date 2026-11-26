<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class RestaurantField extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('restaurant_field');

        $fields
            ->setLocation('post_type', '==', 'restaurant');

        $fields
            ->addText('name', [
                'label' => 'Nom',
                'required' => true,
                'tourinsoft_path' => 'SyndicObjectName',
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'tourinsoft_path' => 'DESCRIPTIFs.0.Descriptioncommerciale',
            ])

            ->addTaxonomy('category', [
                'label' => 'Catégorie',
                'taxonomy' => 'category',
                'field_type' => 'select',
                'save_terms' => 1,
                'tourinsoft_path' => 'RUBRIQUESITE',
            ])


            ->addTaxonomy('equipments', [
                'label' => 'Équipements',
                'taxonomy' => 'equipment',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'EQUIPEMENTSs',
            ])

            ->addTaxonomy('labels', [
                'label' => 'Labels',
                'taxonomy' => 'label',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'LABELSs',
            ])

            ->addTaxonomy('restaurant_type', [
                'label' => 'Type de restauration',
                'taxonomy' => 'restaurant_type',
                'field_type' => 'select',
                'allow_null' => 1,
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'TYPERESTAURATIONs.0.Typederestauration',
            ])
            ->addTaxonomy('restaurant_categories', [
                'label' => 'Catégories de restaurant',
                'taxonomy' => 'restaurant_category',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'TYPERESTAURATIONs.0.Categoriederestaurant',
            ])
            ->addTaxonomy('culinary_specialties', [
                'label' => 'Spécialités culinaires',
                'taxonomy' => 'culinary_specialty',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'TYPERESTAURATIONs.0.Specialitesculinaires',
            ])

            ->addTaxonomy('restaurant_rating', [
                'label' => 'Classement',
                'taxonomy' => 'restaurant_rating',
                'field_type' => 'select',
                'allow_null' => 1,
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'CLASSEMENT',
            ])
            ->addTaxonomy('guide_ratings', [
                'label' => 'Classement guides',
                'taxonomy' => 'guide_rating',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'CLASSEMENTGUIDESs',
            ])
            ->addTaxonomy('logis_ratings', [
                'label' => 'Classement Logis',
                'taxonomy' => 'logis_rating',
                'field_type' => 'checkbox',
                'save_terms' => 1,
                'load_terms' => 1,
                'tourinsoft_path' => 'CLASSEMENTLOGISs',
            ])

            ->addNumber('covers', [
                'label' => 'Nombre de couverts',
                'tourinsoft_path' => 'NBRECOUVERTS',
            ])
            ->addNumber('indoor_covers', [
                'label' => 'Nombre de couverts hors terrasse',
                'tourinsoft_path' => 'NBRECOUVERTSHORSTERRASSE',
            ])
            ->addNumber('rooms', [
                'label' => 'Nombre de salles',
                'tourinsoft_path' => 'NBRESALLES',
            ])

            ->addTrueFalse('has_events', [
                'label' => 'Animations',
                'ui' => 1,
                'tourinsoft_path' => 'ANIMATIONS',
            ])
            ->addTextarea('events_description', [
                'label' => 'Description des animations',
                'tourinsoft_path' => 'ANIMATIONSDESCRIPTIF',
            ])
        ;


        return $fields->build();
    }
}
