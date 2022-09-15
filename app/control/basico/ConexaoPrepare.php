<?php
 
 class ConexaoPrepare extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                try
                {
                        TTransaction::open('venc');

                        $conn = TTransaction::get();

                        $statement = $conn->prepare('select * from controleVencimento');
                        $statement->execute();
                        $result = $statement->fetchAll();
                        
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
