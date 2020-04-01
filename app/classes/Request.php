<?php

class Request
{
    public $get = [];
    public $post = [];
    public $url = [];
    public $request_uri;

    public function __construct()
    {
        $this->request_uri = $_SERVER["REQUEST_URI"];
        $this->extractGet();
        $this->extractPost();
        $this->extractUrl();
    }

    public function extractGet()
    {
        $this->get = $_GET;
    }

    public function extractPost()
    {
        $this->post = $_POST;
    }

    public function extractUrl()
    {
        $url = explode('?', $this->request_uri);
        $url = explode('/', substr($url[0], 1));
        $this->url = $url;
    }
}
