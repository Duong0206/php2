<?php

include __DIR__ . '/../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$collector = new RouteCollector();

$collector->group(array('prefix' => 'admin'), function(RouteCollector $collector){

    $collector->get('pages', function(){
        return 'page management';
    });

    $collector->get('players', function(){
        return 'player management';
    });

    $collector->get('orders', function(){
        return 'order management';
    });
});

$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch('GET', '/admin/pages'), "\n"; // page management
echo $dispatcher->dispatch('GET', '/admin/players'), "\n"; // player management
echo $dispatcher->dispatch('GET', '/admin/orders'), "\n"; // order management
