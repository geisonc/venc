<?php
 
 class vencimentoStore extends TPage
 {
        public function __construct()
        {
                parent::__construct();

                $this->form = new BootstrapFormBuilder;
                $this->form->setFormTitle('Novo Vencimento');
                
                $imageCapture = new TImageCapture('produto');
                $imageCapture->setSize(100, 130);
                $imageCapture->setCropSize(100, 130);

                $ano = new TEntry('ano');
                $mes = new TEntry('mes');


                $this->form->addFields([new TLabel('Foto Produto')], [$imageCapture]);
                $this->form->addFields([new TLabel('Mês Vencimento')], [$mes]);        
                $this->form->addFields([new TLabel('Ano Vencimento')], [$ano]);        

                $this->form->addAction('SALVAR', new TAction([$this, 'salvar']),'far:check-circle');
                
                parent::add($this->form);
     
        }

        public static function salvar($param)
        {
                try
                {
                        TTransaction::open('venc');

                        $vencimento = new Vencimento;
                        $vencimento->foto = 'fotos/'.$param['produto'];
                        $vencimento->ano = $param['ano'];
                        $vencimento->mes = $param['mes'];
                        $vencimento->usuario_id = 3;
                        $vencimento->store();

                        if (copy('tmp/'.$param['produto'], 'fotos/'.$param['produto']))
                        {
                                new TMessage('info','Produto gravado com sucesso !');  
                                TTransaction::close();    
                        }else
                        {
                                new TMessage('error','Ocorreu um erro, tente novamente.');  
                                TTransaction::rollback();      
                        }

                }
                catch (Exception $e)
                {
                        new TMessage('error', $e->getMessage());
                }
        }
 }
