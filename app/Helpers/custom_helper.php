<?php

use App\Models\Admin\PressRelease;
use App\Models\Admin\ServiceCategoryModel;
use App\Models\Admin\Settings;
use App\Models\Initiative\InitiativeModel;

// Function: used to create slugs
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

        $data = $builder->like($slug_key, $slug)->countAll();

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

if (!function_exists("getSettings")) {
    function getSettings()
    {
        $setting_md = new Settings();
        return $setting_md->getSettings();
    }
}

if (!function_exists("getInitiativesMenu")) {
    function getInitiativesMenu()
    {
        $initiative_md = new InitiativeModel();
        return $initiative_md->getMenuItems();
    }
}

if (!function_exists("isSocialAvailable")) {
    function isSocialAvailable()
    {
        $setting_md = new Settings();
        return $setting_md->isSocialAvailable();
    }
}
if (!function_exists("getAllPressReleases")) {
    function getAllPressReleases()
    {
        $release_md = new PressRelease();
        return $release_md->getAllPressReleases(1);
    }
}

