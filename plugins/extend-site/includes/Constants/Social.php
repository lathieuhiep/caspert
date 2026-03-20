<?php

namespace ExtendSite\Constants;

defined('ABSPATH') || exit;

final class Social
{
    public static function list(): array
    {
        return [
            'facebook' => 'Facebook',
            'youtube' => 'YouTube',
            'instagram' => 'Instagram',
            'tiktok' => 'TikTok',
            'zalo' => 'Zalo',
        ];
    }
}