<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ServiceQuery extends Model
{
	protected $table                = 'service_queries';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'user_id', // int
		'form_id', // int
		'service_id', // int
		'form_heading', // varchar
		'form_is_multiple', // boolean
		'total_fields', // int
		'total_values', // int
		'repeating_values', // int
		'unique_code', // bigint
		'form_index', //int
		'form_fields', // text
		'package_id', // int
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
