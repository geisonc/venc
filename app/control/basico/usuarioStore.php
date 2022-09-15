<?php
 
 class usuarioStore extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                try
                {
                        TTransaction::open('venc');

                        $usuario = new Usuario;
                        $usuario->login = 'a';
                        $usuario->senha = 'a';
                        $usuario->store();

                        new TMessage('info','Usuário gravado com sucesso !');

                        TTransaction::close();

                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }

                
        }
 }
