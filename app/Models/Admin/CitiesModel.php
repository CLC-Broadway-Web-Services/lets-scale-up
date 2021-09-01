<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CitiesModel extends Model
{
	protected $table                = 'cities';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'state_id',
		'state_code',
		'country_id',
		'country_code',
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

	public function getAllCitiesByState($stateId)
	{
		return $this->where(['state_id' => $stateId])->orderBy('name', 'asc')->findAll();
	}
	public function getAllCitiesByCountry($countryId)
	{
		return $this->where(['country_id' => $countryId])->orderBy('name', 'asc')->findAll();
	}
}
