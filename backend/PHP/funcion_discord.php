<?php
function enviar_notificacion_discord_principal($nombre_titular, $introduccion, $enlace, $id_categoria){
    $Referencia_discord = '';

    switch($id_categoria){
        case 1: //Pertenece al bot de la categoria de corazon
            $Referencia_discord = "https://discord.com/api/webhooks/1370408760333308004/AOrn16J7iqvNHawmAVubEmvyicFF2TiJOo77q5hkQY0qRJSsXUu5H7hxdXu0p2YgYPzM";
            break;

        case 2: //Pertenece al bot de la categoria de informativos
            $Referencia_discord = "https://discord.com/api/webhooks/1370408831934529536/XKqfelAH6OIUxPcpH1YIXCYnTc5-ZKvXnqCnP-psDoaC3Vq1ucvmuinrixRQsyOUs4MW";
            break;
        
        case 3: //Pertenece al bot de la categoria de delicias
            $Referencia_discord = "https://discord.com/api/webhooks/1370408896354717847/MlslmaCc1wWbDEml3-4xr1PFV2NavNyiZ8PEQ_eF9erqtDdVioGmloos0gZ0ev9Hp-ah";
            break;

        case 4: //Pertenece al bot de la categoria de gaming
            $Referencia_discord = "https://discord.com/api/webhooks/1370408955435815103/-rESookIOvcH_4XtOOX7XYiBmkGL7wDJOtLuvnaXY7Ty8_KRwJwP-ARzf1bWuWHYPCVS";
            break;

        case 5: //Pertenece al bot de la categoria de elite
            $Referencia_discord = "https://discord.com/api/webhooks/1370408997118546011/WoA4AItQ5xhFnJRB9BNqne8u4wGVuYMLRg5bYWST0RHZTE_QUx1-8jkH-D4uoXeoMvWm";
            break;
    }

    $data = json_encode([
        "content" => "Hay una nueva noticia disponible en la web. Hecha un vistazo",
        "embeds" => [[
            "title" => $nombre_titular,
            "description" => $introduccion,
            "url" => $enlace,
        ]]
    ]);
    
    $options =[
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => $data,
        ]
    ];

    $envio = stream_context_create($options);
    file_get_contents($Referencia_discord, false, $envio);
}