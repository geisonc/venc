<?php
 
 class vencimentoLoad extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                try
                {
                        TTransaction::open('venc');

                        $vencimento = new Vencimento (3);
                        //$vencimento = Vencimento::find( 3 ); 

                        echo 'ID:'  . $vencimento->id;
                        echo 'Obs:' . $vencimento->obs;

                        TTransaction::close();

                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }

                
        }
 }
