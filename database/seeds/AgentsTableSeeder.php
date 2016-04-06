<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agents = [
        	[
        		'name' => 'Jonathan Jacobs',
	        	'email' => 'jonathan@jacobsgroupvegas.com',
	        	'title' => 'Real Estate Agent',
	        	'phone' => '',
	        	'description' => 'Jonathan Jacobs has been a licensed agent in Las Vegas since 2005 and a resident since 1995. Specializing in selling and acquiring residential single family homes for his clients, he has sold hundreds of properties in the Las Vegas valley. Mr. Jacobs has been involved in all aspects of the single family investment process, facilitating construction, leasing and property management services, selling and acquiring for investor clients and developers. Jonathan is an expert in Marketing and negotiation of homes in Las Vegas, where he lives and works. He was recently named a top 40 under 40 agent in Las Vegas by GLVAR and a top 250 Hispanic agent out of more than 50,000 agents in the Nation by NAHREP. Jonathan is fluent in both English and Spanish.',
        	],
        	[
        		'name' => 'William Jacobs',
	        	'email' => 'william@jacobsgroupvegas.com',
	        	'title' => 'Real Estate Agent',
	        	'phone' => '',
	        	'description' => 'William has been involved in the Las Vegas Real Estate market for over a decade. Prior to becoming licensed, William managed acquisitions, construction, marketing, and leasing for countless properties across the Las Vegas Valley. An vast amount of Mr. Jacobs time is spent on helping out our communities and those who serve them. As a testament to that, he has helped develop and manage programs, such as the Helping our Heroes program for the Las Vegas Police Deparment and the Fireproof program for the Fire Deparment. William is an expert is residential real estate, and is always just a phone call away.',
        	],
              [
                           'name' => 'Nicole Davis',
                           'email' => 'info@jacobsgroupvegas.com',
                           'title' => 'Real Estate Agent',
                           'phone' => '',
                           'description' => 'Nicole began her career in real estate in 2011 where she started as the receptionist of Simply Vegas. Her ever-expanding role with the company quickly evolved in to becoming the Office Manager, to where she performs a wide variety of tasks including transaction coordination and file management. Before working in real estate she was an administrative assistant for a structural engineering firm, also assisting in project coordination. This background has helped her be meticulous in organization and dedicated to providing an extremely high standard of customer service.',
             ],
        	[
        		'name' => 'Mark Doppe',
	        	'email' => 'mark@jacobsgroupvegas.com',
	        	'title' => 'Real Estate Agent',
	        	'phone' => '',
	        	'description' => '',
        	],
        	[
        		'name' => 'Kelly',
	        	'email' => 'info@jacobsgroupvegas.com',
	        	'title' => 'Real Estate Agent',
	        	'phone' => '',
	        	'description' => '',
        	],
              [
                           'name' => 'Kelly',
                           'email' => 'info@jacobsgroupvegas.com',
                           'title' => 'Real Estate Agent',
                           'phone' => '',
                           'description' => '',
             ],
        	[
        		'name' => 'Washington Gonzalez',
	        	'email' => 'info@jacobsgroupvegas.com',
	        	'title' => 'Real Estate Agent',
	        	'phone' => '602-791-1707',
	        	'description' => 'Washington has been in the real estate industry for more than 10 years. Originally from Mexico City, Washington is bilingual and bi-cultural, speaking both Spanish and English fluently, as well as understanding both the Hispanic and Anglo cultures.

				His focus is on his clients preferences and objectives. Their complete satisfaction is a constant goal by delivering exceptional customer service. Known as having a connect to people personality, Washington easily communicates and interacts with clients who encompass a wide range of ages, races and backgrounds.

				Washington has experience representing buyers, sellers, Bankruptcy Trustees, and has performed bilingual acquisition and disposition services for the Community Noise Reduction Program (CNRP), with the City of Phoenix. Washington also has experience with property management for distressed properties.

				Washington holds a Bachelor of Business Administration in Marketing and International Business from Loyola University New Orleans.',
        	]
        ];

        foreach ($agents as $agent) {
        	\App\Agent::create($agent);
        }
    }
}
