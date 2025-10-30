<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;

class PwItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pwitems')->insert([
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 1,
                'username' => Crypt::encryptString(Str::random(10)),
                'password' => Crypt::encryptString('Ayg80<?%;9'),
                'note' => '1st Column Type: Ensure your database column is large enough to store the encrypted string.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 1,
                'username' => Crypt::encryptString(Str::random(10)),
                'password' => Crypt::encryptString('bHE;5i49Kf'),
                'note' => '2nd Column Type: Ensure your database column is large enough to store the encrypted string.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 1,
                'username' => Crypt::encryptString(Str::random(10)),
                'password' => Crypt::encryptString('Fv<b_0,01k'),
                'note' => '3rd Column Type: Ensure your database column is large enough to store the encrypted string.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 2,
                'username' => Crypt::encryptString(Str::random(15)),
                'password' => Crypt::encryptString('X7IDfx@6*>"E40i'),
                'note' => Str::random(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 3,
                'username' => Crypt::encryptString(Str::random(15)),
                'password' => Crypt::encryptString('oh:HB?u<298$#m{'),
                'note' => Str::random(40),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 4,
                'username' => Crypt::encryptString(Str::random(20)),
                'password' => Crypt::encryptString("6<'WeQ25PQ%Yw@,5YS$4"),
                'note' => Str::random(50),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 5,
                'username' => Crypt::encryptString(Str::random(15)),
                'password' => Crypt::encryptString('*{30(lyg@q{ee4:$NSVZX&m\z'),
                'note' => Str::random(50),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('pwitems')->insert([
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 23,
                'username' => Crypt::encryptString(Str::random(10)),
                'password' => Crypt::encryptString('Ayg80<?%;9'),
                'note' => '1st Column Type: Ensure your database column is large enough to store the encrypted string.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 24,
                'username' => Crypt::encryptString(Str::random(10)),
                'password' => Crypt::encryptString('bHE;5i49Kf'),
                'note' => '2nd Column Type: Ensure your database column is large enough to store the encrypted string.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 25,
                'username' => Crypt::encryptString(Str::random(10)),
                'password' => Crypt::encryptString('Fv<b_0,01k'),
                'note' => '3rd Column Type: Ensure your database column is large enough to store the encrypted string.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 26,
                'username' => Crypt::encryptString(Str::random(15)),
                'password' => Crypt::encryptString('X7IDfx@6*>"E40i'),
                'note' => Str::random(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 27,
                'username' => Crypt::encryptString(Str::random(15)),
                'password' => Crypt::encryptString('oh:HB?u<298$#m{'),
                'note' => Str::random(40),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 28,
                'username' => Crypt::encryptString(Str::random(20)),
                'password' => Crypt::encryptString("6<'WeQ25PQ%Yw@,5YS$4"),
                'note' => Str::random(50),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'slug' => Str::orderedUuid(),
                'site_id' => 29,
                'username' => Crypt::encryptString(Str::random(15)),
                'password' => Crypt::encryptString('*{30(lyg@q{ee4:$NSVZX&m\z'),
                'note' => Str::random(50),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
