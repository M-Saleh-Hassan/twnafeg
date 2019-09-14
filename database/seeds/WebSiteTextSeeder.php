<?php

use Illuminate\Database\Seeder;
use App\Models\WebsiteText;

class WebSiteTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(WebsiteText::first()) return;
        $WebsiteText = WebsiteText::create([
            'how_it_started' => 'It all started in the year 2002 at the Nyarugusu refugee camp in Tanzania. As horrific stories of rape, dismemberment and slaughter shook Cassie (later to establish the movement) to his core, one thing became inescapably clear - there had to be a deeper catalyst for this brokenness than what initially met the eye. 15 years of interaction with leaders around the world, hundreds of hours of research and thousands of meetings later, we are even more convinced that fatherlessness wasn’t just an issue facing those refugees.',
            'quote1' => 'Virtually every major social pathology has been linked to fatherlessness.',
            'then_in_egypt' => 'Bassem Abdel Malek and a group of other men attended a session given by Cassie on Fatherhood when he visited Egypt. They were truly inspired and since then the movement started in Egypt training more than 4000 men in Cairo alone. In Bassem’s own words “ I started working with the world needs a father movement in 2012 when Cassie came to Egypt to give the full fatherhood training. I started after in my house by inviting other fathers and husbands and trained them back in 2013”.',
            'quote2' => 'Fatherhood is a profession not a title',
            'camps_description' => '“following the success of the movement in Egypt, we came up with the idea of inviting the fathers and their children to spend 2 nights in a father & child camp. During these camps, the fathers and their kids can enjoy playing and spending quality time together and also listen to the fatherhood sessions. We focus in these camps on all the fathers’ roles according to the TWNAF training to educate them on the positive effect of fatherhood on children. Another very important aspect of these camps is giving the possibility to fathers to apply what they learned right away on their sons and daughters. So far we trained around 4500 men throughout these camps.”',
            'internationally_today' => 'The World Needs A Father movement became an international movement in more than 80 countries around the world restoring and bringing the health back to thousands of families.',
            'vision' => 'TWNAF (The World Needs A Father) believes that every community faces fatherlessness. TWNAF is about training communities of men to understand the value of their roles as fathers, and giving them the tools to train other men around them, so that as heaven splashes down in their homes, the ripples flow through their community. Our Vision is that every CHILD grows up through a mature, selfless, available, accountable and devoted FATHER',
            'quote3' => "If you don't have time, don't get children",
            'mother_design' => 'The Mother Design was developed in response to an outpouring of desire from the wives of men who had been to a TWNAF training. The training content speaks to men in depth, but what about the wives? And what about the single mothers? We realised that reaching the fathers was only part of the puzzle; we needed to empower the mothers too. Part of our goal is to help mothers support their husbands, because the TWNAF vision is counter-cultural and cannot be accomplished alone. But even closer to our hearts is helping mothers and wives understand the unique keys they hold to building a strong marriage and a firm, loving foundation for the family.',
            'quote4' => 'Children listen to what they see not what they hear',
            'who_we_are' => 'TWNAF crew is always growing. Today we are 15 members who are all volunteers and active in supporting TWNAF mission in Egypt and the MENA region. Led by Bassem Abdel Malek, all members including the leader are volunteers. We are accepting new members who can give us time and support our cause. If you are interested to join please send us on',
            'get_in_touch' => 'You can reach us through the following channels or simply send us an email anytime you want. We are open to all suggestions.',
        ]);

    }
}
