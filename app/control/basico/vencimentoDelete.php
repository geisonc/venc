<?php
 
 class vencimentoDelete extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                try
                {
                        TTransaction::open('venc');

                        TTransaction::dump();

                        $vencimento = Vencimento::find( 3 ); 

                        if ($vencimento instanceof Vencimento)
                        {
                                $vencimento->delete();
                        }

                        TTransaction::close();

                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }

                
        }
 }
