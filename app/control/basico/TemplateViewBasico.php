<?php
 
 class TemplateViewBasico extends TPage
 {
        public function __construct()
        {
                parent::__construct();
                
                try
                {
                        $html = new THtmlRenderer('app/resources/template_basico.html');

                        $cliente = new stdClass;
                        $cliente->id = 5;
                        $cliente->name = 'GEISON';

                        $replaces         = [];
                        $replaces['id']   = $cliente->id;
                        $replaces['name'] = $cliente->name;

                        $html->enableSection('main', $replaces);

                        //OU  $replaces['cliente'] = $cliente;
                        //e no html {{cliente->id}} {cliente->name}  
                        
                        $replaces2 = [];
                        $html->enableSection('outros', $replaces2);

                        

                        $replace = [];
                        $replace[] = [ 'id' => 1, 'name' => 'geison' ];
                        $replace[] = [ 'id' => 2, 'name' => 'jessica' ];
                        $replace[] = [ 'id' => 3, 'name' => 'dique' ];
                        $replace[] = [ 'id' => 4, 'name' => 'lina' ];

                        $html->enableSection('lista', []);
                        $html->enableSection('repeticao', $replace, true);

                        parent::add($html);
                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }
                              
        }
 }