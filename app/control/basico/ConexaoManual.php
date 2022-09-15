<?php
 
 class ConexaoManual extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                try
                {
                        TTransaction::open('venc');

                        $conn = TTransaction::get();
                        $result = $conn->query('select * from controleVencimento');
                        
                        foreach ($result as $row)
                        {
                                print $row['id']." - ";
                                print $row['ano']."<br>";
                        }


                        TTransaction::close();
                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }

                
        }
 }
