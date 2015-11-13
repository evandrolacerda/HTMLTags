<?php
    require './HTMLForm.php';
    require './HTMLInput.php';
    require './HTMLLabel.php';
    require './HTMLTextNode.php';
    require './HTMLDIV.php';
    require './HTMLSelect.php';
    require './HTMLOption.php';
    require './HTMLButton.php';
    require './HTMLTextArea.php';
    require './HTMLRadio.php';
    require './HTMLAnchor.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $form = new HTMLForm('form_1');
        
        $divNome = new HTMLDIV('d_nome');
        
        
        
        $form->setMethod('POST');
        $form->setAction( $_SERVER['SCRIPT_NAME']);
        
        $label = new HTMLLabel('Nome', 'i_nome');
        $inputNome = new HTMLInput('text', 'i_nome');
        $inputNome->addAttribute('value', "Evandro Pereira de Lacerda");
        $inputNome->addAttribute('size', 60 );
        
        $text = new HTMLTextNode('Nome');
        
        $label->addChild( $inputNome );
        
        $divNome->addChild( $label );
        //***************************************************
        $divNascimento = new HTMLDIV('d_nasc');
        
        $labelNascimento = new HTMLLabel("Data de Nascimento", 'i_nasc');
        
        $nascimento = new HTMLInput('date', 'i_nasc');
        $nascimento->addAttribute('size', 25 );
        $nascimento->addClass('input_n');
        $nascimento->addClass('input_md');
        
        $labelNascimento->addChild( $nascimento );
        
        $divNascimento->addChild($labelNascimento);
        //***************************************************
        
        $arrayOptions = ['Corsa', 'Fiesta', 'Cobalt', 'Onix', 'Escort', 'Ipanema', 'Uno', 'Palio', 'Gol', 'Verona'];
        $select = new HTMLSelect('carros');
        
        foreach( $arrayOptions as $opt )
        {
            if( $opt === 'Fiesta'){
                $select->addChild( new HTMLOption( $opt, $opt, true ) );
            }
            else{
                $select->addChild( new HTMLOption( $opt, $opt ) );
            }
            
        }
        
        $divTextArea = new HTMLDIV('text_area');
        
        $textarea = new HTMLTextArea('message', 30, 5 );
        
        $divTextArea->addChild( $textarea );
        
        $radio = new HTMLRadio( 'sim', 'Deseja receber atualizações do nosso site');
        $divTextArea->addChild( $radio );
        
        $divRadio = new HTMLDIV('radio_b');
        
        $divRadio->addChild( $radio );
        
        $anchor = new HTMLAnchor('http://www.uol.com.br', 'Universo Online');
        
        $divAnchor = new HTMLDIV('ancora');
        
        $divAnchor->addChild( $anchor );
        
        $button = new HTMLButton( 'Registrar', 'submnit');
        
        
        
        $form->addChild( $divNome );
        $form->addChild( $divNascimento );
        $form->addChild( $select );
        $form->addChild( $divTextArea );
        $form->addChild( $divRadio );
        $form->addChild( $divAnchor );
        $form->addChild( $button );
        
        echo $form;
        
        ?>
    </body>
</html>
