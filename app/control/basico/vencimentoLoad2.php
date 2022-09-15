<?php
 
 class vencimentoLoad2 extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                try
                {
                        TTransaction::open('venc');
                        TTransaction::dump();

                        //$usuario = new Usuario (1);
                        //$usuario = Usuario::find( 3 )->hasMany('Vencimento'); 
                        //$usuario = Usuario::find( 3 )->hasMany('Vencimento','usuario_id','mes');         
                        $usuario = Usuario::find( 3 )->filterMany('Vencimento')->where('mes','>',0)->load(); 
                        

                        echo $usuario->id;

                        echo '<pre>';
                        var_dump($usuario);
                        echo '</pre>';

                        TTransaction::close();

                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }

                
        }
 }
