<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MetaTags extends Entity
{
	protected $datamap = [];
	protected $attributes = [
		'title' => null,
		'description' => null,
		'keywords' => null,
		'author' => null,
		'owner' => null,
		'type' => null,
	];
	protected $dates   = [];
	protected $casts   = [];
}
