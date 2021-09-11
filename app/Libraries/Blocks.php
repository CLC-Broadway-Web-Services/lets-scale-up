<?php

namespace App\Libraries;


class Blocks
{
    public function client_post_block($client)
    {
        return view('Frontend/components/short_post/client_post_block', $client);
    }
    public function blog_post_block($post)
    {
        return view('Frontend/components/short_post/blog_post_block', $post);
    }
    public function initiative_post_block($initiative)
    {
        return view('Frontend/components/short_post/initiative_post_block', $initiative);
    }
    public function service_short_block($service)
    {
        return view('Frontend/components/service/service_short_block', $service);
    }
    public function service_benefit_block($benefit)
    {
        return view('Frontend/components/service/service_benefit_block', $benefit);
    }
    public function service_document_block($doc)
    {
        return view('Frontend/components/service/service_document_block', $doc);
    }
    public function service_package_block($package)
    {
        return view('Frontend/components/service/service_package_block', $package);
    }
    public function service_faq_block($faq)
    {
        return view('Frontend/components/service/service_faq_block', $faq);
    }
    public function page_breadcrumb_block($pagedata)
    {
        return view('Frontend/components/page/breadcrumb', $pagedata);
    }
    public function testimonial_block($testimonial)
    {
        return view('Frontend/components/other/testimonial_block', $testimonial);
    }
}
