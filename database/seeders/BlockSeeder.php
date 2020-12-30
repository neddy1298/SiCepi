<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [[
            'template_id' => 2,
            'block_name' => 'Sales Letter 1',
            'tags' => 'product_name business_field product_features email_address user_name company_name',
            'block_body' => '<p>Dear Sir/Madam,</p>
            <p>I would like to introduce our new product called {{product_name}}. We are in the business of {{business_field}}. We are glad to inform you about the good quality and reputation of our products. It will be our pleasure to provide you  products that meet your needs at reasonable prices.</p>
            <p>Our new launch is {{product_name}} . It carries {{product_features}}. You will get the best deal in the market with us.</p>
            <p>We are expecting a positive response. For further details and demonstrations, please feel free to contact our customer relationship manager at {{email_address}}.</p>
            <p>Thanking You.</p>
            <p>Sincerely,</p>
            <p>{{user_name}}</p>
            <p>{{company_name}}</p>',
        ],[
            'template_id' => 2,
            'block_name' => 'Sales Letter 2',
            'tags' => 'product_name company_industry product_features user_name company_name',
            'block_body' => '<p>Dear Sir/Madam,</p>
            <p>I am proud to introduce to you our company {{product_name}} . We have been in the business of  {{company_industry}} for many years. We are glad to inform you about the good quality and national reputation of our new products called {{product_name}} . It will be our pleasure to provide you with our products at reasonable prices and cater to your technical needs.</p>
            <p>Our new launch is {{product_name}} . This has been designed by our competent engineers who have taken into consideration the needs of business firms operating today, including {{product_features}} .</p>
            <p>If you would like to purchase the product, we are happy to provide you with a free demonstration. We are expecting a positive response.</p>
            <p>Thanking You.</p>
            <p>Sincerely,</p>
            <p>{{user_name}}</p>
            <p>{{company_name}}</p>',
        ],[
            'template_id' => 2,
            'block_name' => 'Sales Letter 3',
            'tags' => 'company_name product_name user_name',
            'block_body' => '<p>Dear customer,</p>
            <p>I am writing this letter to you on behalf of {{company_name}}. It has come to my knowledge that you may need {{product_name}} . It would be my pleasure to inform you that we has been manufacturing {{product_name}} and it is ISO 9002 certified company. Our products have been found to be the best among their competitors. It can be verified from the all company’s sold item’s data. Our products have proved to work in very harsh conditions.</p>
            <p>Based on the above description, I would like to welcome you to invest in our firm and place an order for it as soon as possible. I would try to get you a discount offer too, based on your order.</p>
            <p>Thank you.</p>
            <p>Best Regards,</p>
            <p>{{user_name}}</p>
            <p>{{company_name}}</p>',
        ],[
            'template_id' => 3,
            'block_name' => 'Sales Letter Sample 1',
            'tags' => '',
            'block_body' => '<p>This is a test letter 1 without any input fields, it will be directly generated after you click next.<br></p>',
        ],];
        foreach ($tags as $tag) {
            Block::create($tag);
        }
    }
}
