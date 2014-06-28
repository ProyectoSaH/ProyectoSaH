<html>
    <head>
     
   

       </head>

<style>
	
#content_div
{

border: 4 solid black;
display: block;
width: 100%;
padding: 0;
margin-bottom: 20px;
font-size: 21px;
line-height: inherit;
border-bottom: 2px solid #e5e5e5;

position: absolute;  
margin-left: 40px;
font-size: 16px;
color: black;
padding-left: 50px;


}

#content_div div
{
width:240px;
margin:10px;


}
#content_div select
{;
width:220px;



}
#content_div text{;
width:220px;
}

</style>


    <body>
        <p class="bg-info"> <legend> &nbsp Informes </legend> </p>
     <div id='content_div'>

<?php


   echo $this->Form->create('User', array('action'=>'view_info'));

 

   echo '<b>Tipo de Documento </b><br>'.$this->Form->select('field', array(
    'Usuarios' => 'Usuarios',
    'Clientes' => 'Clientes'), array('empty'=>false));

   echo '<br><br>'.$this->Form->button('Ver', array('name' => 'type_1', 'value' => 'true', 'class'=>'btn btn-primary'));
   echo '  '.$this->Form->button('Descargar', array('name' => 'type_2', 'value' => 'false', 'class'=>'btn btn-primary'));





   echo $this->Form->end(); 
   echo '<br>';


?>



        </div>
  </body>
</html>