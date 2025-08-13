<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 's_e_o_s'; // Laravel will default to `s_e_o_s` due to naming, but it's good to be explicit

    protected $fillable = [
        // Basic Page Info
        'page_name',
        'route_name',
        'locale',
        'favicon_icon',

        // Meta Tags
        'meta_title',
        'meta_description',
        'canonical_url',
        'meta_keywords',

        // Open Graph (OG)
        'og_title',
        'og_description',
        'og_type',
        'og_image',
        'og_url',

        // Twitter Card
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',

        // Additional Control
        'no_index',
        'no_follow',
        'custom_meta',
        'schema_markup',

        // Sitemap / Priority
        'include_in_sitemap',
        'priority',
        'change_frequency',
    ];

    protected $casts = [
        'no_index' => 'boolean',
        'no_follow' => 'boolean',
        'include_in_sitemap' => 'boolean',
        'custom_meta' => 'array',
        'schema_markup' => 'array',
        'priority' => 'decimal:1',
    ];
}
