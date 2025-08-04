<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionGroup;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data = [
            [
                'section_id' => 1,
                'title' => 'Reading Passage 1',
                'type' => 'text',
                'shared_content' => 'Chatbot therapy  (Mental Health & Technology)\nMore people are using AI chatbots, such as ChatGPT and DeepSeek, as personal therapists. These services provide emotional support and a sense of companionship, particularly for people in remote areas or those who cannot afford traditional therapy. AI can listen, respond with empathy, and personalize answers based on user behavior. Experts like Ronnie Das say AI can now copy human emotions and provide helpful responses for mental well-being.\nHowever, there are some concerns. AI doesn’t truly understand emotions or care about people like human therapists do. Dr. Sara Quinn from the Australian Psychological Society warns that AI only imitates conversations and cannot recognize deep emotional needs or dangerous situations. She believes therapy needs privacy rules and careful integration of AI tools.\nEven so, AI can help those who would otherwise suffer without support. For many, therapy is too expensive, and AI fills that gap. Experts agree AI’s role in mental health will continue to grow.',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 2',
                'type' => 'text',
                'shared_content' => 'Students using A.I. over humans to learn English (Technology in Education)\nMore and more students in Japan are using artificial intelligence (AI) to learn English and other languages. The language-learning app Duolingo conducted a survey on how students study languages. More than 4,700 Japanese students answered questions about their language-learning habits. The survey found that the number of people using ChatGPT and other AI tools increased by more than 80 per cent in 2024. AI was particularly popular with younger people. The researchers said more young people used AI than took face-to-face lessons. However, some people in their 20s were not totally happy with AI lessons. They said AI lacked natural responses and was a little boring.\nDuolingo said: \"We\'re in the midst of an AI revolution.…Technology has long had an impact on language learning.\" They found that apps were the most popular media in Japan to learn languages. English was the most studied language, followed by Korean. People are studying Korean \"to understand the language as spoken by…favourite artists and celebrities.\" Duolingo said around 58 percent of people who took the survey used language-learning apps. This was followed by video streaming platforms like YouTube and Netflix (37%), textbooks (36%) and online lessons (16%). The number of people going to a language school is decreasing. Just 13.8 percent of people went to classes with a teacher.',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 3',
                'type' => 'text',
                'shared_content' => 'Fog Harvesting could provide water for dry cities (Environmental Innovation)\nMany regions in the world have very little rain. It is a daily challenge for people to get water. Scientists have found a new way that could help some of the driest towns and cities in the world. Capturing water from fog could provide drinking water to millions of people. Researchers in Chile have been studying how fog harvesting could help to collect water. Fog harvesting is a simple process. Water from fog is collected on large mesh screens that are hung between poles. When fog and clouds pass through the screens, droplets of water stick to the mesh. This water then drips into pipes below the screens and ends up in storage tanks. It is a cheap and easy way of collecting water in dry areas.\nThe researchers are from Universidad Mayor, a private university in the capital city Santiago. They have been testing fog harvesting in the desert town of Alto Hospicio. The town gets an average of less than 5 mm of rainfall a year. Many people who live there get their drinking water delivered by truck. Researcher Dr Virginia Carter Gamberini said fog harvesting could bring a \"new era\" to the town. She said her research \"represents a notable shift in the perception of fog water use – from a rural, rather small-scale solution to a practical water resource for cities\". She added: \"Water from the clouds could enhance our cities\' resilience to climate change, while improving access to clean water.\"',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 4',
                'type' => 'text',
                'shared_content' => 'Plants in the arctic are changing (Climate Change)\nThe Arctic is warming faster than any other place on Earth. This rapid warming affects not only glaciers and animals like caribou but also Arctic plant life.\nScientists from Team Shrub study how plant communities are changing, especially shrubs, which are now growing taller and becoming more common. This process is called shrubification, and it can harm the environment, as it affects food sources like lichen that caribou need to survive. The growth of shrubs also makes it harder for caribou to migrate and avoid predators. Although the total number of Arctic plant species is not changing much overall, there are big local differences. Some areas are experiencing changes in the kinds of plants that grow there. Moreover, researchers are using drones and large data sets to monitor these shifts in detail.\nThese changes do not only affect animals but also people. For northern Indigenous communities, caribou are culturally and economically important. Climate change in the Arctic is no longer a future threat. It is already happening.',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 5',
                'type' => 'text',
                'shared_content' => 'A large ship crashes near a man’s house (Disaster and Infrastructure)\nA Norwegian man, Johan Helberg, had a surprising experience when he woke up to find a massive cargo ship just meters from his house. The 135-meter-long ship, called NCL Salten, had run aground early in the morning near his home along the Trondheim Fjord.\nJohan was unaware of the event until his neighbor rang his doorbell to inform him. He later told reporters that he slept through the whole incident, and luckily, the only damage was a wire connected to his heating pump. Helberg described the moment as unforgettable and said he wouldn’t trade it for anything. Pictures show the ship’s large red and green bow extremely close to his house.\nAuthorities confirmed that no one was injured, and no oil spilled from the ship. However, efforts to move the ship during high tide were unsuccessful. The shipping company said they are helping with the investigation, and police say there is one suspect, although they haven’t released more details yet.',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 6',
                'type' => 'text',
                'shared_content' => 'Baby Food and Sugar (Nutrition & Public Policy)\nPeople in Southeast Asia are getting wealthier, and more parents are choosing convenience foods for their babies. These foods are advertised as healthy but often contain added sugars, while similar products in Western countries don’t.\nA UNICEF study of 1,600 baby foods in Southeast Asia found that nearly half had added sugars. In the Philippines, where rates of obesity and diabetes are increasing, this is particularly concerning. Nutritionists worry that starting babies on sweet foods could make them prefer sugary tastes as they grow up. For example, the popular baby food Cerelac contains about 17.5 grams of sugar per serving; however, labels don’t distinguish between natural and added sugars, making it hard for parents to know how much sugar is added. Nestlé makes Cerelac and says it adds sugar to mask the taste of nutrients like iron and DHA, which babies need for healthy growth.\nAlthough Nestlé plans to remove added sugar from their products in the next few years, nutritionists and the World Health Organization (WHO) recommend reducing added sugars in baby foods now, especially for children under three. Parents want to provide the best for their children, but it is difficult when convenience foods often contain high levels of sugar.',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 7',
                'type' => 'text',
                'shared_content' => 'People are happiest in the mornings, says study (Psychology)\nA study suggests that people feel happiest in the mornings, and that midnight is the time we feel the bluest. Researchers from University College London conducted a comprehensive study on mood, frame of mind, and mental well-being at varying times of the day. They asked test participants to rate their feelings of happiness, overall satisfaction with life, and to what degree they thought life was worthwhile. The researchers concluded that: \"Generally, things do seem better in the morning.\" They said: \"Across a…diverse sample, we repeatedly saw mornings align with better mental health…and midnight with the lowest.\" This was so even when accounting for differences in individual characteristics.\"\nThe researchers also investigated which days of the week we felt happiest. They suggested that we feel happiest on Sunday mornings, when feelings of anxiety are more subdued. This is perhaps attributable to people having the chance to unwind on Saturdays. People are also more likely to have fun on Saturdays. Perhaps they splash out on something nice while shopping, or get together with friends. This has a positive impact on making us feel happier the following day. The researchers posited that other \"drivers\" could affect our feelings of positivity. These include the seasons, \"weather (temperature, precipitation, humidity…) as well as various sociocultural cycles\".',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 8',
                'type' => 'text',
                'shared_content' => 'Flossing your teeth could reduce the risk of stroke (Hygiene & Social Norms)\nDental hygiene (looking after your teeth and gums) is good for you. It keeps your teeth healthy, and it can help your brain. New research from the University of South Carolina suggests that flossing your teeth could reduce the risk of having a stroke. A stroke is like a heart attack, but it affects the brain. It happens when blood cannot get to the brain, or when a blood vessel in the brain bursts. Around 15 million people worldwide have a stroke each year. Of these, about 5 million die, and 5 million are left disabled. Researcher Dr Souvik Sen said oral diseases, such as tooth decay and gum disease, affect around 3.5 billion people. He said these diseases are the most widespread health problems.\nDr Sen and his team of researchers looked into the effects of flossing on our health. He said: \"We aimed to determine which oral hygiene behavior - dental flossing, brushing or regular dentist visits - has the greatest impact on stroke prevention.\" The team found that flossing teeth at least once a week could lower the risk of different types of stroke by 22 per cent to 44 per cent. Dr Sen said flossing could reduce the risk of stroke \"by reducing oral infections\". He added that flossing was a cheap and easy way of caring for your teeth and body. He said: \"Many people have said that dental care is costly. Flossing is a healthy habit that is easy, affordable and accessible.\"',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 9',
                'type' => 'text',
                'shared_content' => 'Text abbreviations make you look less sincere (Language and Social Behavior)\nA new study suggests that people who abbreviate their text messages might seem insincere. In addition, they might be less likely to receive replies. Researchers from Stanford University in the USA and the University of Toronto in Canada analyzed 5,000 text messages to gauge the impact of abbreviations. Test participants had to rate their perceived sincerity of messages with and without abbreviations. They also evaluated their likelihood of responding. The researchers said: \"Abbreviations make senders seem less sincere and recipients less likely to write back.\" They added: \"Abbreviations signal a lower level of effort from the sender.\"\nAbbreviations in text messages and social media comments have evolved into a distinct genre of writing. The first text message was sent in 1992. Since then, a system of abbreviated text has developed that is largely understood and widely used. Many abbreviations are now in dictionaries. Truncated terms like \"fyi,\" \"cul8r,\" and \"imho\" are commonplace in text messages. Of course, these mean \"for your information,\" \"see you later,\" and \"in my humble opinion\". Researcher David Fang said: \"We thought texters might like abbreviations because they would convey an informal sense of closeness, so we were surprised that abbreviations elicited negative perceptions about people who use them.\"',
            ],
            [
                'section_id' => 1,
                'title' => 'Reading Passage 10',
                'type' => 'text',
                'shared_content' => 'Mystery drones in USA causing alarm (Digital Safety & Society)\nThere have been hundreds of sightings of mystery drones across the USA. People first started telling the police about the drones last month. Since then, more and more people have reported seeing them. Most of the sightings have been in the state of New Jersey. Residents there are concerned because the drones have been flying above military bases. One drone was spotted near Donald Trump\'s golf course in New Jersey. Stewart Airfield in New York state shut down for an hour last week because of \"suspicious\" drone activity. US authorities said they are unsure where the drones are from. A spokesperson said the unidentified flying objects (UFOs) were not a danger to the public.\nMany conspiracy theories have started online because of the drone sightings. Some people on social media are saying Russia and China are using the objects to spy on the USA. A New Jersey Republican representative said the drones were coming from an \"Iranian mothership\" in the Atlantic Ocean. The US Homeland Security Secretary told ABC News that he knew of \"no foreign involvement with respect to the sightings\". He added: \"If we identify any foreign involvement or criminal activity, we will communicate with the American public.\" FBI investigators said most of the drone sightings were cases of \"mistaken identity\" and that people were \"over-reacting\" unnecessarily to news reports.',
            ],
        ];

        foreach ($data as $item) {
            QuestionGroup::create(array_merge($item, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
