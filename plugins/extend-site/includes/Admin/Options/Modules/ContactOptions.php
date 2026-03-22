<?php

namespace ExtendSite\Admin\Options\Modules;

use Carbon_Fields\Field;
use ExtendSite\Admin\Options\OptionBase;
use ExtendSite\Admin\Options\OptionIF;
use ExtendSite\Helpers\ESHelpers;

defined('ABSPATH') || exit;

class ContactOptions extends OptionBase implements OptionIF
{
    // Key prefix
    private const KEY = 'es_otp_contact_';
    private const HOTLINE = self::KEY . 'hotline';
    private const EMAIL = self::KEY . 'email';
    private const ADDRESS = self::KEY . 'address';
    private const CF7_FORM_ID  = self::KEY . 'cf7_form_id';

    /**
     * fields
     */
    public static function fields(): array
    {
        return [
            // Contact
            Field::make('text', self::HOTLINE, esc_html__('Hotline', 'extend-site')),
            Field::make('text', self::EMAIL, esc_html__('Email', 'extend-site')),
            Field::make('textarea', self::ADDRESS, esc_html__('Address', 'extend-site')),

            // contact form 7
            Field::make('select', self::CF7_FORM_ID, esc_html__('Chọn form CF7', 'extend-site'))
                ->set_options(ESHelpers::get_form_cf7()),
        ];
    }

    /**
     * get data
     */

    // get hotline
    public static function get_hotline(): string
    {
        return (string)self::get(self::HOTLINE);
    }

    // get email
    public static function get_email(): string
    {
        return (string)self::get(self::EMAIL);
    }

    // get address
    public static function get_address(): string
    {
        return (string)self::get(self::ADDRESS);
    }

    // get cf7 form id
    public static function get_cf7_form_id(): int
    {
        return (int)self::get(self::CF7_FORM_ID);
    }

    // get all options
    public static function get_all(): array
    {
        return [
            'hotline' => self::get_hotline(),
            'email' => self::get_email(),
            'address' => self::get_address(),
            'cf7_form_id' => self::get_cf7_form_id(),
        ];
    }
}