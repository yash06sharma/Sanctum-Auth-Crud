<?php

namespace App\Observers;

use App\Models\Preuser;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminInform;

class PreuserObserver
{
    /**
     * Handle the Preuser "created" event.
     */
    public function created(Preuser $preuser)
    {
        $EmailData = [
            'greeting' => 'Hi Mr, Yash',
            'email' => $preuser->email,
            'id' => $preuser->id,
            'showText' =>' has been send a request for Approval',

        ];
        Notification::route('mail', '06yashsharma@gmail.com')->notify(new AdminInform($EmailData));

    }

    /**
     * Handle the Preuser "updated" event.
     */
    public function updated(Preuser $preuser): void
    {
        //
    }

    /**
     * Handle the Preuser "deleted" event.
     */
    public function deleted(Preuser $preuser): void
    {
        //
    }

    /**
     * Handle the Preuser "restored" event.
     */
    public function restored(Preuser $preuser): void
    {
        //
    }

    /**
     * Handle the Preuser "force deleted" event.
     */
    public function forceDeleted(Preuser $preuser): void
    {
        //
    }
}
