<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
	protected $datamap = [];
	protected $attributes = [
		'id' => null,
		'name' => null,        // Represents a username
		'email' => null,
		'password' => null,
		'avatar' => null,
		'created_at' => null,
		'updated_at' => null,
	];
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];
	protected $casts   = [
		// 'id' => null,
		// 'name' => null,
		// 'email' => null,
		// 'password' => null,
		// 'created_at' => null,
		// 'updated_at' => null,
	];
}
