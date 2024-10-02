<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDemoData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tlm_users')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Администратор',
                'type' => 1,
                'email' => 'test@test.ru',
                'phone' => '+7 (999) 888-77-66',
                'password' => '$2y$10$HrJ5Vq.kwzmjks/nRkGz8Oprib3THznXpcjaDh2uerieGjb3Q3Zoy',
                'created_at' => '2024-10-01 12:20:30',
                'updated_at' => '2024-10-01 12:20:30'
            ]
        ]);

        DB::table('tlm_products')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Брус квадратный, лиственница',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'cost' => '350.00',
                'cost_old' => '0.00',
                'author_id' => 1,
                'status' => 'publish',
                'in_stoke' => 139,
                'meta_title' => 'Брус квадратный, лиственница',
                'meta_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'receipt_at' => null
            ],
            [
                'id' => 2,
                'name' => 'Брус квадратный, осина',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'cost' => '438.00',
                'cost_old' => '490.00',
                'author_id' => 1,
                'status' => 'publish',
                'in_stoke' => 86,
                'meta_title' => 'Брус квадратный, осина',
                'meta_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'receipt_at' => null
            ],
            [
                'id' => 3,
                'name' => 'Брус круглый, сосна',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'cost' => '320.00',
                'cost_old' => '0.00',
                'author_id' => 1,
                'status' => 'publish',
                'in_stoke' => 450,
                'meta_title' => 'Брус круглый, сосна',
                'meta_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'receipt_at' => null
            ],
            [
                'id' => 4,
                'name' => 'Горбыль, сосна',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'cost' => '169.00',
                'cost_old' => '0.00',
                'author_id' => 1,
                'status' => 'publish',
                'in_stoke' => 0,
                'meta_title' => 'Горбыль, сосна',
                'meta_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'receipt_at' => '2024-11-09 19:11:10'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
