<?php
class Usuario extends TRecord
{
        const TABLENAME = 'usuario';
        const PRIMARYKEY = 'id';
        const IDPOLICY = 'max';
        
        public function __construct($id = null, $callObjectLoad = TRUE)
        {
                parent::__construct($id, $callObjectLoad);
                parent::addAttribute('login');
                parent::addAttribute('senha');
                parent::addAttribute('createdat');
     
        }
}