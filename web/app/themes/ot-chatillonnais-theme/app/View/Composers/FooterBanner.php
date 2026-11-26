<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FooterBanner extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.footer-banner',
    ];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        return [
            'image' => get_field('banner_image', 'option') ?: null,
            'socialsTitle' => get_field('banner_socials_title', 'option') ?: '',
            'socials' => get_field('banner_socials', 'option') ?: [],
            'newsletterTitle' => get_field('banner_newsletter_title', 'option') ?: '',
            'tagline' => get_field('banner_tagline', 'option') ?: '',
            'title' => get_field('banner_title', 'option') ?: '',

            // Route Acorn : routes/web.php → NewsletterController@subscribe
            'newsletterAction' => route('newsletter.subscribe'),
        ];
    }
}
