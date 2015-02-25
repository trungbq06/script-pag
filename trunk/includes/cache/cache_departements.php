<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// 

############################################################ 

///////////////////////////////////
//Départements
////////////////////////////////// 
 
$cache_departements = array(
0=>
array(
'id_dep' => '2',
'id_reg' => '1',
'nom_dep' => ' Haut-Rhin',
'pos_dep' => '1',
),
1=>
array(
'id_dep' => '1',
'id_reg' => '1',
'nom_dep' => 'Bas-Rhin',
'pos_dep' => '2',
),
2=>
array(
'id_dep' => '3',
'id_reg' => '2',
'nom_dep' => 'Dordogne',
'pos_dep' => '1',
),
3=>
array(
'id_dep' => '4',
'id_reg' => '2',
'nom_dep' => 'Gironde',
'pos_dep' => '2',
),
4=>
array(
'id_dep' => '5',
'id_reg' => '2',
'nom_dep' => 'Landes',
'pos_dep' => '3',
),
5=>
array(
'id_dep' => '6',
'id_reg' => '2',
'nom_dep' => 'Lot-et-Garonne',
'pos_dep' => '4',
),
6=>
array(
'id_dep' => '7',
'id_reg' => '2',
'nom_dep' => 'Pyrénées-Atlantiques',
'pos_dep' => '5',
),
7=>
array(
'id_dep' => '8',
'id_reg' => '3',
'nom_dep' => 'Allier',
'pos_dep' => '1',
),
8=>
array(
'id_dep' => '9',
'id_reg' => '3',
'nom_dep' => 'Cantal',
'pos_dep' => '2',
),
9=>
array(
'id_dep' => '10',
'id_reg' => '3',
'nom_dep' => 'Haute-Loire',
'pos_dep' => '3',
),
10=>
array(
'id_dep' => '11',
'id_reg' => '3',
'nom_dep' => 'Puy-de-Dôme',
'pos_dep' => '4',
),
11=>
array(
'id_dep' => '12',
'id_reg' => '4',
'nom_dep' => 'Calvados',
'pos_dep' => '1',
),
12=>
array(
'id_dep' => '13',
'id_reg' => '4',
'nom_dep' => 'Manche',
'pos_dep' => '2',
),
13=>
array(
'id_dep' => '14',
'id_reg' => '4',
'nom_dep' => 'Orne',
'pos_dep' => '3',
),
14=>
array(
'id_dep' => '15',
'id_reg' => '5',
'nom_dep' => 'Côte-d\'Or',
'pos_dep' => '1',
),
15=>
array(
'id_dep' => '16',
'id_reg' => '5',
'nom_dep' => 'Nièvre',
'pos_dep' => '2',
),
16=>
array(
'id_dep' => '17',
'id_reg' => '5',
'nom_dep' => 'Saône-et-Loire',
'pos_dep' => '3',
),
17=>
array(
'id_dep' => '18',
'id_reg' => '5',
'nom_dep' => 'Yonne',
'pos_dep' => '4',
),
18=>
array(
'id_dep' => '19',
'id_reg' => '6',
'nom_dep' => 'Côtes-d\'Armor',
'pos_dep' => '1',
),
19=>
array(
'id_dep' => '20',
'id_reg' => '6',
'nom_dep' => 'Finistère',
'pos_dep' => '2',
),
20=>
array(
'id_dep' => '21',
'id_reg' => '6',
'nom_dep' => 'Ille-et-Vilaine',
'pos_dep' => '3',
),
21=>
array(
'id_dep' => '22',
'id_reg' => '6',
'nom_dep' => 'Morbihan',
'pos_dep' => '4',
),
22=>
array(
'id_dep' => '23',
'id_reg' => '7',
'nom_dep' => 'Cher',
'pos_dep' => '1',
),
23=>
array(
'id_dep' => '24',
'id_reg' => '7',
'nom_dep' => 'Eure-et-Loir',
'pos_dep' => '2',
),
24=>
array(
'id_dep' => '25',
'id_reg' => '7',
'nom_dep' => 'Indre',
'pos_dep' => '3',
),
25=>
array(
'id_dep' => '26',
'id_reg' => '7',
'nom_dep' => 'Indre-et-Loire',
'pos_dep' => '4',
),
26=>
array(
'id_dep' => '27',
'id_reg' => '7',
'nom_dep' => 'Loir-et-Cher',
'pos_dep' => '5',
),
27=>
array(
'id_dep' => '28',
'id_reg' => '7',
'nom_dep' => 'Loiret',
'pos_dep' => '6',
),
28=>
array(
'id_dep' => '30',
'id_reg' => '8',
'nom_dep' => 'Aube',
'pos_dep' => '1',
),
29=>
array(
'id_dep' => '29',
'id_reg' => '8',
'nom_dep' => 'Ardennes',
'pos_dep' => '2',
),
30=>
array(
'id_dep' => '31',
'id_reg' => '8',
'nom_dep' => 'Marne',
'pos_dep' => '3',
),
31=>
array(
'id_dep' => '32',
'id_reg' => '8',
'nom_dep' => 'Haute-Marne',
'pos_dep' => '4',
),
32=>
array(
'id_dep' => '33',
'id_reg' => '9',
'nom_dep' => 'Corse-du-Sud',
'pos_dep' => '1',
),
33=>
array(
'id_dep' => '34',
'id_reg' => '9',
'nom_dep' => 'Haute-Corse',
'pos_dep' => '2',
),
34=>
array(
'id_dep' => '35',
'id_reg' => '10',
'nom_dep' => 'Doubs',
'pos_dep' => '1',
),
35=>
array(
'id_dep' => '36',
'id_reg' => '10',
'nom_dep' => 'Jura',
'pos_dep' => '2',
),
36=>
array(
'id_dep' => '37',
'id_reg' => '10',
'nom_dep' => 'Haute-Saône',
'pos_dep' => '3',
),
37=>
array(
'id_dep' => '38',
'id_reg' => '10',
'nom_dep' => 'Territoire de Belfort',
'pos_dep' => '4',
),
38=>
array(
'id_dep' => '39',
'id_reg' => '11',
'nom_dep' => 'Eure',
'pos_dep' => '1',
),
39=>
array(
'id_dep' => '40',
'id_reg' => '11',
'nom_dep' => 'Seine-Maritime',
'pos_dep' => '2',
),
40=>
array(
'id_dep' => '41',
'id_reg' => '12',
'nom_dep' => 'Paris',
'pos_dep' => '1',
),
41=>
array(
'id_dep' => '42',
'id_reg' => '12',
'nom_dep' => 'Seine-et-Marne',
'pos_dep' => '2',
),
42=>
array(
'id_dep' => '43',
'id_reg' => '12',
'nom_dep' => 'Yvelines',
'pos_dep' => '3',
),
43=>
array(
'id_dep' => '44',
'id_reg' => '12',
'nom_dep' => 'Essonne',
'pos_dep' => '4',
),
44=>
array(
'id_dep' => '45',
'id_reg' => '12',
'nom_dep' => 'Hauts-de-Seine',
'pos_dep' => '5',
),
45=>
array(
'id_dep' => '46',
'id_reg' => '12',
'nom_dep' => 'Seine-Saint-Denis',
'pos_dep' => '6',
),
46=>
array(
'id_dep' => '47',
'id_reg' => '12',
'nom_dep' => 'Val-de-Marne',
'pos_dep' => '7',
),
47=>
array(
'id_dep' => '48',
'id_reg' => '12',
'nom_dep' => 'Val-d\'Oise',
'pos_dep' => '8',
),
48=>
array(
'id_dep' => '50',
'id_reg' => '13',
'nom_dep' => 'Gard',
'pos_dep' => '1',
),
49=>
array(
'id_dep' => '49',
'id_reg' => '13',
'nom_dep' => 'Aude',
'pos_dep' => '2',
),
50=>
array(
'id_dep' => '51',
'id_reg' => '13',
'nom_dep' => 'Hérault',
'pos_dep' => '3',
),
51=>
array(
'id_dep' => '52',
'id_reg' => '13',
'nom_dep' => 'Lozère',
'pos_dep' => '4',
),
52=>
array(
'id_dep' => '53',
'id_reg' => '13',
'nom_dep' => 'Pyrénées-Orientales',
'pos_dep' => '5',
),
53=>
array(
'id_dep' => '54',
'id_reg' => '14',
'nom_dep' => 'Corrèze',
'pos_dep' => '1',
),
54=>
array(
'id_dep' => '55',
'id_reg' => '14',
'nom_dep' => 'Creuse',
'pos_dep' => '2',
),
55=>
array(
'id_dep' => '56',
'id_reg' => '14',
'nom_dep' => 'Haute-Vienne',
'pos_dep' => '3',
),
56=>
array(
'id_dep' => '57',
'id_reg' => '15',
'nom_dep' => 'Meurthe-et-Moselle',
'pos_dep' => '1',
),
57=>
array(
'id_dep' => '58',
'id_reg' => '15',
'nom_dep' => 'Meuse',
'pos_dep' => '2',
),
58=>
array(
'id_dep' => '59',
'id_reg' => '15',
'nom_dep' => 'Moselle',
'pos_dep' => '3',
),
59=>
array(
'id_dep' => '60',
'id_reg' => '15',
'nom_dep' => 'Vosges',
'pos_dep' => '4',
),
60=>
array(
'id_dep' => '61',
'id_reg' => '16',
'nom_dep' => 'Ariège',
'pos_dep' => '1',
),
61=>
array(
'id_dep' => '62',
'id_reg' => '16',
'nom_dep' => 'Aveyron',
'pos_dep' => '2',
),
62=>
array(
'id_dep' => '63',
'id_reg' => '16',
'nom_dep' => 'Haute-Garonne',
'pos_dep' => '3',
),
63=>
array(
'id_dep' => '64',
'id_reg' => '16',
'nom_dep' => 'Gers',
'pos_dep' => '4',
),
64=>
array(
'id_dep' => '65',
'id_reg' => '16',
'nom_dep' => 'Lot',
'pos_dep' => '5',
),
65=>
array(
'id_dep' => '66',
'id_reg' => '16',
'nom_dep' => 'Hautes-Pyrénées',
'pos_dep' => '6',
),
66=>
array(
'id_dep' => '67',
'id_reg' => '16',
'nom_dep' => 'Tarn',
'pos_dep' => '7',
),
67=>
array(
'id_dep' => '68',
'id_reg' => '16',
'nom_dep' => 'Tarn-et-Garonne',
'pos_dep' => '8',
),
68=>
array(
'id_dep' => '69',
'id_reg' => '17',
'nom_dep' => 'Nord',
'pos_dep' => '1',
),
69=>
array(
'id_dep' => '70',
'id_reg' => '17',
'nom_dep' => 'Pas-de-Calais',
'pos_dep' => '2',
),
70=>
array(
'id_dep' => '71',
'id_reg' => '18',
'nom_dep' => 'Loire-Atlantique',
'pos_dep' => '1',
),
71=>
array(
'id_dep' => '72',
'id_reg' => '18',
'nom_dep' => 'Maine-et-Loire',
'pos_dep' => '2',
),
72=>
array(
'id_dep' => '73',
'id_reg' => '18',
'nom_dep' => 'Mayenne',
'pos_dep' => '3',
),
73=>
array(
'id_dep' => '74',
'id_reg' => '18',
'nom_dep' => 'Sarthe',
'pos_dep' => '4',
),
74=>
array(
'id_dep' => '75',
'id_reg' => '18',
'nom_dep' => 'Vendée',
'pos_dep' => '5',
),
75=>
array(
'id_dep' => '76',
'id_reg' => '19',
'nom_dep' => 'Aisne',
'pos_dep' => '1',
),
76=>
array(
'id_dep' => '77',
'id_reg' => '19',
'nom_dep' => 'Oise',
'pos_dep' => '2',
),
77=>
array(
'id_dep' => '78',
'id_reg' => '19',
'nom_dep' => 'Somme ',
'pos_dep' => '3',
),
78=>
array(
'id_dep' => '79',
'id_reg' => '20',
'nom_dep' => 'Charente',
'pos_dep' => '1',
),
79=>
array(
'id_dep' => '80',
'id_reg' => '20',
'nom_dep' => 'Charente-Maritime',
'pos_dep' => '2',
),
80=>
array(
'id_dep' => '81',
'id_reg' => '20',
'nom_dep' => 'Deux-Sèvres',
'pos_dep' => '3',
),
81=>
array(
'id_dep' => '82',
'id_reg' => '20',
'nom_dep' => 'Vienne',
'pos_dep' => '4',
),
82=>
array(
'id_dep' => '83',
'id_reg' => '21',
'nom_dep' => 'Alpes-de-Haute-Provence',
'pos_dep' => '1',
),
83=>
array(
'id_dep' => '84',
'id_reg' => '21',
'nom_dep' => 'Hautes-Alpes',
'pos_dep' => '2',
),
84=>
array(
'id_dep' => '85',
'id_reg' => '21',
'nom_dep' => 'Alpes-Maritimes',
'pos_dep' => '3',
),
85=>
array(
'id_dep' => '86',
'id_reg' => '21',
'nom_dep' => 'Bouches-du-Rhône',
'pos_dep' => '4',
),
86=>
array(
'id_dep' => '87',
'id_reg' => '21',
'nom_dep' => 'Var',
'pos_dep' => '5',
),
87=>
array(
'id_dep' => '88',
'id_reg' => '21',
'nom_dep' => 'Vaucluse',
'pos_dep' => '6',
),
88=>
array(
'id_dep' => '89',
'id_reg' => '22',
'nom_dep' => 'Ain',
'pos_dep' => '1',
),
89=>
array(
'id_dep' => '90',
'id_reg' => '22',
'nom_dep' => 'Ardèche',
'pos_dep' => '2',
),
90=>
array(
'id_dep' => '91',
'id_reg' => '22',
'nom_dep' => 'Drôme',
'pos_dep' => '3',
),
91=>
array(
'id_dep' => '92',
'id_reg' => '22',
'nom_dep' => 'Isère',
'pos_dep' => '4',
),
92=>
array(
'id_dep' => '93',
'id_reg' => '22',
'nom_dep' => 'Loire',
'pos_dep' => '5',
),
93=>
array(
'id_dep' => '94',
'id_reg' => '22',
'nom_dep' => 'Rhône',
'pos_dep' => '6',
),
94=>
array(
'id_dep' => '95',
'id_reg' => '22',
'nom_dep' => 'Savoie',
'pos_dep' => '7',
),
95=>
array(
'id_dep' => '96',
'id_reg' => '22',
'nom_dep' => 'Haute-Savoie',
'pos_dep' => '8',
),
);