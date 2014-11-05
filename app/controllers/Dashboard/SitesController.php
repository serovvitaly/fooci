<?php

namespace Controllers\Dashboard;

class SitesController extends \DashboardController {

    public function getIndex()
    {
        $sites = \Site::paginate(30);

        $this->layout->content = \View::make('dashboard.sites.index', ['sites' => $sites]);
    }

} 