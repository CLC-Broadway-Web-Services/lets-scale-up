<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ServiceBenefitsModel extends Model
{
    protected $table                = 'service_benefits';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
    protected $allowedFields = [
        'service_id',
		'icon',
        'title',
        'summary',
        'status',
    ];
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

    public function getBenefitByID($benefitid)
    {
        return $this->where(['id' => $benefitid])->first();
    }
    public function getAllDocsBYServiceID($serviceid)
    {
        return $this->where(['service_id' => $serviceid])->findAll();
    }

    public function addEditBenefit($benefit)
    {
        $session = session();
        helper('form');
        $benefitid = intval($benefit['id']);

        $data = [
            'service_id' => $benefit['service_id'],
            'icon' => $benefit['icon'],
            'title' => esc($benefit['title']),
            'summary' => esc($benefit['summary']),
            'status' => $benefit['status'],
        ];
        if ($benefitid == 0) {
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
            $query = $this->set($data)->where(['id' => $benefitid])->update();
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

    public function allBenefitsWIthServiceName()
    {
        $benefitsList = $this->distinct()->select('service_benefits.*, services.service_title')
            ->join('services', 'services.service_id=service_benefits.service_id')
            ->findAll();
        return $benefitsList;
    }
    public function statusChange($benefitid)
    {
        $benefit = $this->where(['id' => $benefitid])->first();
        if ($benefit != null) {
            if ($benefit['status'] == 1) {
                $query = $this->set(['status' => 0])->where(['id' => $benefitid])->update();
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
                $query = $this->set(['status' => 1])->where(['id' => $benefitid])->update();
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
                'message' => 'No benefit found for this request.',
            );
            return $respose;
        }
    }
}
