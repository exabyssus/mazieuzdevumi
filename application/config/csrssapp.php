<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
$dotenv->load();

$config['rssdbname'] = getenv('RSSDBNAME');
$config['rssdbpass'] = getenv('RSSDBPASS');
$config['rssdbuser'] = getenv('RSSDBUSER');
$config['rssdbhost'] = getenv('RSSDBHOST');
$config['rssdbport'] = getenv('RSSDBPORT');
$config['rssdbprfx'] = getenv('RSSDBPRFX');

$config['mainrssfeed'] = getenv('MAINRSSFEED');
