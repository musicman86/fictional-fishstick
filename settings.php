<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingcrownboost', get_string('configtitle', 'theme_crownboost'));

    // General settings page
    $page = new admin_settingpage('theme_crownboost_general', get_string('generalsettings', 'theme_crownboost'));

    // General settings page
    $page = new admin_settingpage('theme_crownboost_general', get_string('generalsettings', 'theme_crownboost'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_crownboost/scsspre',
        get_string('rawscsspre', 'theme_crownboost'),
        get_string('rawscsspredesc', 'theme_crownboost'),
        '',
        PARAM_RAW);
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_crownboost/scss',
        get_string('rawscss', 'theme_crownboost'),
        get_string('rawscssdesc', 'theme_crownboost'),
        '',
        PARAM_RAW);
    $page->add($setting);

    $settings->add($page);
}
