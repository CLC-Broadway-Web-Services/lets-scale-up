<?php

namespace App\Models\Globals;

use CodeIgniter\Model;

class ShippingModel extends Model
{
	protected $table                = 'shipping_addresses';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'user_id',
		'reference_name',
		'is_default',
		'address_line_1',
		'address_line_2',
		'city',
		'state',
		'country',
		'pincode',
		'contact_name',
		'contact_number'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
