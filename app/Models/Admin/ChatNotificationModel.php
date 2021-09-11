<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ChatNotificationModel extends Model
{
	protected $table                = 'chatnotifications';
	protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'inbox_id',
		'is_notification', // boolean
		'message',
		'is_user', // boolean to 1
		'staff_id',
		'staff_name',
		'read_status',
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
