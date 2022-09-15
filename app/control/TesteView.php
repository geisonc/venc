<?php

class TesteView extends TPage
{
        public function __construct()
        {
                parent::__construct();

                echo 'Construtor...<br>'; 
        }

        public static function onEventoEstatico()
        {
                echo 'Evento Estático.<br> Nao passa pelo construct nem no Evento. Necessário colocar &static=1 no endereço <br>';
                echo 'http://localhost/venc/index.php?class=testeView&method=onEventoEstatico&static=1';
        }

        public function onEvento()
        {
                echo 'evento... <br>';
        }

        public function show()
        {
                parent::show();
                echo 'metodo show ja existe, apenas sobrescrevendo <br>';
        }
}