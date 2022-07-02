<?php

namespace App\Listeners;

use App\Events\OrderCreate;
use App\Helpers\UserRoles;
use App\Mail\SendOrderEmailFromManager;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NewOrderEmailNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreate $event)
    {
        $users = User::all()->where('role', UserRoles::MANAGER);
        if($users) {
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendOrderEmailFromManager($event));
            }
        }
    }
}
