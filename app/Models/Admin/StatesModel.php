<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StatesModel extends Model
{
	protected $table                = 'states';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'country_id',
		'country_code',
		'fips_code',
		'iso2',
		'latitude',
		'longitude',
		'flag',
		'wikiDataId'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getAllStatesByCountry($countryId)
	{
		return $this->where(['country_id' => $countryId])->orderBy('name', 'asc')->findAll();
	}
}
