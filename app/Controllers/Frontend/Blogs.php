<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Entities\MetaTags;
use App\Models\Admin\BlogsModel;

use App\Models\Admin\TestimonialsModel;

class Blogs extends BaseController
{
	public function index()
	{
		// $testimonialsDB = new TestimonialsModel();
		// $this->data['testimonials'] = $testimonialsDB->getAllTestimonialsFront();

		$blogDB = new BlogsModel();
		// $projects = $projectsDB->getAllProjectsFrontend();
		$this->data['posts'] = $blogDB->getAllPostsFrontend()['posts'];
		$this->data['pager'] = $blogDB->getAllPostsFrontend()['pager'];

		$postMeta = new MetaTags();
		$postMeta->title = 'Blogs';
		$this->data['meta'] = $postMeta;
		// return print_r($this->data);

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/blogs/index', $this->data);
	}
	public function single($slug = '')
	{
        if($slug == null) {
            return redirect()->to(route_to('clients_page'));
        }
		$blogDB = new BlogsModel();
		$post = $blogDB->getSinglePost($slug);
		$postMeta = new MetaTags();
		$postMeta->title = $post['post_title'];
		$postMeta->description = $post['post_summary'];
		$postMeta->keywords = $post['post_tags'];
		// $postMeta->author = $post['post_title'];
		// $postMeta->owner = $post['post_title'];
		$postMeta->type = 'post';
		$this->data['meta'] = $postMeta;

		$this->data['post'] = $post;
		$nextPost = $blogDB->select('post_slug')->where('post_id >', $post['post_id'])->findAll(1);
		$previousPost = $blogDB->select('post_slug')->where('post_id <', $post['post_id'])->findAll(1);

		if($previousPost) {
			$this->data['previousPost'] = $previousPost[0];
		}
		if($nextPost) {
			$this->data['nextPost'] = $nextPost[0];
		}

		// return print_r($this->data);

		// $this->data['pageCSS'] = '<link rel="stylesheet" href="/public/libraries/splide/dist/css/splide.min.css">';

		// $this->data['pageJSbefore'] = '<script src="/public/libraries/splide/dist/js/splide.min.js"></script>';

		// $this->data['pageJS'] = '<script src="/public/assets/js/counter.init.js"></script>
		// <script src="/public/custom/assets/js/homepage2.js"></script>';

		return view('Frontend/blogs/single', $this->data);
	}

}
