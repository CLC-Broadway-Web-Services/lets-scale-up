<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TeamModel extends Model
{
	protected $table = 'team_members';
	protected $primaryKey = 'member_id';
	protected $returnType     = 'array';
	protected $allowedFields = [
		'member_name',
		'member_email',
		'member_mobile',
		'member_image',
		'member_position',
		'member_facebook',
		'member_linkedin',
		'member_twitter',
		'member_about',
		'member_home_view',
		'member_status',
	];
	protected $createdField  = 'member_created_at';
	protected $updatedField  = 'member_updated_at';

	public function addEditMember($member, $member_id)
	{
		$session = session();
		helper('form');
		$data = [
			'member_name' => $member['member_name'],
			'member_about' => $member['member_about'],
			'member_email' => $member['member_email'],
			'member_mobile' => intval($member['member_mobile']),
			'member_position' => $member['member_position'],
			'member_linkedin' => $member['member_linkedin'],
			'member_facebook' => $member['member_facebook'],
			'member_twitter' => $member['member_twitter'],
			'member_status' => intval($member['member_status']),
		];

		if (isset($member['member_image'])) {
			if (!empty($member['member_image'])) {
				$data['member_image'] = $member['member_image'];
			}
		}
		if ($member_id == 0) {
			$query = $this->insert($data);
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				$session->setFlashdata($respose);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				$session->setFlashdata($respose);
				return $respose;
			}
		} else {
			$query = $this->set($data)->where(['member_id' => $member_id])->update();
			if ($query) {
				$respose = array(
					'status' => 'success',
				);
				$session->setFlashdata($respose);
				return $respose;
			} else {
				$respose = array(
					'status' => 'failed',
					'message' => $this->error(),
				);
				$session->setFlashdata($respose);
				return $respose;
			}
		}
	}
	public function statusChange($member_id)
	{
		$post = $this->where(['member_id' => $member_id])->first();
		if ($post != null) {
			if ($post['member_status'] == 1) {
				$query = $this->set(['member_status' => 0])->where(['member_id' => $member_id])->update();
				if ($query) {
					$respose = array(
						'status' => 'success',
					);
					return $respose;
				} else {
					$respose = array(
						'status' => 'failed',
						'message' => $this->error(),
					);
					return $respose;
				}
			} else {
				$query = $this->set(['member_status' => 1])->where(['member_id' => $member_id])->update();
				if ($query) {
					$respose = array(
						'status' => 'success',
					);
					return $respose;
				} else {
					$respose = array(
						'status' => 'failed',
						'message' => 'Failed to change status, please contact support.',
					);
					return $respose;
				}
			}
		} else {
			$respose = array(
				'status' => 'failed',
				'message' => 'No member found for this request.',
			);
			return $respose;
		}
	}
}
