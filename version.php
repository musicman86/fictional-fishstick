<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_crownboost';
$plugin->version   = 2024120900;  // YYYYMMDDXX format
$plugin->requires  = 2022112800;  // Moodle 4.1 minimum
$plugin->maturity  = MATURITY_STABLE;
$plugin->release   = '1.0';
$plugin->dependencies = [
    'theme_boost' => 2022112800
];
