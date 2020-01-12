<?php

class Request
{
    private $get;

    private $post;

    private $server;

    public function __construct(array $get, array $post, array $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

    public function getUri()
    {
        return $this->server['REQUEST_URI'] ?? null;
    }

    public function getPostData(): array
    {
        return $this->post;
    }
}
