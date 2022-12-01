<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Query\Search\SearchableRelation;




class Driver extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Driver::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'user.name', 'user.lastname'
    ];

    // public static function searchableColumns()
    // {
    // return ['id', new SearchableRelation('user','name','lastname')];
    // }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make(__('user'),'user',User::class),
            BelongsTo::make(__('healthCompany'),'healthCompany',HealthCompany::class),
            Text::make(__('experience year'),'experience_year'),
            Text::make(__('driving license'),'driving_license'),
            Date::make(__('license expiration'),'license_expiration'),
            Boolean::make(__('status'),'status'),

            HasMany::make(__('Annexes'),'Annexes',Annex::class),
            HasMany::make(__('PersonalReferences'),'PersonalReferences',PersonalReference::class),
            HasMany::make(__('WorkReferences'),'WorkReferences',WorkReference::class),
            HasMany::make(__('Courses'),'Courses', Course::class),
            HasMany::make(__('Ratings'),'Ratings', Rating::class ),
            HasOne::make(__('vehicle'),'vehicle',Vehicle::class)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            (new Actions\DriverStatus)
            ->confirmText('¿Estas seguro de cambiar el estado del conductor?')
            ->confirmButtonText('Sí')
            ->cancelButtonText("No"),
        ];
    }

    public static function singularLabel()
    {
        return 'Conductor';
    }

    public static function label()
    {
        return 'Conductores';
    }
}
