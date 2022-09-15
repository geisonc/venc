<?php

class principalForm extends TStandardForm
{
        protected $form;

        public function __construct ( $param )
        {
                parent::__construct();
                parent::setDatabase('venc');
                //parent::setActiveRecord('vencimento');

                $this->form = new BootstrapFormBuilder('form_Principal');
                $this->form->setFormTitle('Venc !');

                $id   = new TEntry('id');
                $foto = new TEntry('foto');
                $mes   = new TEntry('mes');
                $ano   = new TEntry('ano');
               
                $foto->addValidation('foto', new TRequiredValidator()); 
                $mes->addValidation('mes', new TRequiredValidator()); 
                $ano->addValidation('ano', new TRequiredValidator()); 
                
                $id->setEditable(false);

                $this->form->addFields([new TLabel('Id:')],[$id]);
                $this->form->addFields([new TLabel('foto:', '#ff0000')],[$foto]);
                $this->form->addFields([new TLabel('mes:')],[$mes]);
                $this->form->addFields([new TLabel('ano:')],[$ano]);

                $this->form->addAction('Salvar', new TAction([$this, 'onSave']), 'fa:floppy-o')->addStyleClass('btn-primary');
                $this->form->addAction('Limpar formulário', new TAction([$this, 'onClear']), 'fa:eraser #dd5a43');

                // vertical box container
                $container = new TVBox;
                $container->style = 'width: 100%';
                $container->class = 'form-container';
                $container->add(new TXMLBreadCrumb('menu.xml', 'Vencimento'));
                $container->add($this->form);
                parent::add($container);                
        }
}