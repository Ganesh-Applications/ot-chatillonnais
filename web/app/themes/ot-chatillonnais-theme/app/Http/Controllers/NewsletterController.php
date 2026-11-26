<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController
{
    /**
     * Destinataire des demandes d'inscription à la newsletter.
     */
    private const RECIPIENT = 'aubin@atelier-pangram.fr';

    /**
     * Traite le formulaire d'inscription à la newsletter (bandeau footer).
     */
    public function subscribe(Request $request)
    {
        //-- Honeypot
        if ($request->filled('login') || $request->filled('password')) {
            return back();
        }

        $data = $request->validate([
            'email' => ['required', 'email'],
        ]);

        wp_mail(
            self::RECIPIENT,
            'Demande d\'ajout à la newsletter',
            'Mail : ' . $data['email']
        );

        return back()->with('newsletter', 'success');
    }
}
