<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class PublicationStatus extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */

    public $onlyOnDetail = true;

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach($models as $model){
            if($model->status == 0){

                $model->update([
                    'status'=> 1
                ]);
                $model->user->givePermissionTo('publisher_create');
            }else{

                $model->update([
                    'status'=> 0
                ]);
                $model->user->revokePermissionTo('publisher_create');
            }
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
    }

    public function name()
    {
        return __('Cambiar estado publicador');
    }
}
