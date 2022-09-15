<?php
 
 class vencimentoUpdate extends TPage
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
                                $vencimento->obs = 'Alterado...';
                                $vencimento->store();
                        }

                        TTransaction::close();

                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }

        }
 }
