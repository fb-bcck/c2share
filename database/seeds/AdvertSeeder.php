<?php

use Illuminate\Database\Seeder;
use App\Advert;
class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Advert::create([

            'title' => 'Kinderwagen FX 2500 zu verleihen',
            'description' => 'Neuwertig und kaum benutzt, hat eine Bremse',
            'price' => 20,
            'prodCategory' => 4,
            'ownerId' => 3,
            'tags' => 'draußen, spielen, Kinder, Familie, Nachwuch, Baby',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);



        Advert::create([

            'title' => 'Mercedes C Klasse',
            'description' => 'Neuwertig und kaum benutzt, hat eine Bremse',
            'price' => 20000,
            'prodCategory' => 1,
            'ownerId' => 3,
            'tags' => 'C Klasse, Auto, Mercedes, schnell, fahren, Sportwagen',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Glühbirne',
            'description' => 'Biete 60W Glühbirne zum Verleih an',
            'price' => 5,
            'prodCategory' => 3,
            'ownerId' => 3,
            'tags' => 'Lampe, Licht, 60W',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Motorboot Linssen (NL) / GS 410 Gold',
            'description' => 'Nagelneues Boot, verleihe es auf Tagessatzbasis für 100 Euro am Tag',
            'price' => 100,
            'prodCategory' => 1,
            'ownerId' => 3,
            'tags' => 'Boot, Seemann, Meer',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        Advert::create([

            'title' => 'Spiegelheckkutter Ostseestar',
            'description' => 'Nagelneues Boot, verleihe es auf Tagessatzbasis für 80 Euro am Tag',
            'price' => 80,
            'prodCategory' => 1,
            'ownerId' => 3,
            'tags' => 'Boot, Seemann, Meer',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Muiden Klassik',
            'description' => 'Motoryacht Baujahr 1949, in gutem Zustand',
            'price' => 120,
            'prodCategory' => 1,
            'ownerId' => 3,
            'tags' => 'Boot, Seemann, Meer',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Jeaneau / NC 14',
            'description' => 'Motoryacht Baujahr 2016, gepflegt',
            'price' => 200,
            'prodCategory' => 1,
            'ownerId' => 3,
            'tags' => 'Boot, Seemann, Meer, Yacht',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Dolphin 840 (Diesel)',
            'description' => 'Motoryacht Baujahr 1992, in gutem Zustand',
            'price' => 120,
            'prodCategory' => 1,
            'ownerId' => 3,
            'tags' => 'Boot, Seemann, Meer, Delfin',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Biete meine Dienste zum Rasenmähen an',
            'description' => '20 Euro pro Stunde',
            'price' => 20,
            'prodCategory' => 2,
            'ownerId' => 3,
            'tags' => 'Rasen, mähen, schneiden, Gartenarbeit, schaffen, mühsam',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Teilzeit Arbeitskraft auf 400 Euro Basis',
            'description' => 'suche Anstellung auf 400 Euro Basis',
            'price' => 400,
            'prodCategory' => 2,
            'ownerId' => 3,
            'tags' => 'Arbeit, Teilzeit, Basis, billig',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Partyorganisierer',
            'description' => 'Ich organisiere deine Party, du musst dich um nichts kümmern. Alles inclusive',
            'price' => 1000,
            'prodCategory' => 2,
            'ownerId' => 3,
            'tags' => 'Party, Organisation, Feier, Dienstleistung',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Handstaubsauger EasyClean 2.0',
            'description' => 'Mit mühsamen schweren Hausarbeiten ist jetzt Schluss. ',
            'price' => 10,
            'prodCategory' => 3,
            'ownerId' => 3,
            'tags' => 'saugen, sauber, Hausgerät',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Windelspüler',
            'description' => 'Die umweltschonende Alternative zur konventionellen Windel. Macht Windeln wieder verwendbar',
            'price' => 10,
            'prodCategory' => 4,
            'ownerId' => 3,
            'tags' => 'Baby, Windel, sauber, Recycling',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Kinderwagen TWIN',
            'description' => 'Vermiete unseren nicht mehr benötigten Kinderwagen. Ideal geeignet für Zwillinge',
            'price' => 50,
            'prodCategory' => 4,
            'ownerId' => 3,
            'tags' => 'Baby, Kinderwagen, Wagen, Zwillinge',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Spielzeugauto RACER 3 1:8 Maßstab zu vermieten',
            'description' => 'Vermiete Spielzeugauto in gutem Zustand über die Wochenenden',
            'price' => 10,
            'prodCategory' => 5,
            'ownerId' => 3,
            'tags' => 'RC, ferngesteuert, Spielzeug',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Murmelbahn Maximus',
            'description' => 'Nagelneue Murmelbahn, kaum bespielt Mo-Do zum Verleih offen',
            'price' => 3.22,
            'prodCategory' => 4,
            'ownerId' => 3,
            'tags' => 'Spielzeug, Murmel, Holzspielzeug',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Modellflugzeug mit Düsenantrieb Maßstab 1:8',
            'description' => 'Biete mein Modellflugzeug zum Flug an Wochenenden an. Im Schadensfall volles Risiko beim Leiher',
            'price' => 20,
            'prodCategory' => 5,
            'ownerId' => 3,
            'tags' => 'Modell, fliegen, Testflug',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Einliegerwohnung zur Zwischenmiete ab September 20',
            'description' => 'Gute Lage im Zentrum von Konstanz',
            'price' => 350,
            'prodCategory' => 6,
            'ownerId' => 3,
            'tags' => 'Haus, WG, Miete',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Schrebergarten für Geburtstagsfeiern zur Miete',
            'description' => 'Schrebergarten im ruhigen Staad',
            'price' => 100,
            'prodCategory' => 6,
            'ownerId' => 3,
            'tags' => 'Haus, Feier, Grundstück, Miete',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([

            'title' => 'Bauer sucht Nachfolger',
            'description' => 'Biete meinen kompletten Hof mit allen Tieren und Maschinen an. Gehe in Pension. Interessenten melden unter 0165/58270',
            'price' => 100,
            'prodCategory' => 6,
            'ownerId' => 3,
            'tags' => 'Bauernhof, Land, Grundstück',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Komplette Game of Thrones Reihe monatlich mietbar',
            'description' => 'Alle 8 Staffeln der GOT-Reihe. Serienspaß für die ganze Familie',
            'price' => 5,
            'prodCategory' => 7,
            'ownerId' => 3,
            'tags' => 'GOT, DVD, BlueRay, Kino, zu Hause',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Alle Harry Potter Bände',
            'description' => 'gebraucht',
            'price' => 6,
            'prodCategory' => 7,
            'ownerId' => 3,
            'tags' => 'Buch, Hermine, Potter, Lesen',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'E Book Percy Jackson- Diebe im Olymp',
            'description' => 'Nach Bezahlung automatisches Senden von DL-Link an angegebene Adresse',
            'price' => 2.50,
            'prodCategory' => 7,
            'ownerId' => 3,
            'tags' => 'Buch, E-Book, Download',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Radlader 380 Kramer ',
            'description' => 'verkauft wird ein einsatzfähiger Radlader der Marke Atlas, sehr guter Zustand, Verleih auf Tagesbasis (100 Euro) oder Wochenbasis (500 Euro) mgl.',
            'price' => 100,
            'prodCategory' => 8,
            'ownerId' => 3,
            'tags' => 'Erde, Bagger, Gerät, graben',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Minibagger Jansen MB-1500, Microbagger, Benzinmotor, Komplett Set',
            'description' => 'Unser Minibagger MB-1500 ist eine kompakte Multifunktionsmaschine. Er ist klein, leistungsstark und vielseitig einsetzbar. Sie kommen dank der geringen Breite von 825 mm mit diesem Microbagger auch an schwer zugängliche Orte. Er ist mit einem 13,5 PS starken Benzinmotor von Briggs & Stratton ausgestattet, welcher das leistungsstarke Hydrauliksystem antreibt. Gestartet wird er bequem über einen E-Starter.',
            'price' => 150,
            'prodCategory' => 8,
            'ownerId' => 3,
            'tags' => 'Erde, Bagger, Gerät, graben',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'AS Mäher 21 2T ES ',
            'description' => 'Der leichte, wendige Wiesenmäher mit AS-2-Takt Motor',
            'price' => 135,
            'prodCategory' => 8,
            'ownerId' => 3,
            'tags' => 'Rasenmäher, Gras, Schneiden',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Agria Geräteträger 3600 BM Unihamster premium',
            'description' => 'leicht startender, laufruhiger Motor
Profimotor für Dauerbetrieb geeignet
komfortables Arbeiten durch Schaltgetriebe
sehr gute Traktion durch AS-Bereifung
Holm auf Körpergröße einstellbar, Verleih erfolgt zum Tagessatz von 30 Euro',
            'price' => 30,
            'prodCategory' => 8,
            'ownerId' => 3,
            'tags' => 'Rasenmäher, Gras, Schneiden',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Holzkohlegrill Weber Classic 47cm Durchmesser',
            'description' => 'Einfache Reinigung mit dem One-Touch Reinigungssystem
Deckelhalter erlaubt ein Arretieren des Deckels
Optimale Temperaturkontrolle dank integriertem Thermometer',
            'price' => 10,
            'prodCategory' => 9,
            'ownerId' => 3,
            'tags' => 'Grill, Feuer, draußen',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);

        Advert::create([
            'title' => 'Kärcher K 5 Premium Full Control Plus Home Pressure Washer',
            'description' => 'Der Superstar unter den Hochdruckreinigern, einfach Klasse, Verleih zu 15 Euro pro Tag ',
            'price' => 15,
            'prodCategory' => 9,
            'ownerId' => 3,
            'tags' => 'Kärcher, Waschen, Autowasch, sauber',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);


    }




}
