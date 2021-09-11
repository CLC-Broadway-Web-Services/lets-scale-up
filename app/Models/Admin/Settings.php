<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Settings extends Model
{
	protected $table                = 'settings';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	// protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'set_key',
		'set_value',
		'updated_by'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	// protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	// protected $beforeInsert         = ['cacheSettings'];
	protected $afterInsert          = ['cacheSettings'];
	// protected $beforeUpdate         = ['cacheSettings'];
	protected $afterUpdate          = ['cacheSettings'];
	// protected $beforeFind           = ['cacheSettings'];
	// protected $afterFind            = ['cacheSettings'];
	// protected $beforeDelete         = ['cacheSettings'];
	// protected $afterDelete          = ['cacheSettings'];

	public function getSettings()
	{
		if (!cache('settings')) {
			return $this->cacheSettings();
		}
		return cache()->get('settings');
	}
	public function cacheSettings()
	{
		$set = $this->select('set_key, set_value')->findAll();
		$settings = [];
		foreach ($set as $value) {
			$key = $value['set_key'];
			$settings[$key] = $value['set_value'];
		}
		cache()->save('settings', $settings, 3600);
		return $settings;
	}
}
