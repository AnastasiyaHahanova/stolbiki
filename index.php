<?php
require_once __DIR__.'/vendor/autoload.php';
$rates = json_decode(file_get_contents('http://kodaktor.ru/j/rates'));
$app = new Silex\Application();
$app->get('/author',function (){
    header('Access-Control-Allow-Origin: *');
    header('Content-type: text/plain; charset=utf-8');
    header('Access-Control-Allow-Methods: GET,POST,DELETE');
    return 'Anastasiya Hahanova ';
});
$app->get('/', function(){
    if (isset($_GET['print']))
    {
        header('Content-type: text/plain; charset=utf-8');
        return file_get_contents(basename(__FILE__));
    }
    else
    {
       $date = date('d/m/Y H:s');
        return $date;
    }
  
});
$app->get('/file/', function(){
    if (isset($_GET['print']))
    {
        header('Content-type: text/plain; charset=utf-8');
        return file_get_contents(basename(__FILE__));
    }
    else
    {
       $date = date('d/m/Y H:s');
        return $date;
    }
    if (isset($_GET['public']))
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-type: text/plain; charset=utf-8');
        header('Access-Control-Allow-Methods: GET,POST,DELETE');
    }
});


$app->run();
