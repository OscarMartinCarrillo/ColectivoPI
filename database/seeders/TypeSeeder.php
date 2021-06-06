<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'nombre' => "Juegos sin Categoria",
            'descripcion' => "Juegos sin una categoría asignada."
            ]);
        Type::create([
            'nombre' => "Juegos de dados",
            'descripcion' => "Son juegos en los que se usan dados o equivalentes a ellos, tales como el tauli, el parchís, el parqués, el ludo, el backgammon, el Monopoly, el juego de la oca, serpientes y escaleras entre otros."
        ]);
        Type::create([
            'nombre' => "Juegos de fichas",
            'descripcion' => "Son juegos en los que se usan fichas marcadas, como el dominó, el mahjong, el jenga o el crokinole. También se pueden unir en algunos casos más de tres jugadores, pero regularmente juegan dos."
        ]);
        Type::create([
            'nombre' => "Juegos de cartas",
            'descripcion' => "Entre ellos están los juego de mesa tradicionales, bien sean con baraja francesa o española; o juegos de cartas como el Hanafuda que es tradicional en Japón. Una variante moderna y comercial de los juegos de cartas son los juegos de cartas coleccionables, como Magic: el encuentro o Yu-Gi-Oh!."
        ]);
        Type::create([
            'nombre' => "Juegos de rol",
            'descripcion' => "Fueron creados a mediados de la década de los 70. Son juegos en los que se interpreta el papel de otra persona y donde, en general, se pone a los jugadores en situaciones específicas que les permitan interpretar a personajes ficticios en situaciones imaginarias. El primer juego de rol en ser comercializado fue Dungeons & Dragons (1974), creado por Gary Gygax y Dave Arneson, que a lo largo de sus sucesivas ediciones se ha ido modificando, sobre todo en sus primeros años cuando acabó por dejar al uso de tablero como una opción prescindible del juego. Efectivamente, la característica propia de los juegos de rol es la interpretación de roles y no el uso de un tablero. Dungeons & Dragons es un juego de rol del género llamado fantasía heroica, pero en cuanto salió al mercado, inspiró la aparición de otros juegos de rol pertenecientes a muchos otros géneros, como el western, el género de capa y espada, la ciencia ficción, la ópera espacial, el terror gótico, el humor, el espionaje, la piratería, etc."
        ]);
        Type::create([
            'nombre' => "Juegos de tablero",
            'descripcion' => "Son los juegos que se juegan sobre un tablero, como los juegos de la familia del ajedrez (el ajedrez occidental, el Xiangqi o «ajedrez chino», el Shōgi o «ajedrez japonés», el Janggi o «ajedrez coreano» o el makruk, también llamado «ajedrez tailandés»), las damas, las damas chinas, el go (juego oriental originario de China), el Hnefatafl (familia de juegos de mesa germánicos), el Mancala (familia de juegos de tablero fundamentalmente africanos y también asiáticos), el Surakarta."
        ]);
        Type::create([
            'nombre' => "Juegos de guerra",
            'descripcion' => "Aunque haya que diferenciarlos claramente de los llamados «juegos de tablero» (véase más arriba), a estos juegos también se les llama así, pues en la inmensa mayor parte de los casos utilizan un tablero para el desarrollo de sus partidas. En realidad el mundo hispanohablante los designa popularmente con el anglicismo wargames, del que el término «juegos de guerra» es una traducción literal. Ejemplos de esta clase de juegos son el Risk (o su versión argentina el TEG), BattleTech, Wings of War, Stratego (1908), etc. Sobre el tablero se desplazan fichas, figuras troqueladas o incluso miniaturas que en general representan unidades de combate (tropas), aunque también hay juegos de tablero de esta categoría que representan individuos, como por ejemplo BattleTech, en el que sobre cada casilla se encuentra una figura que simboliza a un único mech (un robot gigante de combate), o conceptos abstractos como influencia, en Twilight Struggle. El objetivo de estos juegos puede ser, por ejemplo, el de conquistar una determinada zona del mapa o mundo o destruir a un determinado jugador, aunque en la mayor parte de los casos los juegos de guerra dividen los bandos participantes en dos, representando los bandos de batallas históricas y llevando el juego hasta la victoria de una de las dos partes."
        ]);
        Type::create([
            'nombre' => "Juegos de miniaturas",
            'descripcion' => 'Son una subcategoría de los juegos de guerra y de aventura. La diferencia es que la mayor parte de los juegos de guerra utilizan un tablero sobre el que las fichas o figuras avanzan mediante casillas, mientras que la mayor parte de los juegos de miniaturas emplean exclusivamente miniaturas situadas sobre maquetas que representan el relieve e incluso cursos de agua, arquitectura o vegetación. Las figuras, al no estar situadas sobre un tablero dividido en casillas, avanzan mediante distancias establecidas en centímetros. Los juegos de miniaturas más conocidos son los producidos por la editorial Games Workshop para su universo Warhammer Fantasy: Warhammer Fantasy Battle,Warhammer 40.000, El Señor de los Anillos, el juego de batallas estratégicas y "El Hobbit, la batalla de los 5 ejércitos".'
        ]);
        Type::create([
            'nombre' => "Juegos temáticos",
            'descripcion' => "Han cosechado gran popularidad durante el siglo XX. Algunos ejemplos de estos juegos son el Monopoly, la Oca, el Pictionary, el Trivial Pursuit, el Scrabble, el Scattergories, Los Colonos de Catán, Machiavelli, etc. En esta categoría también se encuentran los llamados juegos de mazmorras, que incluyen un tablero que representa una mazmorra subterránea en la que los jugadores deben ir avanzando y superando las dificultades que se van encontrando (vencer monstruos y criaturas maléficas, obtener tesoros, etcétera). Ejemplos típicos de juegos de mazmorras son el clásico HeroQuest (hoy en día ya descatalogado) o Descent, juego de mazmorras actual del mismo estilo que HeroQuest."
        ]);
    }
}
