<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class InboxModel extends Model
{
	protected $table                = 'inboxes';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'order_id', // if package / service
		'unique_id', // if package / service
		'user_id',
		'inbox_type', // package_md / document_md / service_md
		'entity_id'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
