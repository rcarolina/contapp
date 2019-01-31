<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
*/

$config['google_client_id']        = '642010228180-5mvu0001bqmjaiht0obbd9gkrkhsu87k.apps.googleusercontent.com';
$config['google_client_secret']    = 'C4_jzsVwjyWSo-1UEhXvFQbX';
$config['google_redirect_url']=base_url().'google_login/oauth2callback';
