<?php

namespace App\Observers;

use App\Models\Driver;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\Permission\Models\Permission;
use Laravel\Nova\Nova;

class DriverObserver
{

    /**
     * Handle the Driver "updated" event.
     *
     * @param  \App\Models\Driver  $driver
     * @return void
     */
    public function updated(Driver $driver)
    {
        Nova::whenServing(function (NovaRequest $request) use ($driver){
            //if($driver->isDirty('status')){
                if($driver->status == 1){
                    $driver->experience_year = 1;
                    $driver->save();
;                    $driver->user->givePermissionTo('offer_view');
                }else {
                    $driver->experience_year = 1;
                    $driver->save();
                    $driver->user->revokePermissionTo('offer_view');
                }
            //}
        });
    }


}
