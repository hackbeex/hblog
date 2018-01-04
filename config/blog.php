<?php

return [

    // Mail Notification
    'mail_notification' => env('MAIL_NOTIFICATION') ?: false,

    // Default Avatar
    'default_avatar' => env('DEFAULT_AVATAR') ?: '/images/default.png',

    // Default Icon
    'default_icon' => env('DEFAULT_ICON') ?: '/images/favicon.ico',

    // Meta
    'meta' => [
        'keywords' => 'HBlog,blog,hackbee,laravel,vuejs',
        'description' => 'Just do it in HBlog'
    ],

    // Social Share
    'social_share' => [
        'article_share'    => env('ARTICLE_SHARE') ?: true,
        'discussion_share' => env('DISCUSSION_SHARE') ?: true,
        'sites'            => env('SOCIAL_SHARE_SITES') ?: 'google,twitter,weibo',
        'mobile_sites'     => env('SOCIAL_SHARE_MOBILE_SITES') ?: 'google,twitter,weibo,qq,wechat',
    ],

    // Google Analytics
    'google' => [
        'id'   => env('GOOGLE_ANALYTICS_ID', 'Google-Analytics-ID'),
        'open' => env('GOOGLE_OPEN') ?: false
    ],

    // Article Page
    'article' => [
        'title'       => 'HBlog',
        'description' => 'What I’m doing right now, I’m chasing perfection.',
        'number'      => 10,
        'sort'        => 'desc',
        'sortColumn'  => 'published_at',
    ],

    // Discussion Page
    'discussion' => [
        'open' => true,
        'number' => 20,
        'sort'   => 'desc',
        'sortColumn' => 'created_at',
    ],

    'tag' => [
        'show' => true,
    ],

    'category' => [
        'show' => true,
    ],

    // About Me
    'about' => [
        'open' => true,
    ],

    // Footer
    'footer' => [
        'github' => [
            'open' => true,
            'url'  => 'https://github.com/hackbeex',
        ],
        'weibo' => [
            'open' => true,
            'url'  => 'https://weibo.com/hackbee'
        ],
        'twitter' => [
            'open' => true,
            'url'  => 'https://twitter.com/hackbeex'
        ],
        'meta' => '© HBlog 2017. Powered By Hackbee, Thanks Jiajian',
    ],

    'license' => 'Powered By Hackbee.<br/>This article is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.',

];
