<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Candidate;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::take(10)->get()->each(function($candidate) {
            return Tag::factory(5)->create(['candidate_id' => $candidate->id]);
        });
    }
}
