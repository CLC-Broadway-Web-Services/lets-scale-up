<?php

namespace App\Models\Globals;

use CodeIgniter\Model;

class FunctionsModel extends Model
{
    public function slugify($text)
    {
        // Strip html tags
        $text = strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) {
            return 'n-a';
        }
        // Return result
        return $text;
    }
    public function checkSlugDuplicacy($slug, $table, $slug_key)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($table);

        // $data = $this->where(['project_slug' => $slug])->countAll();

        $data = $builder->where([$slug_key => $slug])->countAll();

        if ($data > 0) {
            $slug2 = $slug . '-' . $data;
            return $slug2;
        } else {
            return $slug;
        }
    }
    // public function getSingleEntityWithCategoryBySlug($table, $ent_cat_key, $cat_table, $cat_key, $slug, $slug_key)
    // {
    //     $db = \Config\Database::connect();
    //     $entity = $db->table($table);
    //     $cat_entity = $db->table($cat_table);

    //     $entity_data = $entity->where([$slug_key => $slug])->get();
    //     return $entity_data;
    //     $entity_data[0]['category_name'] = $cat_entity->where($entity_data[0][$ent_cat_key])->get()[$cat_key];
    //     return $entity_data[0];
    // }
}
