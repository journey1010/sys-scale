<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['name' => 'Chachapoyas','id_department' => 1],
            ['name' => 'Bagua','id_department' => 1],
            ['name' => 'Bongará','id_department' => 1],
            ['name' => 'Condorcanqui','id_department' => 1],
            ['name' => 'Luya','id_department' => 1],
            ['name' => 'Rodríguez de Mendoza','id_department' => 1],
            ['name' => 'Utcubamba','id_department' => 1],
            ['name' => 'Huaraz','id_department' => 2],
            ['name' => 'Aija','id_department' => 2],
            ['name' => 'Antonio Raymondi','id_department' => 2],
            ['name' => 'Asunción','id_department' => 2],
            ['name' => 'Bolognesi','id_department' => 2],
            ['name' => 'Carhuaz','id_department' => 2],
            ['name' => 'Carlos Fermín Fitzcarrald','id_department' => 2],
            ['name' => 'Casma','id_department' => 2],
            ['name' => 'Corongo','id_department' => 2],
            ['name' => 'Huari','id_department' => 2],
            ['name' => 'Huarmey','id_department' => 2],
            ['name' => 'Huaylas','id_department' => 2],
            ['name' => 'Mariscal Luzuriaga','id_department' => 2],
            ['name' => 'Ocros','id_department' => 2],
            ['name' => 'Pallasca','id_department' => 2],
            ['name' => 'Pomabamba','id_department' => 2],
            ['name' => 'Recuay','id_department' => 2],
            ['name' => 'Santa','id_department' => 2],
            ['name' => 'Sihuas','id_department' => 2],
            ['name' => 'Yungay','id_department' => 2],
            ['name' => 'Abancay','id_department' => 3],
            ['name' => 'Andahuaylas','id_department' => 3],
            ['name' => 'Antabamba','id_department' => 3],
            ['name' => 'Aymaraes','id_department' => 3],
            ['name' => 'Cotabambas','id_department' => 3],
            ['name' => 'Chincheros','id_department' => 3],
            ['name' => 'Grau','id_department' => 3],
            ['name' => 'Arequipa','id_department' => 4],
            ['name' => 'Camaná','id_department' => 4],
            ['name' => 'Caravelí','id_department' => 4],
            ['name' => 'Castilla','id_department' => 4],
            ['name' => 'Caylloma','id_department' => 4],
            ['name' => 'Condesuyos','id_department' => 4],
            ['name' => 'Islay','id_department' => 4],
            ['name' => 'La Unión','id_department' => 4],
            ['name' => 'Huamanga','id_department' => 5],
            ['name' => 'Cangallo','id_department' => 5],
            ['name' => 'Huanca Sancos','id_department' => 5],
            ['name' => 'Huanta','id_department' => 5],
            ['name' => 'La Mar','id_department' => 5],
            ['name' => 'Lucanas','id_department' => 5],
            ['name' => 'Parinacochas','id_department' => 5],
            ['name' => 'Pàucar del Sara Sara','id_department' => 5],
            ['name' => 'Sucre','id_department' => 5],
            ['name' => 'Víctor Fajardo','id_department' => 5],
            ['name' => 'Vilcas Huamán','id_department' => 5],
            ['name' => 'Cajamarca','id_department' => 6],
            ['name' => 'Cajabamba','id_department' => 6],
            ['name' => 'Celendín','id_department' => 6],
            ['name' => 'Chota','id_department' => 6],
            ['name' => 'Contumazá','id_department' => 6],
            ['name' => 'Cutervo','id_department' => 6],
            ['name' => 'Hualgayoc','id_department' => 6],
            ['name' => 'Jaén','id_department' => 6],
            ['name' => 'San Ignacio','id_department' => 6],
            ['name' => 'San Marcos','id_department' => 6],
            ['name' => 'San Miguel','id_department' => 6],
            ['name' => 'San Pablo','id_department' => 6],
            ['name' => 'San Cruz','id_department' => 6],
            ['name' => 'Prov. Const. del Callao','id_department' => 7],
            ['name' => 'Cusco','id_department' => 8],
            ['name' => 'Acomayo','id_department' => 8],
            ['name' => 'Anta','id_department' => 8],
            ['name' => 'Calca','id_department' => 8],
            ['name' => 'Canas','id_department' => 8],
            ['name' => 'Canchis','id_department' => 8],
            ['name' => 'Chumbivilcas','id_department' => 8],
            ['name' => 'Espinar','id_department' => 8],
            ['name' => 'La Convención','id_department' => 8],
            ['name' => 'Paruro','id_department' => 8],
            ['name' => 'Paucartambo','id_department' => 8],
            ['name' => 'Quispicanchi','id_department' => 8],
            ['name' => 'Urubamba','id_department' => 8],
            ['name' => 'Huancavelica','id_department' => 9],
            ['name' => 'Acobamba','id_department' => 9],
            ['name' => 'Angaraes','id_department' => 9],
            ['name' => 'Castrovirreyna','id_department' => 9],
            ['name' => 'Churcampa','id_department' => 9],
            ['name' => 'Huaytará','id_department' => 9],
            ['name' => 'Tayacaja','id_department' => 9],
            ['name' => 'Huánuco','id_department' => 10],
            ['name' => 'Ambo','id_department' => 10],
            ['name' => 'Dos de Mayo','id_department' => 10],
            ['name' => 'Huacaybamba','id_department' => 10],
            ['name' => 'Huamalíes','id_department' => 10],
            ['name' => 'Leoncio Prado','id_department' => 10],
            ['name' => 'Marañón','id_department' => 10],
            ['name' => 'Pachitea','id_department' => 10],
            ['name' => 'Puerto Inca','id_department' => 10],
            ['name' => 'Lauricocha','id_department' => 10],
            ['name' => 'Yarowilca','id_department' => 10],
            ['name' => 'Ica','id_department' => 11],
            ['name' => 'Chincha','id_department' => 11],
            ['name' => 'Nasca','id_department' => 11],
            ['name' => 'Palpa','id_department' => 11],
            ['name' => 'Pisco','id_department' => 11],
            ['name' => 'Huancayo','id_department' => 12],
            ['name' => 'Concepción','id_department' => 12],
            ['name' => 'Chanchamayo','id_department' => 12],
            ['name' => 'Jauja','id_department' => 12],
            ['name' => 'Junín','id_department' => 12],
            ['name' => 'Satipo','id_department' => 12],
            ['name' => 'Tarma','id_department' => 12],
            ['name' => 'Yauli','id_department' => 12],
            ['name' => 'Chupaca','id_department' => 12],
            ['name' => 'Trujillo','id_department' => 13],
            ['name' => 'Ascope','id_department' => 13],
            ['name' => 'Bolívar','id_department' => 13],
            ['name' => 'Chepén','id_department' => 13],
            ['name' => 'Julcán','id_department' => 13],
            ['name' => 'Otuzco','id_department' => 13],
            ['name' => 'Pacasmayo','id_department' => 13],
            ['name' => 'Pataz','id_department' => 13],
            ['name' => 'Sánchez Carrión','id_department' => 13],
            ['name' => 'Santiago de Chuco','id_department' => 13],
            ['name' => 'Gran Chimú','id_department' => 13],
            ['name' => 'Virú','id_department' => 13],
            ['name' => 'Chiclayo','id_department' => 14],
            ['name' => 'Ferreñafe','id_department' => 14],
            ['name' => 'Lambayeque','id_department' => 14],
            ['name' => 'Lima','id_department' => 15],
            ['name' => 'Barranca','id_department' => 15],
            ['name' => 'Cajatambo','id_department' => 15],
            ['name' => 'Canta','id_department' => 15],
            ['name' => 'Cañete','id_department' => 15],
            ['name' => 'Huaral','id_department' => 15],
            ['name' => 'Huarochirí','id_department' => 15],
            ['name' => 'Huaura','id_department' => 15],
            ['name' => 'Oyón','id_department' => 15],
            ['name' => 'Yauyos','id_department' => 15],
            ['name' => 'Maynas','id_department' => 16],
            ['name' => 'Alto Amazonas','id_department' => 16],
            ['name' => 'Loreto','id_department' => 16],
            ['name' => 'Mariscal Ramón Castilla ','id_department' => 16],
            ['name' => 'Requena','id_department' => 16],
            ['name' => 'Ucayali','id_department' => 16],
            ['name' => 'Datem del Marañón','id_department' => 16],
            ['name' => 'Putumayo','id_department' => 16],
            ['name' => 'Tambopata','id_department' => 17],
            ['name' => 'Manu','id_department' => 17],
            ['name' => 'Tahuamanu','id_department' => 17],
            ['name' => 'Mariscal Nieto','id_department' => 18],
            ['name' => 'General Sánchez Cerro','id_department' => 18],
            ['name' => 'Ilo','id_department' => 18],
            ['name' => 'Pasco','id_department' => 19],
            ['name' => 'Daniel Alcides Carrión','id_department' => 19],
            ['name' => 'Oxapampa','id_department' => 19],
            ['name' => 'Piura','id_department' => 20],
            ['name' => 'Ayabaca','id_department' => 20],
            ['name' => 'Huancabamba','id_department' => 20],
            ['name' => 'Morropón','id_department' => 20],
            ['name' => 'Paita','id_department' => 20],
            ['name' => 'Sullana','id_department' => 20],
            ['name' => 'Talara','id_department' => 20],
            ['name' => 'Sechura','id_department' => 20],
            ['name' => 'Puno','id_department' => 21],
            ['name' => 'Azángaro','id_department' => 21],
            ['name' => 'Carabaya','id_department' => 21],
            ['name' => 'Chucuito','id_department' => 21],
            ['name' => 'El Collao','id_department' => 21],
            ['name' => 'Huancané','id_department' => 21],
            ['name' => 'Lampa','id_department' => 21],
            ['name' => 'Melgar','id_department' => 21],
            ['name' => 'Moho','id_department' => 21],
            ['name' => 'San Antonio de Putina','id_department' => 21],
            ['name' => 'San Román','id_department' => 21],
            ['name' => 'Sandia','id_department' => 21],
            ['name' => 'Yunguyo','id_department' => 21],
            ['name' => 'Moyobamba','id_department' => 22],
            ['name' => 'Bellavista','id_department' => 22],
            ['name' => 'El Dorado','id_department' => 22],
            ['name' => 'Huallaga','id_department' => 22],
            ['name' => 'Lamas','id_department' => 22],
            ['name' => 'Mariscal Cáceres','id_department' => 22],
            ['name' => 'Picota','id_department' => 22],
            ['name' => 'Rioja','id_department' => 22],
            ['name' => 'San Martín','id_department' => 22],
            ['name' => 'Tocache','id_department' => 22],
            ['name' => 'Tacna','id_department' => 23],
            ['name' => 'Candarave','id_department' => 23],
            ['name' => 'Jorge Basadre','id_department' => 23],
            ['name' => 'Tarata','id_department' => 23],
            ['name' => 'Tumbes','id_department' => 24],
            ['name' => 'Contralmirante Villar','id_department' => 24],
            ['name' => 'Zarumilla','id_department' => 24],
            ['name' => 'Coronel Portillo','id_department' => 25],
            ['name' => 'Atalaya','id_department' => 25],
            ['name' => 'Padre Abad','id_department' => 25],
            ['name' => 'Purús','id_department' => 25],

        ];

        DB::table('province')->insert($list);
    }
}
