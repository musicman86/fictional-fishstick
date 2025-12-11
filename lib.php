<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

defined('MOODLE_INTERNAL') || die();

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_crownboost_get_pre_scss($theme) {
    $scss = '';
    $configurable = [
        // Add any theme settings you want to expose as SCSS variables
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $target) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        $scss .= '$' . $target . ': ' . $value . ";\n";
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    return $scss;
}

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_crownboost_get_extra_scss($theme) {
    $content = '';

    // Always return the extra scss from the parent theme.
    if (!empty($theme->settings->scss)) {
        $content .= $theme->settings->scss;
    }

    return $content;
}

/**
 * Get compiled SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string compiled SCSS
 */
function theme_crownboost_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    
    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.
    $pre = file_get_contents($CFG->dirroot . '/theme/boost/scss/pre.scss');
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.
    $post = file_get_contents($CFG->dirroot . '/theme/boost/scss/post.scss');

    // Combine them together.
    return $pre . "\n" . $scss . "\n" . $post;
}
