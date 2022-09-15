<?php

class viewLogin extends TPage
{
    private $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('LOGIN');
        $this->form->setClientValidation(true);
        $this->form->setFormTitle(_t('LOGIN'));
        
        // create the form fields
        $login       = new TEntry('login');
        $senha       = new TEntry('senha');

        // add the form fields
        $this->form->addFields( [new TLabel('LOGIN')],    [$login] );
        $this->form->addFields( [new TLabel('SENHA', 'red')],  [$senha] );

        $login->addValidation('login', new TRequiredValidator);
        $senha->addValidation('senha', new TRequiredValidator);

        // define the form action
        $this->form->addAction('ENTRAR', new TAction([$this, 'onSave']), 'fa:save green');

        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add($this->form);

        parent::add($vbox);
    }
    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    function onSave()
    {
        try
        {
            // open a transaction with database 'samples'
            TTransaction::open('venc');
            
            $this->form->validate(); // run form validation
            
            $data = $this->form->getData(); // get form data as array
            
            $usuario = new Usuario (1);
            
            $data['login']


            $object = new Usuario;  // create an empty object
     
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            TTransaction::close();  // close the transaction
            
            // shows the success message
            new TMessage('info', 'Record saved');
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    
    /**
     * Clear form
     */
    public function onClear()
    {
        $this->form->clear( TRUE );
    }
    
}