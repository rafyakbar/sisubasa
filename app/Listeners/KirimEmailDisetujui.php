<?php

namespace App\Listeners;

use App\Events\SuratDisetujui;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SuratDisetujuiMail;
use App\Facades\Mail;

class KirimEmailDisetujui
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SuratDisetujui  $event
     * @return void
     */
    public function handle(SuratDisetujui $event)
    {
        $penerima = $event->penerima->email;
        $pengirim = $event->pengirim->email;

        Mail::to($penerima)->subject('Surat Disetujui')->send('emails.surat_disetujui', [
            'pengirim' => $pengirim
        ]);
    }
    
}
