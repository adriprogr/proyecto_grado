<?php
function enviar_notificacion_discord_principal($nombre_titular, $introduccion, $enlace, $id_categoria){
    $Referencia_discord = '';
    // Añadir los enlaces que estan mencionados en el apartado de manual de usuario del documento
    switch($id_categoria){
        case 1: //Pertenece al bot de la categoria de corazon
            $Referencia_discord = "";
            break;

        case 2: //Pertenece al bot de la categoria de informativos
            $Referencia_discord = "";
            break;
        
        case 3: //Pertenece al bot de la categoria de delicias
            $Referencia_discord = "";
            break;

        case 4: //Pertenece al bot de la categoria de gaming
            $Referencia_discord = "";
            break;

        case 5: //Pertenece al bot de la categoria de elite
            $Referencia_discord = "";
            break;
    }
    
    if(empty($Referencia_discord)){
        return; // Esto permite seguir insertando noticias en la base de datos incluso si no estan las referencias de los bots incluidos.
    }

    $data = json_encode([ // envio el mensaje a traves de json
        "content" => "Hay una nueva noticia disponible en la web. Hecha un vistazo",
        "embeds" => [[
            "title" => $nombre_titular,
            "description" => $introduccion,
            "url" => $enlace,
        ]]
    ]);
    
    $options =[ // Detallo el protocolo
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => $data,
        ]
    ];

    $envio = stream_context_create($options); 
    file_get_contents($Referencia_discord, false, $envio); // Enviar el mensaje al canal de discord que corresponda
}