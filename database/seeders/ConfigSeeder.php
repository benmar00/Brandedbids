<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Config::create([
			'flag_type' => 'favicon',
            'name' => 'Favicon',
			'flag_value' => '',
			'has_image' => 1,
			'is_config' => 1,
		]);
		Config::create([
			'flag_type' => 'logo',
			'name' => 'Logo',
			'flag_value' => '',
			'has_image' => 1,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Footer Logo',
			'flag_type' => 'footer_logo',
			'flag_value' => '',
			'has_image' => 1,
			'is_config' => 1,
		]);
		Config::create([
			'flag_type' => 'company_number',
			'name' => 'Company Number',

			'flag_value' => '+1 123 456 7890',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Company Email',

			'flag_type' => 'company_email',
			'flag_value' => 'info@companyemail.com',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Company Address',

			'flag_type' => 'company_address',
			'flag_value' => 'The visual form of a document or a typeface.',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Facebook',

			'flag_type' => 'facebook',
			'flag_value' => 'https://www.facebook.com/',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Twitter',

			'flag_type' => 'twitter',
			'flag_value' => 'https://twitter.com/',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Instagram',

			'flag_type' => 'instagram',
			'flag_value' => 'https://www.instagram.com/',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Linkedin',
			'flag_type' => 'linkedin',
			'flag_value' => 'https://www.linkedin.com/',
			'has_image' => 0,
			'is_config' => 1,
		]);
		Config::create([
			'name' => 'Footer Content',
			'flag_type' => 'footer_content',
			'flag_value' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.',
			'has_image' => 2,
			'is_config' => 1,
		]);
    }
}
