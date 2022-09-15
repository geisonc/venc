 <?php

class CardView extends TPage
{
    private $form;
    
    public function __construct()
    {
        parent::__construct();
        
        $cards = new TCardView;

        try
        {
                TTransaction::open('venc');
                //TTransaction::dump();

                //$usuario = new Usuario (1);
                //$usuario = Usuario::find( 3 )->hasMany('Vencimento'); 
                //$usuario = Usuario::find( 3 )->hasMany('Vencimento','usuario_id','mes');         
                $usuario = Usuario::find( 3 )->filterMany('Vencimento')->where('mes','>',0)->load(); 

                TTransaction::close();

        }
        catch (Exception $e)
        {
                new TMessage('error', $e->getMessage());
        }


        //$cards->setUseButton();
        $items = $usuario;

        foreach ($items as $item)
        {
            $item->mes = $this->traduzMes($item->mes);
            $cards->addItem($item);
        }
        
        $cards->setTitleAttribute("<img src='{foto}'width='100' height='130'>");
        $cards->setColorAttribute('123412');
        
        //$cards->setTemplatePath('app/resources/card.html');
        $cards->setItemTemplate('<b>{mes} - {ano}</b>');
        //$delete_action = new TAction([$this, 'onItemDelete'], ['id'=> '{id}']);
        //$cards->addAction($delete_action, 'Delete', 'far:trash-alt red');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add($cards);
        parent::add($vbox);
    }
    
    /**
     * Item delete action
     */
    public static function onItemDelete($param = NULL)
    {
        new TMessage('info', '<b>onItemDelete</b><br>'.str_replace(',', '<br>', json_encode($param)));
    }

    public static function traduzMes($mes)
    {
        switch ($mes)
            {
                case 1:
                    return 'JANEIRO'; 
                break;
                case 2:
                    return 'FEVEREIRO'; 
                break;
                case 3:
                    return 'MARÇO'; 
                break;
                case 4:
                    return 'ABRIL'; 
                break;
                case 5:
                    return 'MAIO'; 
                break;
                case 6:
                    return 'JUNHO'; 
                break;                
                case 7:
                    return 'JULHO'; 
                break;
                case 8:
                    return 'AGOSTO';
                break;
                case 9:
                    return 'SETEMBRO';
                break; 
                case 10:
                    return 'OUTUBRO'; 
                break;
                case 11:
                    return 'NOVEMBRO';
                break; 
                case 12:
                    return 'DEZEMBRO'; 
                break; 
            }

    }
}