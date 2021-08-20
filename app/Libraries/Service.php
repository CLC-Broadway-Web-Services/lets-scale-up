<?php

namespace App\Libraries;


class Service
{
    public function service_block($service)
    {
        return view('Frontend/components/service_block', $service);
    }
}
