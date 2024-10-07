<?php

namespace Database\Seeders;

use App\Models\ContactItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new ContactItem;
        $obj->map_code = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d774382.6761693481!2d-73.979681!3d40.69748800000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1728331407405!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        $obj->save();
    }
}
