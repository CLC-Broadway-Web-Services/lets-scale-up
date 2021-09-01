<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CountriesModel extends Model
{
	protected $table                = 'countries';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'iso3',
		'numeric_code',
		'iso2',
		'phonecode',
		'capital',
		'currency',
		'currency_symbol',
		'tld',
		'native',
		'region',
		'subregion',
		'timezones',
		'translations',
		'latitute',
		'longitude',
		'emoji',
		'emojiU',
		'flag',
		'wikiDataId'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	public function getAllCountries(){
		return $this->orderBy('name', 'asc')->findAll();
	}
}
