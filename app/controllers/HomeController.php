<?php

class HomeController extends BaseController {

	protected $layout = 'dashboard.layout';

	public function getIndex()
	{
        $base_path = base_path();

    //    \SassCompiler::run($base_path . "/app/views/scss/", $base_path . "/public/css/");

        $this->layout->content = 'Панель управления';
	}

}
