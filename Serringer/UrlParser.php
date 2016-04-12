<?php
/**
 * Created by PhpStorm.
 * User: ReginThybo
 * Date: 11-04-2016
 * Time: 12:20
 */

namespace Serringer;


class UrlParser
{
    private $controller;

    private $method;

    private $args = array();

    public function __construct($uri)
    {
        $chunks = explode('/', $uri);
        $chunks = array_values(array_filter($chunks));
        foreach ($chunks as $data) {
            $this->args[] = $data;
        }

        if (empty($this->args[0]) || !class_exists('\\Serringer\\Routes\\' . ucfirst($this->args[0]))) {
            array_unshift($this->args, 'Frontpage');
        }

        if (empty($this->args[1]) || !method_exists('\\Serringer\\Routes\\' . ucfirst($this->args[0]), strtolower($this->args[1]))) {
            array_splice($this->args, 1, 0, 'index');
        }

        $this->controller = '\\Serringer\\Routes\\'.array_shift($this->args);

        $this->method = array_shift($this->args);

        return $this->getController();
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getArgs()
    {
        return $this->args;
    }


}