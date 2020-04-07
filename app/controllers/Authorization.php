<?php

class Authorization extends BaseController
{
    public function __construct($req)
    {
		parent::__construct($req);

		if (empty($_SESSION['user_data'])) {
			header('Location: /todo/public/login');
		}
    }
}
