<?php

/**
 * Define your constant variables
 */

// General
define('APP_ROOT', __DIR__);
const URL_ROOT = 'http://localhost:5555';
const COOKIE_DAYS = 180;
const CONTROLLER_FOLDER = 'Controllers\\';

// Debug
const DISPLAY_ERRORS = true;
const ERROR_REPORTING = E_ALL;

// Caching
const MEMCACHED_ENABLED = true;
const MEMCACHED_HOST = '127.0.0.1';
const MEMCACHED_PORT = 11211;
const CACHE_TIME_SEC = 86400;


// DB
const DB_TYPE = 'mysql';
const DB_HOST = 'db';
const DB_PORT = '3306';
const DB_USER = 'root';
const DB_PASS = 'influnc@eo';
const DB_NAME = 'influenceo_db';
// Keep this empty, if you don't use NoSQL DB like SQLite
const NO_SQL_ADDRESS = '';
