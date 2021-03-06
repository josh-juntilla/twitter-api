<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

use PHPMailer\PHPMailer\PHPMailer;

class Mailer extends PHPMailer {

	public function __construct()
	{
		parent::__construct();
		$this->__setup();
	}

	public function __get($var)
	{
		return get_instance()->$var;
	}

	private function __setup()
	{
		$this->config->load('mailer', true);

		$this->Host     = $this->config->item('host', 'mailer');
		$this->Username = $this->config->item('username', 'mailer');
		$this->Password = $this->config->item('password', 'mailer');
		$this->Port     = 26;
        $this->setFrom($this->config->item('username', 'mailer'), $this->config->item('name', 'mailer'));
        $this->isHTML(true);

		switch ($this->config->load('mailer', true)) {
			case 'smtp':
				$this->isSMTP();
        		$this->SMTPAuth = $this->config->item('smtp_auth', 'mailer');
				break;
		}
	}

}