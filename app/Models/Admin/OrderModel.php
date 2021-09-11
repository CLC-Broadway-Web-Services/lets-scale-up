<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class OrderModel extends Model
{
	protected $table                = 'orders';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'user_id',
		'service_id',
		'package_id',
		'unique_id',
		'online_transaction_id',
		'online_order_id',
		'base_price',
		'govt_fee',
		'shipping',
		'discount',
		'gst',
		'total_amount',
		'status',
		'status_name',
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
