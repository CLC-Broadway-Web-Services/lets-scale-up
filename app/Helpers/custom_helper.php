<?php
// Function: used to create slugs

use App\Models\Admin\ServiceCategoryModel;

if (!function_exists("slugify")) {
    function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
if (!function_exists("checkSlugDuplicacy")) {
    function checkSlugDuplicacy($slug, $table, $slug_key)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($table);

        // $data = $this->where(['project_slug' => $slug])->countAll();

        $data = $builder->getWhere([$slug_key => $slug])->countAll();

        if ($data > 0) {
            $slug2 = $slug . '-' . $data;
            return $slug2;
        } else {
            return $slug;
        }
    }
}

if (!function_exists("servicesMenu")) {
    function servicesMenu()
    {
        $ServiceCategoryModel = new ServiceCategoryModel();
        return $ServiceCategoryModel->getAllCategoryMenus();
    }
}
