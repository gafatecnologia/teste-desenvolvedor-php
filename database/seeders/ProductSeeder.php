<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 1,
            'name' => 'Nissin Lamen',
            'bar_code' => '314hl1j2ll314l',
            'unitary_value' => '23.5',
        ]);

        Product::create([
            'id' => 2,
            'name' => 'Bolacha Mabel',
            'bar_code' => '314h234234sdff',
            'unitary_value' => '65.5',
        ]);

        Product::create([
            'id' => 3,
            'name' => 'Sorvete Kibom',
            'bar_code' => '314h657fdssasd',
            'unitary_value' => '89.5',
        ]);

        Product::create([
            'id' => 4,
            'name' => 'Salgadinho Micos',
            'bar_code' => '314h76fg3swq',
            'unitary_value' => '12.6',
        ]);

        Product::create([
            'id' => 5,
            'name' => 'Batata Croni',
            'bar_code' => '31dsf323swq',
            'unitary_value' => '16.5',
        ]);

        Product::create([
            'id' => 6,
            'name' => 'Banana',
            'bar_code' => '313dfg5ds325sdfq',
            'unitary_value' => '11.5',
        ]);

        Product::create([
            'id' => 7,
            'name' => 'Tomate',
            'bar_code' => 'sdfgwqe12sdfq',
            'unitary_value' => '9.5',
        ]);

        Product::create([
            'id' => 8,
            'name' => 'Vinho Tinto',
            'bar_code' => 'sytty546sdfq',
            'unitary_value' => '2.5',
        ]);

        Product::create([
            'id' => 9,
            'name' => 'Cerveja',
            'bar_code' => 'sret321sdfq',
            'unitary_value' => '1.7',
        ]);

        Product::create([
            'id' => 10,
            'name' => 'Coca-Cola',
            'bar_code' => 'sg655et3456fq',
            'unitary_value' => '1.7',
        ]);

        Product::create([
            'id' => 11,
            'name' => 'Presunto Sadia',
            'bar_code' => '88ti5634556fq',
            'unitary_value' => '3.9',
        ]);

        Product::create([
            'id' => 12,
            'name' => 'Queijo',
            'bar_code' => '0kjl4556fq',
            'unitary_value' => '3.1',
        ]);

        Product::create([
            'id' => 13,
            'name' => 'Alface',
            'bar_code' => '02kdsf887q',
            'unitary_value' => '3.1',
        ]);

        Product::create([
            'id' => 14,
            'name' => 'Bacon',
            'bar_code' => '05qqdsf887q',
            'unitary_value' => '2.4',
        ]);

        Product::create([
            'id' => 15,
            'name' => 'Pão de Queijo',
            'bar_code' => 'gh123jhretw12321q',
            'unitary_value' => '7.7',
        ]);

        Product::create([
            'id' => 16,
            'name' => 'Sanduiche',
            'bar_code' => 'zh3sdf2365g21q',
            'unitary_value' => '6.1',
        ]);

        Product::create([
            'id' => 17,
            'name' => 'Sardinha',
            'bar_code' => 'ghjksdf2fghq',
            'unitary_value' => '3.0',
        ]);

        Product::create([
            'id' => 18,
            'name' => 'Uva',
            'bar_code' => 'g6t32ghq',
            'unitary_value' => '32.1',
        ]);

        Product::create([
            'id' => 19,
            'name' => 'Azeitonas',
            'bar_code' => 'gh33jk5436',
            'unitary_value' => '22.5',
        ]);

        Product::create([
            'id' => 20,
            'name' => 'Pão de Forma',
            'bar_code' => 'gh33wqsfgdhf7',
            'unitary_value' => '20.5',
        ]);

        Product::create([
            'id' => 21,
            'name' => 'Alho',
            'bar_code' => 'ehj33wfgf7',
            'unitary_value' => '10.1',
        ]);

        Product::create([
            'id' => 22,
            'name' => 'Pastel de Carne',
            'bar_code' => 'uy643wfgf7',
            'unitary_value' => '9.1',
        ]);

        Product::create([
            'id' => 23,
            'name' => 'Enroladinho de Salsicha',
            'bar_code' => '7ewe43wfgfh',
            'unitary_value' => '2.2',
        ]);

        Product::create([
            'id' => 24,
            'name' => 'Quindinho',
            'bar_code' => '744ytuh',
            'unitary_value' => '2.28',
        ]);

        Product::create([
            'id' => 25,
            'name' => 'Salsicha Seara',
            'bar_code' => 'hjg644y4h',
            'unitary_value' => '1.3',
        ]);

        Product::create([
            'id' => 26,
            'name' => 'Extrato de Tomate',
            'bar_code' => '314h65dsqwsasd',
            'unitary_value' => '12.5',
        ]);
    }
}
