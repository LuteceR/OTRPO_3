<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CharacterCard;
use App\Models\CardComment;
use App\Models\User;

class addCards extends Seeder
{
    /** Использование:
     * php artisan db:seed  --class=addCards
     * Заполняет таблицы с основными карточками
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'юзер1',
            'email' => 'user1@gmail.com',
            'email_verified_at' => '2001-01-01 00:00:00',
            'password' => '123',
            'remember_token' => '123',
            'created_at' => '2001-01-01 00:00:00',
            'updated_at' => '2001-01-01 00:00:00',
        ]);

        User::create([
            'id' => 2,
            'name' => 'юзер2',
            'email' => 'user2@gmail.com',
            'email_verified_at' => '2001-01-01 00:00:00',
            'password' => '321',
            'remember_token' => '321',
            'created_at' => '2001-01-01 00:00:00',
            'updated_at' => '2001-01-01 00:00:00',
        ]);


        // Создание записей в таблице CharacterCard
        CharacterCard::create([
            'id' => 1,
            'name' => 'Sam Bridges',
            'img_url' => 'Sam.png',
            'tiny_desc' => 'is a legendary porter and a former executive member of Bridges who played an integral role in expanding the Chiral Network and making the United Cities of America whole by embarking on a westward expedition.',
            'long_desc' => '<div class=\'desc\'>            Sam was born on November 9th, to Clifford Unger and <span class=\'to_popover\'>Lisa Bridges</span>. In an effort to save his unborn son after Lisa was rendered brain dead in an accident, Cliff willingly placed Sam under the care of <span class=\'to_popover\'>Bridges</span> scientists conducting <span class=\'to_popover\'>Bridge Baby</span> experiments, but did so unaware of their true intentions: to use Sam as a sacrificial foundation for a new communications network as the first proper bridge baby. Upon learning of these intentions from an old comrade and friend, Cliff attempted to abduct Sam from a <span class=\'to_popover\'>Bridges</span> facility, but was gunned down in the process, resulting in his and Sam\'s deaths. On the <span class=\'to_popover\'>Beach</span>, Sam was healed and brought back to life by Amelie, who bestowed to him the ability of repatriation. No longer viable as a bridge baby by virtue of being a repatriate, he was taken into Bridget\'s care and raised as her son, Sam Strand. However, his revival upset the balance of life and death, triggering the <span class=\'to_popover\'>Death Stranding</span>.        </div>        <div class=\'desc\'>            In his youth, as a sufferer of <span class=\'to_popover\'>DOOMS</span>, Sam had severe nightmares and would find himself stranded on the <span class=\'to_popover\'>Beach</span> unable to find his way out. Always there for him in such moments, Amelie would arrive to calm Sam and help him make his way out of the <span class=\'to_popover\'>Beach</span>. Sam fashioned a quipu for Amelie in the world of the living, and was able to bring it with him to the <span class=\'to_popover\'>Beach</span>, where he gifted it to Amelie as a representation of their bond.        </div>',
        ]);

        CharacterCard::create([
            'id' => 2,
            'name' => 'Deadman',
            'img_url' => 'Deadman.png',
            'tiny_desc' => 'was a doctor, researcher, and member of Bridges Medical Team who assisted Sam during his westward expedition.',
            'long_desc' => '<span>                        <div class=\'desc header\'>Truth</div>                        <div class=\'desc\'>Deadman was born via in-vitro fertilization, using anonymous genetic donors, and was grown in an artificial womb. Following his \'birth,\' a likely genetic defect left several of his organs either missing or nonfunctional, requiring doctors to replace them over time with those of compatible donors in order to keep him alive.</div>                        <div class=\'desc header\'>Fabricated History</div>                        <div class=\'desc\'>In the story he fabricated himself, Deadman claimed that, following his birth, 70% of his body was harvested from cadavers due to a failure in his vital organs that did not manifest the \'spark of life\', while the remaining 30% was grown from pluripotent stem cells.</div>                        <div class=\'desc header\'>Bridges</div>                        <div class=\'desc\'>Having not been born through natural means, Deadman believed he lacked a <span class=\'to_popover\'>ka</span> (soul)—and, by extension, a <span class=\'to_popover\'>Beach</span>. This absence fuels an obsession with death and the deceased, ultimately leading him to become a coroner and join <span class=\'to_popover\'>Bridges</span>\' Medical Team. When President Bridget\'s cancer resurfaces, Deadman leads the team responsible for her health, doing everything possible to keep her alive. After Sam is brought back to Capital Knot City, Deadman is the first to speak to him.</div>                    </span>'
            ]);

        CharacterCard::create([
            'id' => 3,
            'name' => 'Cliff Unger',
            'img_url' => 'CliffU.png',
            'tiny_desc' => 'was a United States Army Special Forces Captain who was shot dead attempting to reclaim custody of his son from Bridges.',
            'long_desc' => '<div class=\'desc\'>Captain Clifford Unger served in the United States Army Special Forces before the <span class=\'to_popover\'>Death Stranding</span>, having fought in Iraq, Afghanistan, Kosovo and many other countries. He was known for consistently bringing back his unit alive and unscathed. Among his unit was a soldier known as John Blake McClane, who would later go by the name \'Die-Hardman\', a moniker given to him because Cliff kept saving him and bringing him home. Later on, Cliff married <span class=\'to_popover\'>Lisa Bridges</span>, and they conceived a son. Because of his impending fatherhood, Cliff left active duty to be with his family.</div>                    <div class=\'desc\'>Following his return, Cliff and <span class=\'to_popover\'>Lisa</span> were involved in an accident, from which both came out alive, but with <span class=\'to_popover\'>Lisa</span> rendered brain dead and their unborn son at risk of death. Desperate to save his family, Cliff willingly brought them to <span class=\'to_popover\'>Bridges</span> for experimental procedures, not realizing what would become of his son. <span class=\'to_popover\'>Lisa</span> was put on life support to prevent her death and necrosis, and their baby inside a portable pod full of amniotic fluid, keeping him suspended in development until further notice.</div>                    <div class=\'desc\'>Cliff gradually came to accept that his wife would never come back to him, and so turned his attention to his unborn son, whom he took to calling \'<span class=\'to_popover\'>BB</span>\'. Cliff bonded with his son, telling him stories, singing to him, and bringing him a cake for his would-be birth date. He also reconnected with John, who was working as security personnel for <span class=\'to_popover\'>Bridges</span>. However, Bridget Strand forced Cliff into putting BB through further experiments.</div>',
        ]);

        CharacterCard::create([
            'id' => 4,
            'name' => 'Die-Hardman',
            'img_url' => 'Die-hardman.png',
            'tiny_desc' => 'was the third and final President of the United Cities of America and formerly a Director of Bridges.',
            'long_desc' => '<div class=\'desc\'>In his early adulthood, John Blake McClane was a member of the US Army Special Forces, serving under the command of Captain Clifford \'Cliff\' Unger. During his time in the military, John earned the nickname \'Die-Hardman\' due to surviving against impossible odds (although John believed it was due to Unger\'s leadership rather than his own ability).</div>                    <div class=\'desc\'>John later left the Army and began working for <span class=\'to_popover\'>Bridges</span>, eventually becoming special advisor and security guard for President Bridget Strand, who he would then fall in love with. During this time, he became part of the <span class=\'to_popover\'>Bridge Baby</span> experiments and, among the <span class=\'to_popover\'>BB</span>s was the unborn son of Unger later named Sam, who had submitted the child following an accident that left Unger\'s then-pregnant wife brain-dead.</div>                    <div class=\'desc\'>                        Due to the potential of Cliff\'s son as a <span class=\'to_popover\'>BB</span>, Bridget chose to take the child for continued experiments, against the consent of Cliff. On the day before Cliff\'s baby was to be brought to another facility, he helps Cliff prepare an escape plan for him and his son, and deactivates Cliff\'s wife\'s security systems, but warns him that if he is ordered to kill Cliff, he can\'t refuse and will do so. However, Cliff\'s attempt fails, as Bridges security shoot and chase him, even as Die-Hardman attempted to buy Cliff time and demand that he be the one to deal with Cliff. Fatally, Bridget Strand intervenes in the process and orders Bridges special ops to force the doors open to <span class=\'to_popover\'>Lisa Bridges</span>\'s room, within which Cliff was hiding. Die-Hardman begged Cliff to hand over the bridge baby, trying to hold off the spec ops from shooting Cliff. The Spec Ops shoot Cliff anyway, and the BB pod is taken and given to Bridget. They find that there is no BB left in it, since Cliff extracted it out of the pod. Die-Hardman aims at Cliff and orders him to bring the BB back, with Bridget ordering him to shoot Cliff. After the latter finally pronounced his last sentences, Bridget takes Die-Hardman hands in hers and pull the trigger, shooting twice and accidentally killing both Cliff and the BB.                    </div>                    <div class=\'desc\'>To avoid being implicated in the incident, Bridget and John faked his suicide and forged him the new identity of Die-Hardman. Die-Hardman was given Bridget\'s mask to obscure his face, and used it for decades to conceal his identity. When asked about the mask, Die-Hardman would claim it was for hiding facial burns.</div>'
        ]);

        CharacterCard::create([
            'id' => 5,
            'name' => 'Bridget Strand',
            'img_url' => 'BridgetS.png',
            'tiny_desc' => 'was the former President of the United States of America, founder of Bridges and after the Death Stranding, the President of the United Cities of America up and until her death.',
            'long_desc' => '<div class=\'desc\'>In her twenties, Bridget was the victim of uterine cancer. During the operation she was split across two worlds: her soul woke up on the <span class=\'to_popover\'>Beach</span> while her body remained in the hospital bed. Eventually, Bridget would name her stranded \'<span class=\'to_popover\'>ka</span>\' Amelie. Due to the unique conditions of the <span class=\'to_popover\'>Beach</span>, Amelie did not age, and Bridget, who began to grow old, would deflect suspicion by claiming that Amelie was her daughter, who suffer a debilitating condition and an absent father.</div>                    <div class=\'desc\'>While at the beginning Bridget thought that her condition was a curse, later on she began to use it to understand the Beach, the nightmares of past ancient extinctions and visions of the future. When Bridget realized that the Beach was connected to the world of the dead, and that the memories of time were somewhere beyond it too, the concept of the Chiral Network was born. At an unknown time Bridget became the Vice-president of the United States of America.</div>                    <div class=\'desc header\'>Presidency and research on the Beach</div>                    <div class=\'desc\'>Shortly after the initial research on the Beach, America was hit by the first voidout and during this the original President died, making Bridget the first female President of the United States. Feeling that she was out of time she raced to complete the chiral network as quickly as possible. She ordered research on the so called <span class=\'to_popover\'>Bridge Babies</span>, or <span class=\'to_popover\'>BB</span>, unborn children bound to the world of dead, to continue in secret, while publicly she put an end to all further BB experiments and had all data destroyed. Determined to complete the <span class=\'to_popover\'>chiral network</span> and to stop the next and final extinction, Bridget founded <span class=\'to_popover\'>Bridges</span>. During this time Bridget began to wear a mask to conceal her appearance during visits to the <span class=\'to_popover\'>BB</span> research installations.</div>                    <div class=\'desc\'>When Cliff Unger was cornered after his attempted to escape with his <span class=\'to_popover\'>BB</span>, chosen for its potential as a first sacrifice for the future network, Bridget ordered her special advisor and security guard John Blake McClane, an old comrade of Cliff, to shoot him. After his hesitation she pulled the trigger instead, shooting Cliff twice and inadvertently shooting <span class=\'to_popover\'>BB</span> as well, killing him. Amelie would then encounter the <span class=\'to_popover\'>BB</span>\'s soul on the <span class=\'to_popover\'>Beach</span>, and would use her powers to bring him back to life. Bridget then chose to decommission the <span class=\'to_popover\'>BB</span>, instead raising him as her own child and naming him Sam.</div>'
        ]);

        CharacterCard::create([
            'id' => 6,
            'name' => 'Fragile',
            'img_url' => 'Fragile.png',
            'tiny_desc' => 'was the young executive company and owner of the Fragile Express and an ally of Sam Porter during his expedition to west.',
            'long_desc' => '<div class=\'desc\'>Fragile was born in the world post-<span class=\'to_popover\'>Death Stranding</span> by her father, owner and founder of the logistics company <span class=\'to_popover\'>Fragile Express</span>, and mother, who was a freelance porter making various deliveries for both preppers and the government of the <span class=\'to_popover\'>UCA</span> prior to the marriage. She was named after the family company name, to whom both parents made a promise to rebuild America by the time she grew up. Born with powerful DOOMS ability, Fragile grows up hearing her father\'s stories of what America was like before the nation collapsed as a result of the <span class=\'to_popover\'>Death Stranding</span> but, when Fragile was twelve, her mother abandoned the two, for their own good, with the objective of destroying the <span class=\'to_popover\'>UCA</span> <span class=\'to_popover\'>BB</span>\'s facilities, the bond between father and daughter became stronger.</div>                    <div class=\'desc\'>When Fragile\'s father died, she became the new company executive, inheriting the structure and connections that <span class=\'to_popover\'>Fragile Express</span> had obtained over the years. Thanks to Fragile\'s <span class=\'to_popover\'>DOOMS</span> ability and charisma, she attracted the attention of a fledgling courier company led by Higgs Monaghan, who merged with <span class=\'to_popover\'>Fragile Express</span> becoming the only one doing business in the region.</div>                    <div class=\'desc\'>Early on, they were highly successful in delivering supplies to those in the most remote of areas, but all too quickly it was discovered that <span class=\'to_popover\'>Higgs</span> was a terrorist leading the terrorist group Homo Demens. They had gone from delivering food and medicine for communities to smuggling guns and bombs for terrorist cells. Fragile was tricked into bringing a nuclear bomb into Middle Knot City, resulting in the deaths of everyone there. Fragile discovered that <span class=\'to_popover\'>Higgs</span> was delivering another nuke to South Knot City and managed to steal it away from them, only to be caught by the terrorists.</div>                    <div class=\'desc\'>Fragile was stripped down to her underwear and given a choice by <span class=\'to_popover\'>Higgs</span> save the city by running through timefall, which he had summoned, and throwing the bomb into a tar pit, or warping out of the area and saving herself, at the cost of all those who lived there. Fragile chose to save those in the city, and <span class=\'to_popover\'>Higgs</span> gave her a hood so that her face would be protected, wanting for her face to be a testament to those who crossed him, and for it to be remembered as belonging to the person who nuked Middle Knot City. The punishment left Fragile with the physique of an elderly woman, and completely dependent on her <span class=\'to_popover\'>DOOMS</span> abilities to move any further than short distance.</div>                    <div class=\'desc\'>Despite her actions, the credibility of Fragile Express was now compromised along with the trust of the region\'s survivors, thus reducing the demands for delivery. With business and credibility at a minimum, and her body disfigured, Fragile was a broken woman but still sought revenge against <span class=\'to_popover\'>Higgs</span>.</div>',
        ]);

        // Описания
        CardComment::create([
            'id' => 1,
            'user_id' => 1,
            'character_card_id' => 1,
            'comment' => 'cool guy',
        ]);

        CardComment::create([
            'id' => 2,
            'user_id' => 1,
            'character_card_id' => 2,
            'comment' => 'is he dead?',
        ]);

        CardComment::create([
            'id' => 3,
            'user_id' => 1,
            'character_card_id' => 3,
            'comment' => 'omg',
        ]);

        CardComment::create([
            'id' => 4,
            'user_id' => 2,
            'character_card_id' => 4,
            'comment' => 'first',
        ]);

        CardComment::create([
            'id' => 5,
            'user_id' => 2,
            'character_card_id' => 5,
            'comment' => 'W',
        ]);

        CardComment::create([
            'id' => 6,
            'user_id' => 2,
            'character_card_id' => 6,
            'comment' => 'comment',
        ]);

    }
}
