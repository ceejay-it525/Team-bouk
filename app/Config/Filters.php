<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'inactivity'    => \App\Filters\InactivityFilter::class,
        'rolefilter'    => \App\Filters\RoleFilter::class,
        'csp'           => \App\Filters\CspFilter::class,
    ];

    public array $required = [
        'before' => [
            'forcehttps',
            // ⚠️ Disable pagecache globally if using forms with CSRF
            // 'pagecache',
        ],
        'after' => [
            // 'pagecache',
            'performance',
            'toolbar',
        ],
    ];

    public array $globals = [
        'before' => [
            'inactivity' => [
                'except' => [
                    'login',
                    'login/*',
                    'auth/*'
                ]
            ],
            'honeypot',

            // ✅ FIXED CSRF CONFIG WITH EXCEPTIONS
            'csrf' => [
                'except' => [
                    'api/*',
                    'ajax/*',
                    'upload',
                ]
            ],

            'invalidchars',
        ],
        'after' => [
            'csp',
            'honeypot',
            'secureheaders',
        ],
    ];

    public array $methods = [];

    public array $filters = [
        // Example: protect specific routes with role filter
        // 'rolefilter' => ['before' => ['admin/*']],
    ];
}