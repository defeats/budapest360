<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\User;
use app\Models\Category;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user_id <=> multimedia
        $user = User::first() ?? User::factory()->create();

        // etterem teszt
        $restaurantCat = Category::where('slug', 'restaurants')->first();
        if ($restaurantCat) {
            $gundel = Place::updateOrCreate(
                ['slug' => 'gundel-etterem'],
                [
                    'name' => 'Gundel Étterem',
                    'post_code' => '1146',
                    'address' => 'Budapest, Gundel Károly út 4.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Budapest egyik leghíresebb és legpatinásabb étterme a Városliget szélén.'
                ]
            );

            // kep hozzarendelese
            $gundel->multimedia()->updateOrCreate(
                ['image' => 'gundel-etterem_cover.jpg'], // fix fajlnev /* TODO: dinamikusra megcsinalni az API szerint
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $virtu = Place::updateOrCreate(
                ['slug' => 'virtu-etterem'],
                [
                    'name' => 'Virtu Restaurant',
                    'post_code' => '1117',
                    'address' => 'Budapest, Dombóvári út 28.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Budapest egyik legikonikusabb, Michelin-kalauzban ajánlott étterme, a város legmagasabb épületének tetején.'
                ]
            );

            $virtu->multimedia()->updateOrCreate(
                ['image' => 'virtu_main.jpg'], // fix fajlnev /* TODO: dinamikusra megcsinalni az API szerint
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $stand = Place::updateOrCreate(
                ['slug' => 'stand-etterem'],
                [
                    'name' => 'Stand Étterem',
                    'post_code' => '1061',
                    'address' => 'Budapest, Székely Mihály utca 2.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Két Michelin-csillagos étterem, amely a magyar gasztronómia klasszikusait gondolja újra modern köntösben, a legkiválóbb hazai alapanyagokra építve.'
                ]
            );

            $stand->multimedia()->updateOrCreate(
                ['image' => 'stand_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $salt = Place::updateOrCreate(
                ['slug' => 'salt-budapest'],
                [
                    'name' => 'SALT Budapest',
                    'post_code' => '1053',
                    'address' => 'Budapest, Királyi Pál utca 4.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Michelin-csillagos élményétterem a Hotel Rum aljában, ahol a természet és a hagyományok találkoznak. Ételeikben a vadon termő gyógynövények kapnak főszerepet.'
                ]
            );

            $salt->multimedia()->updateOrCreate(
                ['image' => 'salt_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $rosenstein = Place::updateOrCreate(
                ['slug' => 'rosenstein-vendeglo'],
                [
                    'name' => 'Rosenstein Vendéglő',
                    'post_code' => '1087',
                    'address' => 'Budapest, Mosonyi u. 3.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Családi tulajdonban lévő, kultikus vendéglő a Keleti pályaudvar közelében, amely a hagyományos magyar és zsidó konyha remekeit kínálja házias, mégis elegáns környezetben.'
                ]
            );

            $rosenstein->multimedia()->updateOrCreate(
                ['image' => 'rosenstein_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $borkonyha = Place::updateOrCreate(
                ['slug' => 'borkonyha-winekitchen'],
                [
                    'name' => 'Borkonyha Winekitchen',
                    'post_code' => '1051',
                    'address' => 'Budapest, Sas utca 3.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Michelin-csillagos étterem és borbár fúziója a Bazilika közelében. A francia bisztrókonyha és a magyar családi vendéglők hangulatát ötvözi, több mint 200 féle borral.'
                ]
            );

            $borkonyha->multimedia()->updateOrCreate(
                ['image' => 'borkonyha_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $babel = Place::updateOrCreate(
                ['slug' => 'babel-budapest'],
                [
                    'name' => 'Babel Budapest',
                    'post_code' => '1052',
                    'address' => 'Budapest, Piarista köz 2.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'A magyar és erdélyi hagyományokat kortárs szellemben bemutató Michelin-csillagos étterem. Exkluzív belső tere és természetközeli filozófiája egyedülálló élményt nyújt.'
                ]
            );

            $babel->multimedia()->updateOrCreate(
                ['image' => 'babel_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $rumour = Place::updateOrCreate(
                ['slug' => 'rumour-by-racz-jeno'],
                [
                    'name' => 'Rumour by Rácz Jenő',
                    'post_code' => '1052',
                    'address' => 'Budapest, Petőfi tér 3-5.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Rácz Jenő Michelin-csillagos étterme, amely a "Chef\'s Table" koncepciót honosította meg itthon. A vendégek egy pult körül ülve, színházi előadásként élvezhetik a vacsorát.'
                ]
            );

            $rumour->multimedia()->updateOrCreate(
                ['image' => 'rumour_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $costes = Place::updateOrCreate(
                ['slug' => 'costes-restaurant'],
                [
                    'name' => 'Costes Restaurant',
                    'post_code' => '1092',
                    'address' => 'Budapest, Ráday utca 4.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Hazánk első Michelin-csillagos étterme a Ráday utcában. A kompromisszumok nélküli minőség és a nemzetközi színvonalú fine dining úttörője Magyarországon.'
                ]
            );

            $costes->multimedia()->updateOrCreate(
                ['image' => 'costes_main.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );
        }

        // latnivalok teszt
        $sightsCat = Category::where('slug', 'sights')->first();
        if ($sightsCat) {
            $halaszbastya = Place::updateOrCreate(
                ['slug' => 'halaszbastya'],
                [
                    'name' => 'Halászbástya',
                    'post_code' => '1014',
                    'address' => 'Budapest, Szentháromság tér',
                    'category_id' => $sightsCat->id,
                    'description' => 'Lenyűgöző panoráma és neogótikus építészet a Budai Várnegyedben.'
                ]
            );

            $halaszbastya->multimedia()->updateOrCreate(
                ['image' => 'halaszbastya_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $parlament = Place::updateOrCreate(
                ['slug' => 'orszaghaz'],
                [
                    'name' => 'Országház',
                    'post_code' => '1055',
                    'address' => 'Budapest, Kossuth Lajos tér 1-3',
                    'category_id' => $sightsCat->id,
                    'description' => 'Magyarország legnagyobb épülete, a törvényhozás központja és a Szent Korona őrzőhelye.'
                ]
            );

            $parlament->multimedia()->updateOrCreate(
                ['image' => 'orszaghaz_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $bazilika = Place::updateOrCreate(
                ['slug' => 'szent-istvan-bazilika'],
                [
                    'name' => 'Szent István Bazilika',
                    'post_code' => '1051',
                    'address' => 'Budapest, Szent István tér 1',
                    'category_id' => $sightsCat->id,
                    'description' => 'Budapest egyik legmagasabb épülete, klasszicista stílusú katolikus bazilika és körkilátó.'
                ]
            );

            $bazilika->multimedia()->updateOrCreate(
                ['image' => 'bazilika_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $hosokTere = Place::updateOrCreate(
                ['slug' => 'hosok-tere'],
                [
                    'name' => 'Hősök tere',
                    'post_code' => '1146',
                    'address' => 'Budapest, Hősök tere',
                    'category_id' => $sightsCat->id,
                    'description' => 'A világörökség része, a Millenniumi emlékművel és a hét vezér szobrával.'
                ]
            );

            $hosokTere->multimedia()->updateOrCreate(
                ['image' => 'hosok_tere_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $matyasTemplom = Place::updateOrCreate(
                ['slug' => 'matyas-templom'],
                [
                    'name' => 'Mátyás-templom',
                    'post_code' => '1014',
                    'address' => 'Budapest, Szentháromság tér 2',
                    'category_id' => $sightsCat->id,
                    'description' => 'Történelmi koronázótemplom gótikus stílusban, a Budai Várnegyed szívében.'
                ]
            );

            $matyasTemplom->multimedia()->updateOrCreate(
                ['image' => 'matyas_templom_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $lanchid = Place::updateOrCreate(
                ['slug' => 'szechenyi-lanchid'],
                [
                    'name' => 'Széchenyi lánchíd',
                    'post_code' => '1051',
                    'address' => 'Budapest, Széchenyi István tér',
                    'category_id' => $sightsCat->id,
                    'description' => 'A Duna első állandó kőhídja, amely összeköti Budát és Pestet, a város egyik legfontosabb jelképe.'
                ]
            );

            $lanchid->multimedia()->updateOrCreate(
                ['image' => 'lanchid_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $szechenyiFurdo = Place::updateOrCreate(
                ['slug' => 'szechenyi-gyogyfurdo'],
                [
                    'name' => 'Széchenyi Gyógyfürdő',
                    'post_code' => '1146',
                    'address' => 'Budapest, Állatkerti krt. 9-11',
                    'category_id' => $sightsCat->id,
                    'description' => 'Európa egyik legnagyobb fürdőkomplexuma, neobarokk stílusú épületben, híres kültéri medencékkel.'
                ]
            );

            $szechenyiFurdo->multimedia()->updateOrCreate(
                ['image' => 'szechenyi_furdo_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $operahaz = Place::updateOrCreate(
                ['slug' => 'magyar-allami-operahaz'],
                [
                    'name' => 'Magyar Állami Operaház',
                    'post_code' => '1061',
                    'address' => 'Budapest, Andrássy út 22',
                    'category_id' => $sightsCat->id,
                    'description' => 'Ybl Miklós által tervezett neoreneszánsz épület, a magyar operajátszás fellegvára.'
                ]
            );

            $operahaz->multimedia()->updateOrCreate(
                ['image' => 'operahaz_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );

            $zsinagoga = Place::updateOrCreate(
                ['slug' => 'dohany-utcai-zsinagoga'],
                [
                    'name' => 'Dohány utcai Zsinagóga',
                    'post_code' => '1074',
                    'address' => 'Budapest, Dohány u. 2',
                    'category_id' => $sightsCat->id,
                    'description' => 'Európa legnagyobb, a világ második legnagyobb zsinagógája, a magyarországi neológ zsidóság központja.'
                ]
            );

            $zsinagoga->multimedia()->updateOrCreate(
                ['image' => 'zsinagoga_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );
            //ejszakai elet teszt
            $nightlifeCat = Category::where('slug', 'nightlife')->first();
            if ($nightlifeCat) {
                $Heaven = Place::updateOrCreate(
                    ['slug' => 'heaven-club'],
                    [
                        'name' => 'Heaven Club',
                        'post_code' => '1073',
                        'address' => 'Budapest, Kertész u. 36',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Népszerű éjszakai klub a belváros szívében, ismert DJ-kkel és élőzenés eseményekkel.'
                    ]
                );

                $Heaven->multimedia()->updateOrCreate(
                    ['image' => 'heaven_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Instant = Place::updateOrCreate(
                    ['slug' => 'instant-fogas'],
                    [
                        'name' => 'Instant-Fogas Komplexum',
                        'post_code' => '1073',
                        'address' => 'Budapest, Akácfa u. 49-51',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Budapest legnagyobb parti-komplexuma, amely több romkocsmát és klubot egyesít. Számos tánctérrel, változatos zenei stílusokkal és egyedi, szürreális dekorációval várja a bulizókat.'
                    ]
                );

                $Instant->multimedia()->updateOrCreate(
                    ['image' => 'instant_fogas_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Szimpla = Place::updateOrCreate(
                    ['slug' => 'szimpla-kert'],
                    [
                        'name' => 'Szimpla Kert',
                        'post_code' => '1075',
                        'address' => 'Budapest, Kazinczy u. 14',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'A város legrégebbi és legismertebb romkocsmája. Eklektikus berendezés, labirintusszerű terek, élőzene és utánozhatatlan hangulat jellemzi a Kazinczy utcában.'
                    ]
                );

                $Szimpla->multimedia()->updateOrCreate(
                    ['image' => 'szimpla_kert_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Akvarium = Place::updateOrCreate(
                    ['slug' => 'akvarium-klub'],
                    [
                        'name' => 'Akvárium Klub',
                        'post_code' => '1051',
                        'address' => 'Budapest, Erzsébet tér 12',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Kulturális központ és szórakozóhely a város szívében, az Erzsébet tér alatt. Híres a kiváló koncertterméről, elektronikus zenei partijairól és a medence alatti teraszáról.'
                    ]
                );

                $Akvarium->multimedia()->updateOrCreate(
                    ['image' => 'akvarium_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Otkert = Place::updateOrCreate(
                    ['slug' => 'otkert'],
                    [
                        'name' => 'Ötkert',
                        'post_code' => '1051',
                        'address' => 'Budapest, Zrínyi u. 4',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Stílusos klub és bár a Bazilika közelében. Nyáron nyitott tetővel, télen fűtött terekkel, főként R&B, hip-hop és sláger zenékkel vonzza a közönséget.'
                    ]
                );

                $Otkert->multimedia()->updateOrCreate(
                    ['image' => 'otkert_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Morrisons2 = Place::updateOrCreate(
                    ['slug' => 'morrisons-2'],
                    [
                        'name' => "Morrison's 2",
                        'post_code' => '1055',
                        'address' => 'Budapest, Szent István krt. 11',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Budapest egyik legnagyobb romkocsma-klubja a Nyugati pályaudvar közelében. Híres arról, hogy a hét minden napján nyitva tart, 7 különböző tánctérrel, karaoke teremmel és hatalmas belső udvarral várja a vendégeket.'
                    ]
                );

                $Morrisons2->multimedia()->updateOrCreate(
                    ['image' => 'morrisons2_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $A38 = Place::updateOrCreate(
                    ['slug' => 'a38-hajo'],
                    [
                        'name' => 'A38 Hajó',
                        'post_code' => '1117',
                        'address' => 'Budapest, Petőfi híd, budai hídfő',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'A világ egyik legjobb klubjának választott állóhajó a Dunán. Egykori kőszállító hajóból alakították át kulturális központtá, amely koncerteknek, partiknak és étteremnek ad otthont lenyűgöző panorámával.'
                    ]
                );

                $A38->multimedia()->updateOrCreate(
                    ['image' => 'a38_ship_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Turbina = Place::updateOrCreate(
                    ['slug' => 'turbina'],
                    [
                        'name' => 'Turbina Kulturális Központ',
                        'post_code' => '1082',
                        'address' => 'Budapest, Vajdahunyad u. 4',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Multifunkcionális kulturális tér a 8. kerületben. Nappal kiállítótér és kávézó, éjszaka pedig az underground elektronikus zene egyik legfontosabb bázisa kiváló hangrendszerrel.'
                    ]
                );

                $Turbina->multimedia()->updateOrCreate(
                    ['image' => 'turbina_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );

                $Doboz = Place::updateOrCreate(
                    ['slug' => 'doboz-club'],
                    [
                        'name' => 'Doboz',
                        'post_code' => '1072',
                        'address' => 'Budapest, Klauzál u. 10',
                        'category_id' => $nightlifeCat->id,
                        'description' => 'Prémium kategóriás romkocsma és klub a Klauzál utcában. Különlegessége a belső udvaron található hatalmas, King Kongot ábrázoló fa szobor, valamint a két különböző zenei stílust (house, R&B) kínáló tánctér.'
                    ]
                );

                $Doboz->multimedia()->updateOrCreate(
                    ['image' => 'doboz_cover.jpg'],
                    ['user_id' => $user->id, 'is_cover' => true]
                );
                //szallasok teszt
                $accomodationsCat = Category::where('slug', 'accomodations')->first();
                if ($accomodationsCat) {
                    $corinthia = Place::updateOrCreate(
                        ['slug' => 'corinthia-hotel-budapest'],
                        [
                            'name' => 'Corinthia Hotel Budapest',
                            'post_code' => '1073',
                            'address' => 'Budapest, Erzsébet krt. 43-49',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Luxus szálloda a belváros szívében, elegáns szobákkal, wellness központtal és kiváló éttermekkel.'
                        ]
                    );
                    $corinthia->multimedia()->updateOrCreate(
                        ['image' => 'corinthia_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $newYorkPalace = Place::updateOrCreate(
                        ['slug' => 'anantara-new-york-palace-budapest'],
                        [
                            'name' => 'Anantara New York Palace Budapest',
                            'post_code' => '1073',
                            'address' => 'Budapest, Erzsébet krt. 9-11',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'A világ legszebb kávéházának otthont adó luxusszálloda, ahol a történelmi elegancia találkozik a modern kényelemmel.'
                        ]
                    );
                    $newYorkPalace->multimedia()->updateOrCreate(
                        ['image' => 'new_york_palace_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $fourSeasons = Place::updateOrCreate(
                        ['slug' => 'four-seasons-hotel-gresham-palace'],
                        [
                            'name' => 'Four Seasons Hotel Gresham Palace',
                            'post_code' => '1051',
                            'address' => 'Budapest, Széchenyi István tér 5-6',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Szecessziós műemléképület a Lánchíd lábánál, páratlan dunai panorámával és világszínvonalú szolgáltatásokkal.'
                        ]
                    );
                    $fourSeasons->multimedia()->updateOrCreate(
                        ['image' => 'four_seasons_gresham_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $kempinski = Place::updateOrCreate(
                        ['slug' => 'kempinski-hotel-corvinus-budapest'],
                        [
                            'name' => 'Kempinski Hotel Corvinus Budapest',
                            'post_code' => '1051',
                            'address' => 'Budapest, Erzsébet tér 7-8',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Modern luxus és gasztronómiai élmények a belváros szívében, karnyújtásnyira a Váci utcától és a Duna-parttól.'
                        ]
                    );
                    $kempinski->multimedia()->updateOrCreate(
                        ['image' => 'kempinski_corvinus_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $parisiUdvar = Place::updateOrCreate(
                        ['slug' => 'parisi-udvar-hotel-budapest'],
                        [
                            'name' => 'Párisi Udvar Hotel Budapest',
                            'post_code' => '1052',
                            'address' => 'Budapest, Petőfi Sándor u. 2-4',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Exkluzív szálloda egy lenyűgöző, mór és gótikus stílusjegyeket ötvöző történelmi épületben, a város egyik legszebb passzázsával.'
                        ]
                    );
                    $parisiUdvar->multimedia()->updateOrCreate(
                        ['image' => 'parisi_udvar_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $ariaHotel = Place::updateOrCreate(
                        ['slug' => 'aria-hotel-budapest'],
                        [
                            'name' => 'Aria Hotel Budapest',
                            'post_code' => '1051',
                            'address' => 'Budapest, Hercegprímás u. 5',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Zenei tematikájú boutique hotel a Szent István Bazilika mellett, egyedülálló tetőtéri bárral és panorámával.'
                        ]
                    );
                    $ariaHotel->multimedia()->updateOrCreate(
                        ['image' => 'aria_hotel_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $ritzCarlton = Place::updateOrCreate(
                        ['slug' => 'the-ritz-carlton-budapest'],
                        [
                            'name' => 'The Ritz-Carlton, Budapest',
                            'post_code' => '1051',
                            'address' => 'Budapest, Erzsébet tér 9-10',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Időtlen elegancia és modern luxus találkozása a belváros központjában, pár lépésre a Fashion Street-től.'
                        ]
                    );
                    $ritzCarlton->multimedia()->updateOrCreate(
                        ['image' => 'ritz_carlton_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $hilton = Place::updateOrCreate(
                        ['slug' => 'hilton-budapest'],
                        [
                            'name' => 'Hilton Budapest',
                            'post_code' => '1014',
                            'address' => 'Budapest, Hess András tér 1-3',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'A Budai Várnegyed szívében, a Halászbástya és a Mátyás-templom közvetlen szomszédságában, lenyűgöző dunai kilátással.'
                        ]
                    );
                    $hilton->multimedia()->updateOrCreate(
                        ['image' => 'hilton_budapest_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $matildPalace = Place::updateOrCreate(
                        ['slug' => 'matild-palace-budapest'],
                        [
                            'name' => 'Matild Palace, a Luxury Collection Hotel',
                            'post_code' => '1056',
                            'address' => 'Budapest, Váci u. 36',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Egy UNESCO világörökségi épület újjászületése, amely a Belle Époque hangulatát idézi modern köntösben.'
                        ]
                    );
                    $matildPalace->multimedia()->updateOrCreate(
                        ['image' => 'matild_palace_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );

                    $interContinental = Place::updateOrCreate(
                        ['slug' => 'intercontinental-budapest'],
                        [
                            'name' => 'InterContinental Budapest',
                            'post_code' => '1052',
                            'address' => 'Budapest, Apáczai Csere János u. 12-14',
                            'category_id' => $accomodationsCat->id,
                            'description' => 'Közvetlenül a Duna-parton elhelyezkedő szálloda, ahonnan a Budai Várra nyíló egyik legszebb kilátás tárul a vendégek elé.'
                        ]
                    );
                    $interContinental->multimedia()->updateOrCreate(
                        ['image' => 'intercontinental_cover.jpg'],
                        ['user_id' => $user->id, 'is_cover' => true]
                    );
                    //bevasarlokozpontok teszt
                    $mallsCat = Category::where('slug', 'malls')->first();
                    if ($mallsCat) {
                        $westend = Place::updateOrCreate(
                            ['slug' => 'westend-city-center'],
                            [
                                'name' => 'WestEnd City Center',
                                'post_code' => '1062',
                                'address' => 'Budapest, Váci út 1-3',
                                'category_id' => $mallsCat->id,
                                'description' => 'Az egyik legnagyobb bevásárlóközpont Közép-Európában, több mint 400 üzlettel, éttermekkel és szórakozási lehetőségekkel.'
                            ]
                        );
                        $westend->multimedia()->updateOrCreate(
                            ['image' => 'westend_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $arena = Place::updateOrCreate(
                            ['slug' => 'arena-mall'],
                            [
                                'name' => 'Arena Mall',
                                'post_code' => '1087',
                                'address' => 'Budapest, Kerepesi út 9',
                                'category_id' => $mallsCat->id,
                                'description' => 'Magyarország legnagyobb alapterületű bevásárlóközpontja, amely számos világmárkának és az ország első IMAX mozijának ad otthont.'
                            ]
                        );
                        $arena->multimedia()->updateOrCreate(
                            ['image' => 'arena_mall_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $allee = Place::updateOrCreate(
                            ['slug' => 'allee-bevasarlokozpont'],
                            [
                                'name' => 'Allee Bevásárlóközpont',
                                'post_code' => '1117',
                                'address' => 'Budapest, Október huszonharmadika utca 8-10',
                                'category_id' => $mallsCat->id,
                                'description' => 'Buda egyik legnépszerűbb plázája a XI. kerület szívében, széles divat- és gasztronómiai kínálattal.'
                            ]
                        );
                        $allee->multimedia()->updateOrCreate(
                            ['image' => 'allee_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $arkad = Place::updateOrCreate(
                            ['slug' => 'arkad-budapest'],
                            [
                                'name' => 'Árkád Budapest',
                                'post_code' => '1106',
                                'address' => 'Budapest, Örs vezér tere 25/a',
                                'category_id' => $mallsCat->id,
                                'description' => 'A pesti oldal egyik legforgalmasabb bevásárlóközpontja az Örs vezér terén, több mint 200 üzlettel.'
                            ]
                        );
                        $arkad->multimedia()->updateOrCreate(
                            ['image' => 'arkad_budapest_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $mammut = Place::updateOrCreate(
                            ['slug' => 'mammut-bevasarlo-es-szorakoztato-kozpont'],
                            [
                                'name' => 'Mammut Bevásárló- és Szórakoztató Központ',
                                'post_code' => '1024',
                                'address' => 'Budapest, Lövőház u. 2-6',
                                'category_id' => $mallsCat->id,
                                'description' => 'A Széna téren található dupla épületes komplexum, amely mozijáról, éttermeiről és központi elhelyezkedéséről ismert.'
                            ]
                        );
                        $mammut->multimedia()->updateOrCreate(
                            ['image' => 'mammut_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $momPark = Place::updateOrCreate(
                            ['slug' => 'mom-park'],
                            [
                                'name' => 'MOM Park',
                                'post_code' => '1123',
                                'address' => 'Budapest, Alkotás utca 53',
                                'category_id' => $mallsCat->id,
                                'description' => 'Prémium kategóriás bevásárlóközpont Budán, exkluzív márkákkal, elegáns környezettel és színvonalas szolgáltatásokkal.'
                            ]
                        );
                        $momPark->multimedia()->updateOrCreate(
                            ['image' => 'mom_park_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $corvin = Place::updateOrCreate(
                            ['slug' => 'corvin-plaza'],
                            [
                                'name' => 'Corvin Plaza',
                                'post_code' => '1083',
                                'address' => 'Budapest, Futó utca 37-45',
                                'category_id' => $mallsCat->id,
                                'description' => 'A belvárosi Corvin Sétány része, modern építészettel és könnyű megközelíthetőséggel.'
                            ]
                        );
                        $corvin->multimedia()->updateOrCreate(
                            ['image' => 'corvin_plaza_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $etele = Place::updateOrCreate(
                            ['slug' => 'etele-plaza'],
                            [
                                'name' => 'Etele Plaza',
                                'post_code' => '1119',
                                'address' => 'Budapest, Hadak útja 1',
                                'category_id' => $mallsCat->id,
                                'description' => 'Buda legnagyobb és legmodernebb "okosplázája" a Kelenföldi pályaudvar közvetlen szomszédságában.'
                            ]
                        );
                        $etele->multimedia()->updateOrCreate(
                            ['image' => 'etele_plaza_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $dunaPlaza = Place::updateOrCreate(
                            ['slug' => 'duna-plaza'],
                            [
                                'name' => 'Duna Plaza',
                                'post_code' => '1138',
                                'address' => 'Budapest, Váci út 178',
                                'category_id' => $mallsCat->id,
                                'description' => 'Magyarország első bevásárlóközpontja a Váci úti irodafolyosón, moziélménnyel és számos üzlettel.'
                            ]
                        );
                        $dunaPlaza->multimedia()->updateOrCreate(
                            ['image' => 'duna_plaza_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $campona = Place::updateOrCreate(
                            ['slug' => 'campona'],
                            [
                                'name' => 'Campona Bevásárlóközpont',
                                'post_code' => '1222',
                                'address' => 'Budapest, Nagytétényi út 37-43',
                                'category_id' => $mallsCat->id,
                                'description' => 'Családbarát bevásárlóközpont Dél-Budán, amely a Tropicariumnak és a Csodák Palotájának is otthont ad.'
                            ]
                        );
                        $campona->multimedia()->updateOrCreate(
                            ['image' => 'campona_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $koki = Place::updateOrCreate(
                            ['slug' => 'koki-bevasarlokozpont'],
                            [
                                'name' => 'KÖKI Bevásárlóközpont',
                                'post_code' => '1191',
                                'address' => 'Budapest, Vak Bottyán u. 75. A-C',
                                'category_id' => $mallsCat->id,
                                'description' => 'Közvetlen metrókapcsolattal rendelkező bevásárlóközpont Kőbánya-Kispesten, a reptérre vezető út mentén.'
                            ]
                        );
                        $koki->multimedia()->updateOrCreate(
                            ['image' => 'koki_cover.jpg'],
                            ['user_id' => $user->id, 'is_cover' => true]
                        );

                        $cultureCat = Category::where('slug', 'culture')->first();
                        if ($cultureCat) {
                            $szepmuveszeti = Place::updateOrCreate(
                                ['slug' => 'szepmuveszeti-muzeum'],
                                [
                                    'name' => 'Szépművészeti Múzeum',
                                    'post_code' => '1146',
                                    'address' => 'Budapest, Dózsa György út 41',
                                    'category_id' => $cultureCat->id,
                                    'description' => 'Impozáns épület a Hősök terén, gazdag európai művészeti gyűjteménnyel a középkortól a 20. századig.'
                                ]
                            );
                            $szepmuveszeti->multimedia()->updateOrCreate(
                                ['image' => 'szepmuveszeti_cover.jpg'],
                                ['user_id' => $user->id, 'is_cover' => true]
                            );

                            $nemzetiMuzeum = Place::updateOrCreate(
                                ['slug' => 'magyar-nemzeti-muzeum'],
                                [
                                    'name' => 'Magyar Nemzeti Múzeum',
                                    'post_code' => '1088',
                                    'address' => 'Budapest, Múzeum krt. 14-16.',
                                    'category_id' => $cultureCat->id,
                                    'description' => 'Magyarország első nemzeti múzeuma, a magyar történelem tárgyi emlékeinek legfontosabb gyűjtőhelye a klasszicista stílusú palotában.'
                                ]
                            );
                            $nemzetiMuzeum->multimedia()->updateOrCreate(
                                ['image' => 'magyar_nemzeti_muzeum_cover.jpg'],
                                ['user_id' => $user->id, 'is_cover' => true]
                            );

                            $operahaz = Place::updateOrCreate(
                                ['slug' => 'magyar-allami-operahaz'],
                                [
                                    'name' => 'Magyar Állami Operaház',
                                    'post_code' => '1061',
                                    'address' => 'Budapest, Andrássy út 22.',
                                    'category_id' => $cultureCat->id,
                                    'description' => 'Ybl Miklós által tervezett neoreneszánsz épület, a magyar opera- és balettjátszás fellegvára az Andrássy úton.'
                                ]
                            );
                            $operahaz->multimedia()->updateOrCreate(
                                ['image' => 'operahaz_cover.jpg'],
                                ['user_id' => $user->id, 'is_cover' => true]
                            );

                            $neprajzi = Place::updateOrCreate(
                                ['slug' => 'neprajzi-muzeum'],
                                [
                                    'name' => 'Néprajzi Múzeum',
                                    'post_code' => '1146',
                                    'address' => 'Budapest, Dózsa György út 35.',
                                    'category_id' => $cultureCat->id,
                                    'description' => 'A Városliget kapujában álló, díjnyertes modern épület, amely a magyar és nemzetközi népi kultúra kincseit őrzi.'
                                ]
                            );
                            $neprajzi->multimedia()->updateOrCreate(
                                ['image' => 'neprajzi_muzeum_cover.jpg'],
                                ['user_id' => $user->id, 'is_cover' => true]
                            );

                            $zeneHaza = Place::updateOrCreate(
                                ['slug' => 'magyar-zene-haza'],
                                [
                                    'name' => 'Magyar Zene Háza',
                                    'post_code' => '1146',
                                    'address' => 'Budapest, Olof Palme sétány 3.',
                                    'category_id' => $cultureCat->id,
                                    'description' => 'A Sou Fujimoto által tervezett, természetbe simuló közösségi tér és koncerthelyszín a Városliget szívében.'
                                ]
                            );
                            $zeneHaza->multimedia()->updateOrCreate(
                                ['image' => 'magyar_zene_haza_cover.jpg'],
                                ['user_id' => $user->id, 'is_cover' => true]
                            );

                            $nemzetiGaleria = Place::updateOrCreate(
                                ['slug' => 'magyar-nemzeti-galeria'],
                                [
                                    'name' => 'Magyar Nemzeti Galéria',
                                    'post_code' => '1014',
                                    'address' => 'Budapest, Szent György tér 2.',
                                    'category_id' => $cultureCat->id,
                                    'description' => 'A Budavári Palotában található legnagyobb hazai képzőművészeti gyűjtemény, amely átfogó képet ad a magyar művészet történetéről.'
                                ]
                            );
                            $nemzetiGaleria->multimedia()->updateOrCreate(
                                ['image' => 'magyar_nemzeti_galeria_cover.jpg'],
                                ['user_id' => $user->id, 'is_cover' => true]
                            );
                        }
                    }
                }
            }
        }
    }
}
