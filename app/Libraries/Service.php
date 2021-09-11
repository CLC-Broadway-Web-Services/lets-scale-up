<?php

namespace App\Libraries;


class Service
{
    public function service_block($service)
    {
        return view('Frontend/components/service_blocks/short_service_block', $service);
    }
    public function benefit_block($service)
    {
        return view('Frontend/components/service_blocks/short_service_block', $service);
    }
    public function document_block($service)
    {
        return view('Frontend/components/service_blocks/short_service_block', $service);
    }
    public function package_block($service)
    {
        return view('Frontend/components/service_blocks/short_service_block', $service);
    }
}
