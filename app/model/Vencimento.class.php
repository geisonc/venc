<?php
class Vencimento extends TRecord
{
        const TABLENAME = 'controleVencimento';
        const PRIMARYKEY = 'id';
        const IDPOLICY = 'max';
        
        public function __construct($id = null, $callObjectLoad = TRUE)
        {
                parent::__construct($id, $callObjectLoad);
                parent::addAttribute('foto');
                parent::addAttribute('ano');
                parent::addAttribute('mes');
                parent::addAttribute('obs');
                parent::addAttribute('usuario_id');
                parent::addAttribute('createdat');       
        }
}