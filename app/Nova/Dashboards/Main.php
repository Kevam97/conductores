<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\NewOwners;
use App\Nova\Metrics\NewDrivers;
use App\Nova\Metrics\PaymentUsers;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NewUsers,
            new NewDrivers,
            new NewOwners,
            new PaymentUsers

        ];
    }
}
