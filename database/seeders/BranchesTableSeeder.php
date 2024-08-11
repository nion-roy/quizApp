<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $districts = [
      ['branch_name' => 'Bagerhat', 'slug' => 'bagerhat'],
      ['branch_name' => 'Bandarban', 'slug' => 'bandarban'],
      ['branch_name' => 'Barguna', 'slug' => 'barguna'],
      ['branch_name' => 'Barishal', 'slug' => 'barishal'],
      ['branch_name' => 'Bhola', 'slug' => 'bhola'],
      ['branch_name' => 'Bogura', 'slug' => 'bogura'],
      ['branch_name' => 'Brahmanbaria', 'slug' => 'brahmanbaria'],
      ['branch_name' => 'Chandpur', 'slug' => 'chandpur'],
      ['branch_name' => 'Chattogram', 'slug' => 'chattogram'],
      ['branch_name' => 'Chuadanga', 'slug' => 'chuadanga'],
      ['branch_name' => 'Cox\'s Bazar', 'slug' => 'coxs-bazar'],
      ['branch_name' => 'Cumilla', 'slug' => 'cumilla'],
      ['branch_name' => 'Dhaka', 'slug' => 'dhaka'],
      ['branch_name' => 'Dinajpur', 'slug' => 'dinajpur'],
      ['branch_name' => 'Faridpur', 'slug' => 'faridpur'],
      ['branch_name' => 'Feni', 'slug' => 'feni'],
      ['branch_name' => 'Gaibandha', 'slug' => 'gaibandha'],
      ['branch_name' => 'Gazipur', 'slug' => 'gazipur'],
      ['branch_name' => 'Gopalganj', 'slug' => 'gopalganj'],
      ['branch_name' => 'Habiganj', 'slug' => 'habiganj'],
      ['branch_name' => 'Jamalpur', 'slug' => 'jamalpur'],
      ['branch_name' => 'Jashore', 'slug' => 'jashore'],
      ['branch_name' => 'Jhalokathi', 'slug' => 'jhalokathi'],
      ['branch_name' => 'Jhenaidah', 'slug' => 'jhenaidah'],
      ['branch_name' => 'Joypurhat', 'slug' => 'joypurhat'],
      ['branch_name' => 'Khagrachari', 'slug' => 'khagrachari'],
      ['branch_name' => 'Khulna', 'slug' => 'khulna'],
      ['branch_name' => 'Kishoreganj', 'slug' => 'kishoreganj'],
      ['branch_name' => 'Kurigram', 'slug' => 'kurigram'],
      ['branch_name' => 'Kushtia', 'slug' => 'kushtia'],
      ['branch_name' => 'Lakshmipur', 'slug' => 'lakshmipur'],
      ['branch_name' => 'Lalmonirhat', 'slug' => 'lalmonirhat'],
      ['branch_name' => 'Madaripur', 'slug' => 'madaripur'],
      ['branch_name' => 'Magura', 'slug' => 'magura'],
      ['branch_name' => 'Manikganj', 'slug' => 'manikganj'],
      ['branch_name' => 'Meherpur', 'slug' => 'meherpur'],
      ['branch_name' => 'Moulvibazar', 'slug' => 'moulvibazar'],
      ['branch_name' => 'Munshiganj', 'slug' => 'munshiganj'],
      ['branch_name' => 'Mymensingh', 'slug' => 'mymensingh'],
      ['branch_name' => 'Naogaon', 'slug' => 'naogaon'],
      ['branch_name' => 'Narail', 'slug' => 'narail'],
      ['branch_name' => 'Narayanganj', 'slug' => 'narayanganj'],
      ['branch_name' => 'Narsingdi', 'slug' => 'narsingdi'],
      ['branch_name' => 'Natore', 'slug' => 'natore'],
      ['branch_name' => 'Netrokona', 'slug' => 'netrokona'],
      ['branch_name' => 'Nilphamari', 'slug' => 'nilphamari'],
      ['branch_name' => 'Noakhali', 'slug' => 'noakhali'],
      ['branch_name' => 'Pabna', 'slug' => 'pabna'],
      ['branch_name' => 'Panchagarh', 'slug' => 'panchagarh'],
      ['branch_name' => 'Patuakhali', 'slug' => 'patuakhali'],
      ['branch_name' => 'Pirojpur', 'slug' => 'pirojpur'],
      ['branch_name' => 'Rajbari', 'slug' => 'rajbari'],
      ['branch_name' => 'Rajshahi', 'slug' => 'rajshahi'],
      ['branch_name' => 'Rangamati', 'slug' => 'rangamati'],
      ['branch_name' => 'Rangpur', 'slug' => 'rangpur'],
      ['branch_name' => 'Satkhira', 'slug' => 'satkhira'],
      ['branch_name' => 'Shariatpur', 'slug' => 'shariatpur'],
      ['branch_name' => 'Sherpur', 'slug' => 'sherpur'],
      ['branch_name' => 'Sirajganj', 'slug' => 'sirajganj'],
      ['branch_name' => 'Sunamganj', 'slug' => 'sunamganj'],
      ['branch_name' => 'Sylhet', 'slug' => 'sylhet'],
      ['branch_name' => 'Tangail', 'slug' => 'tangail'],
      ['branch_name' => 'Thakurgaon', 'slug' => 'thakurgaon'],
    ];

    foreach ($districts as &$district) {
      $district['user_id'] = 1;
      $district['status'] = 1;
      $district['created_at'] = Carbon::now();
      $district['updated_at'] = Carbon::now();
    }

    DB::table('branches')->insert($districts);
  }
}
