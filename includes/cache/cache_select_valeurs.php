<?php
///////////////////////////////////////////////////////////////////////////////////////////
///Script PHP/MYSQL de gestion de petites annonces développé par Script PAG
///Script PAG tout droits réservé. Utilisation sous licence. http://www.script-pag.com
/////////////////////////////////////////////////////////////////////////////////////////// 

############################################################ 

///////////////////////////////////
//Select valeurs
////////////////////////////////// 
 
$cache_select_valeurs = array(
0=>
array(
'id_sel' => '92',
'sel_nom' => 'Année max',
'valeur' => '1960',
'id_opt' => '2',
),
1=>
array(
'id_sel' => '94',
'sel_nom' => 'Année max',
'valeur' => '1961',
'id_opt' => '2',
),
2=>
array(
'id_sel' => '96',
'sel_nom' => 'Année max',
'valeur' => '1962',
'id_opt' => '2',
),
3=>
array(
'id_sel' => '98',
'sel_nom' => 'Année max',
'valeur' => '1963',
'id_opt' => '2',
),
4=>
array(
'id_sel' => '100',
'sel_nom' => 'Année max',
'valeur' => '1964',
'id_opt' => '2',
),
5=>
array(
'id_sel' => '102',
'sel_nom' => 'Année max',
'valeur' => '1965',
'id_opt' => '2',
),
6=>
array(
'id_sel' => '104',
'sel_nom' => 'Année max',
'valeur' => '1966',
'id_opt' => '2',
),
7=>
array(
'id_sel' => '106',
'sel_nom' => 'Année max',
'valeur' => '1967',
'id_opt' => '2',
),
8=>
array(
'id_sel' => '108',
'sel_nom' => 'Année max',
'valeur' => '1968',
'id_opt' => '2',
),
9=>
array(
'id_sel' => '110',
'sel_nom' => 'Année max',
'valeur' => '1969',
'id_opt' => '2',
),
10=>
array(
'id_sel' => '112',
'sel_nom' => 'Année max',
'valeur' => '1970',
'id_opt' => '2',
),
11=>
array(
'id_sel' => '114',
'sel_nom' => 'Année max',
'valeur' => '1971',
'id_opt' => '2',
),
12=>
array(
'id_sel' => '116',
'sel_nom' => 'Année max',
'valeur' => '1972',
'id_opt' => '2',
),
13=>
array(
'id_sel' => '118',
'sel_nom' => 'Année max',
'valeur' => '1973',
'id_opt' => '2',
),
14=>
array(
'id_sel' => '120',
'sel_nom' => 'Année max',
'valeur' => '1974',
'id_opt' => '2',
),
15=>
array(
'id_sel' => '122',
'sel_nom' => 'Année max',
'valeur' => '1975',
'id_opt' => '2',
),
16=>
array(
'id_sel' => '124',
'sel_nom' => 'Année max',
'valeur' => '1976',
'id_opt' => '2',
),
17=>
array(
'id_sel' => '126',
'sel_nom' => 'Année max',
'valeur' => '1977',
'id_opt' => '2',
),
18=>
array(
'id_sel' => '128',
'sel_nom' => 'Année max',
'valeur' => '1978',
'id_opt' => '2',
),
19=>
array(
'id_sel' => '130',
'sel_nom' => 'Année max',
'valeur' => '1979',
'id_opt' => '2',
),
20=>
array(
'id_sel' => '132',
'sel_nom' => 'Année max',
'valeur' => '1980',
'id_opt' => '2',
),
21=>
array(
'id_sel' => '134',
'sel_nom' => 'Année max',
'valeur' => '1981',
'id_opt' => '2',
),
22=>
array(
'id_sel' => '136',
'sel_nom' => 'Année max',
'valeur' => '1982',
'id_opt' => '2',
),
23=>
array(
'id_sel' => '138',
'sel_nom' => 'Année max',
'valeur' => '1983',
'id_opt' => '2',
),
24=>
array(
'id_sel' => '140',
'sel_nom' => 'Année max',
'valeur' => '1984',
'id_opt' => '2',
),
25=>
array(
'id_sel' => '142',
'sel_nom' => 'Année max',
'valeur' => '1985',
'id_opt' => '2',
),
26=>
array(
'id_sel' => '144',
'sel_nom' => 'Année max',
'valeur' => '1986',
'id_opt' => '2',
),
27=>
array(
'id_sel' => '146',
'sel_nom' => 'Année max',
'valeur' => '1987',
'id_opt' => '2',
),
28=>
array(
'id_sel' => '148',
'sel_nom' => 'Année max',
'valeur' => '1988',
'id_opt' => '2',
),
29=>
array(
'id_sel' => '150',
'sel_nom' => 'Année max',
'valeur' => '1989',
'id_opt' => '2',
),
30=>
array(
'id_sel' => '152',
'sel_nom' => 'Année max',
'valeur' => '1990',
'id_opt' => '2',
),
31=>
array(
'id_sel' => '154',
'sel_nom' => 'Année max',
'valeur' => '1991',
'id_opt' => '2',
),
32=>
array(
'id_sel' => '156',
'sel_nom' => 'Année max',
'valeur' => '1992',
'id_opt' => '2',
),
33=>
array(
'id_sel' => '158',
'sel_nom' => 'Année max',
'valeur' => '1993',
'id_opt' => '2',
),
34=>
array(
'id_sel' => '160',
'sel_nom' => 'Année max',
'valeur' => '1994',
'id_opt' => '2',
),
35=>
array(
'id_sel' => '162',
'sel_nom' => 'Année max',
'valeur' => '1995',
'id_opt' => '2',
),
36=>
array(
'id_sel' => '164',
'sel_nom' => 'Année max',
'valeur' => '1996',
'id_opt' => '2',
),
37=>
array(
'id_sel' => '166',
'sel_nom' => 'Année max',
'valeur' => '1997',
'id_opt' => '2',
),
38=>
array(
'id_sel' => '168',
'sel_nom' => 'Année max',
'valeur' => '1998',
'id_opt' => '2',
),
39=>
array(
'id_sel' => '170',
'sel_nom' => 'Année max',
'valeur' => '1999',
'id_opt' => '2',
),
40=>
array(
'id_sel' => '172',
'sel_nom' => 'Année max',
'valeur' => '2000',
'id_opt' => '2',
),
41=>
array(
'id_sel' => '174',
'sel_nom' => 'Année max',
'valeur' => '2001',
'id_opt' => '2',
),
42=>
array(
'id_sel' => '176',
'sel_nom' => 'Année max',
'valeur' => '2002',
'id_opt' => '2',
),
43=>
array(
'id_sel' => '178',
'sel_nom' => 'Année max',
'valeur' => '2003',
'id_opt' => '2',
),
44=>
array(
'id_sel' => '180',
'sel_nom' => 'Année max',
'valeur' => '2004',
'id_opt' => '2',
),
45=>
array(
'id_sel' => '182',
'sel_nom' => 'Année max',
'valeur' => '2005',
'id_opt' => '2',
),
46=>
array(
'id_sel' => '184',
'sel_nom' => 'Année max',
'valeur' => '2006',
'id_opt' => '2',
),
47=>
array(
'id_sel' => '186',
'sel_nom' => 'Année max',
'valeur' => '2007',
'id_opt' => '2',
),
48=>
array(
'id_sel' => '188',
'sel_nom' => 'Année max',
'valeur' => '2008',
'id_opt' => '2',
),
49=>
array(
'id_sel' => '190',
'sel_nom' => 'Année max',
'valeur' => '2009',
'id_opt' => '2',
),
50=>
array(
'id_sel' => '192',
'sel_nom' => 'Année max',
'valeur' => '2010',
'id_opt' => '2',
),
51=>
array(
'id_sel' => '194',
'sel_nom' => 'Année max',
'valeur' => '2011',
'id_opt' => '2',
),
52=>
array(
'id_sel' => '196',
'sel_nom' => 'Année max',
'valeur' => '2012',
'id_opt' => '2',
),
53=>
array(
'id_sel' => '91',
'sel_nom' => 'Année min',
'valeur' => '1960',
'id_opt' => '2',
),
54=>
array(
'id_sel' => '93',
'sel_nom' => 'Année min',
'valeur' => '1961',
'id_opt' => '2',
),
55=>
array(
'id_sel' => '95',
'sel_nom' => 'Année min',
'valeur' => '1962',
'id_opt' => '2',
),
56=>
array(
'id_sel' => '97',
'sel_nom' => 'Année min',
'valeur' => '1963',
'id_opt' => '2',
),
57=>
array(
'id_sel' => '99',
'sel_nom' => 'Année min',
'valeur' => '1964',
'id_opt' => '2',
),
58=>
array(
'id_sel' => '101',
'sel_nom' => 'Année min',
'valeur' => '1965',
'id_opt' => '2',
),
59=>
array(
'id_sel' => '103',
'sel_nom' => 'Année min',
'valeur' => '1966',
'id_opt' => '2',
),
60=>
array(
'id_sel' => '105',
'sel_nom' => 'Année min',
'valeur' => '1967',
'id_opt' => '2',
),
61=>
array(
'id_sel' => '107',
'sel_nom' => 'Année min',
'valeur' => '1968',
'id_opt' => '2',
),
62=>
array(
'id_sel' => '109',
'sel_nom' => 'Année min',
'valeur' => '1969',
'id_opt' => '2',
),
63=>
array(
'id_sel' => '111',
'sel_nom' => 'Année min',
'valeur' => '1970',
'id_opt' => '2',
),
64=>
array(
'id_sel' => '113',
'sel_nom' => 'Année min',
'valeur' => '1971',
'id_opt' => '2',
),
65=>
array(
'id_sel' => '115',
'sel_nom' => 'Année min',
'valeur' => '1972',
'id_opt' => '2',
),
66=>
array(
'id_sel' => '117',
'sel_nom' => 'Année min',
'valeur' => '1973',
'id_opt' => '2',
),
67=>
array(
'id_sel' => '119',
'sel_nom' => 'Année min',
'valeur' => '1974',
'id_opt' => '2',
),
68=>
array(
'id_sel' => '121',
'sel_nom' => 'Année min',
'valeur' => '1975',
'id_opt' => '2',
),
69=>
array(
'id_sel' => '123',
'sel_nom' => 'Année min',
'valeur' => '1976',
'id_opt' => '2',
),
70=>
array(
'id_sel' => '125',
'sel_nom' => 'Année min',
'valeur' => '1977',
'id_opt' => '2',
),
71=>
array(
'id_sel' => '127',
'sel_nom' => 'Année min',
'valeur' => '1978',
'id_opt' => '2',
),
72=>
array(
'id_sel' => '129',
'sel_nom' => 'Année min',
'valeur' => '1979',
'id_opt' => '2',
),
73=>
array(
'id_sel' => '131',
'sel_nom' => 'Année min',
'valeur' => '1980',
'id_opt' => '2',
),
74=>
array(
'id_sel' => '133',
'sel_nom' => 'Année min',
'valeur' => '1981',
'id_opt' => '2',
),
75=>
array(
'id_sel' => '135',
'sel_nom' => 'Année min',
'valeur' => '1982',
'id_opt' => '2',
),
76=>
array(
'id_sel' => '137',
'sel_nom' => 'Année min',
'valeur' => '1983',
'id_opt' => '2',
),
77=>
array(
'id_sel' => '139',
'sel_nom' => 'Année min',
'valeur' => '1984',
'id_opt' => '2',
),
78=>
array(
'id_sel' => '141',
'sel_nom' => 'Année min',
'valeur' => '1985',
'id_opt' => '2',
),
79=>
array(
'id_sel' => '143',
'sel_nom' => 'Année min',
'valeur' => '1986',
'id_opt' => '2',
),
80=>
array(
'id_sel' => '145',
'sel_nom' => 'Année min',
'valeur' => '1987',
'id_opt' => '2',
),
81=>
array(
'id_sel' => '147',
'sel_nom' => 'Année min',
'valeur' => '1988',
'id_opt' => '2',
),
82=>
array(
'id_sel' => '149',
'sel_nom' => 'Année min',
'valeur' => '1989',
'id_opt' => '2',
),
83=>
array(
'id_sel' => '151',
'sel_nom' => 'Année min',
'valeur' => '1990',
'id_opt' => '2',
),
84=>
array(
'id_sel' => '153',
'sel_nom' => 'Année min',
'valeur' => '1991',
'id_opt' => '2',
),
85=>
array(
'id_sel' => '155',
'sel_nom' => 'Année min',
'valeur' => '1992',
'id_opt' => '2',
),
86=>
array(
'id_sel' => '157',
'sel_nom' => 'Année min',
'valeur' => '1993',
'id_opt' => '2',
),
87=>
array(
'id_sel' => '159',
'sel_nom' => 'Année min',
'valeur' => '1994',
'id_opt' => '2',
),
88=>
array(
'id_sel' => '161',
'sel_nom' => 'Année min',
'valeur' => '1995',
'id_opt' => '2',
),
89=>
array(
'id_sel' => '163',
'sel_nom' => 'Année min',
'valeur' => '1996',
'id_opt' => '2',
),
90=>
array(
'id_sel' => '165',
'sel_nom' => 'Année min',
'valeur' => '1997',
'id_opt' => '2',
),
91=>
array(
'id_sel' => '167',
'sel_nom' => 'Année min',
'valeur' => '1998',
'id_opt' => '2',
),
92=>
array(
'id_sel' => '169',
'sel_nom' => 'Année min',
'valeur' => '1999',
'id_opt' => '2',
),
93=>
array(
'id_sel' => '171',
'sel_nom' => 'Année min',
'valeur' => '2000',
'id_opt' => '2',
),
94=>
array(
'id_sel' => '173',
'sel_nom' => 'Année min',
'valeur' => '2001',
'id_opt' => '2',
),
95=>
array(
'id_sel' => '175',
'sel_nom' => 'Année min',
'valeur' => '2002',
'id_opt' => '2',
),
96=>
array(
'id_sel' => '177',
'sel_nom' => 'Année min',
'valeur' => '2003',
'id_opt' => '2',
),
97=>
array(
'id_sel' => '179',
'sel_nom' => 'Année min',
'valeur' => '2004',
'id_opt' => '2',
),
98=>
array(
'id_sel' => '181',
'sel_nom' => 'Année min',
'valeur' => '2005',
'id_opt' => '2',
),
99=>
array(
'id_sel' => '183',
'sel_nom' => 'Année min',
'valeur' => '2006',
'id_opt' => '2',
),
100=>
array(
'id_sel' => '185',
'sel_nom' => 'Année min',
'valeur' => '2007',
'id_opt' => '2',
),
101=>
array(
'id_sel' => '187',
'sel_nom' => 'Année min',
'valeur' => '2008',
'id_opt' => '2',
),
102=>
array(
'id_sel' => '189',
'sel_nom' => 'Année min',
'valeur' => '2009',
'id_opt' => '2',
),
103=>
array(
'id_sel' => '191',
'sel_nom' => 'Année min',
'valeur' => '2010',
'id_opt' => '2',
),
104=>
array(
'id_sel' => '193',
'sel_nom' => 'Année min',
'valeur' => '2011',
'id_opt' => '2',
),
105=>
array(
'id_sel' => '195',
'sel_nom' => 'Année min',
'valeur' => '2012',
'id_opt' => '2',
),
106=>
array(
'id_sel' => '268',
'sel_nom' => 'Capacité max',
'valeur' => '1',
'id_opt' => '6',
),
107=>
array(
'id_sel' => '270',
'sel_nom' => 'Capacité max',
'valeur' => '2',
'id_opt' => '6',
),
108=>
array(
'id_sel' => '272',
'sel_nom' => 'Capacité max',
'valeur' => '3',
'id_opt' => '6',
),
109=>
array(
'id_sel' => '274',
'sel_nom' => 'Capacité max',
'valeur' => '4',
'id_opt' => '6',
),
110=>
array(
'id_sel' => '276',
'sel_nom' => 'Capacité max',
'valeur' => '5',
'id_opt' => '6',
),
111=>
array(
'id_sel' => '278',
'sel_nom' => 'Capacité max',
'valeur' => '6',
'id_opt' => '6',
),
112=>
array(
'id_sel' => '280',
'sel_nom' => 'Capacité max',
'valeur' => '7',
'id_opt' => '6',
),
113=>
array(
'id_sel' => '282',
'sel_nom' => 'Capacité max',
'valeur' => '8',
'id_opt' => '6',
),
114=>
array(
'id_sel' => '284',
'sel_nom' => 'Capacité max',
'valeur' => '9',
'id_opt' => '6',
),
115=>
array(
'id_sel' => '286',
'sel_nom' => 'Capacité max',
'valeur' => '10',
'id_opt' => '6',
),
116=>
array(
'id_sel' => '288',
'sel_nom' => 'Capacité max',
'valeur' => '11',
'id_opt' => '6',
),
117=>
array(
'id_sel' => '290',
'sel_nom' => 'Capacité max',
'valeur' => '12',
'id_opt' => '6',
),
118=>
array(
'id_sel' => '267',
'sel_nom' => 'Capacité min',
'valeur' => '1',
'id_opt' => '6',
),
119=>
array(
'id_sel' => '269',
'sel_nom' => 'Capacité min',
'valeur' => '2',
'id_opt' => '6',
),
120=>
array(
'id_sel' => '271',
'sel_nom' => 'Capacité min',
'valeur' => '3',
'id_opt' => '6',
),
121=>
array(
'id_sel' => '273',
'sel_nom' => 'Capacité min',
'valeur' => '4',
'id_opt' => '6',
),
122=>
array(
'id_sel' => '275',
'sel_nom' => 'Capacité min',
'valeur' => '5',
'id_opt' => '6',
),
123=>
array(
'id_sel' => '277',
'sel_nom' => 'Capacité min',
'valeur' => '6',
'id_opt' => '6',
),
124=>
array(
'id_sel' => '279',
'sel_nom' => 'Capacité min',
'valeur' => '7',
'id_opt' => '6',
),
125=>
array(
'id_sel' => '281',
'sel_nom' => 'Capacité min',
'valeur' => '8',
'id_opt' => '6',
),
126=>
array(
'id_sel' => '283',
'sel_nom' => 'Capacité min',
'valeur' => '9',
'id_opt' => '6',
),
127=>
array(
'id_sel' => '285',
'sel_nom' => 'Capacité min',
'valeur' => '10',
'id_opt' => '6',
),
128=>
array(
'id_sel' => '287',
'sel_nom' => 'Capacité min',
'valeur' => '11',
'id_opt' => '6',
),
129=>
array(
'id_sel' => '289',
'sel_nom' => 'Capacité min',
'valeur' => '12',
'id_opt' => '6',
),
130=>
array(
'id_sel' => '198',
'sel_nom' => 'Cylindrée max',
'valeur' => '50',
'id_opt' => '3',
),
131=>
array(
'id_sel' => '200',
'sel_nom' => 'Cylindrée max',
'valeur' => '80',
'id_opt' => '3',
),
132=>
array(
'id_sel' => '202',
'sel_nom' => 'Cylindrée max',
'valeur' => '125',
'id_opt' => '3',
),
133=>
array(
'id_sel' => '204',
'sel_nom' => 'Cylindrée max',
'valeur' => '250',
'id_opt' => '3',
),
134=>
array(
'id_sel' => '206',
'sel_nom' => 'Cylindrée max',
'valeur' => '500',
'id_opt' => '3',
),
135=>
array(
'id_sel' => '208',
'sel_nom' => 'Cylindrée max',
'valeur' => '600',
'id_opt' => '3',
),
136=>
array(
'id_sel' => '210',
'sel_nom' => 'Cylindrée max',
'valeur' => '750',
'id_opt' => '3',
),
137=>
array(
'id_sel' => '212',
'sel_nom' => 'Cylindrée max',
'valeur' => '1000',
'id_opt' => '3',
),
138=>
array(
'id_sel' => '197',
'sel_nom' => 'Cylindrée min',
'valeur' => '50',
'id_opt' => '3',
),
139=>
array(
'id_sel' => '199',
'sel_nom' => 'Cylindrée min',
'valeur' => '80',
'id_opt' => '3',
),
140=>
array(
'id_sel' => '201',
'sel_nom' => 'Cylindrée min',
'valeur' => '125',
'id_opt' => '3',
),
141=>
array(
'id_sel' => '203',
'sel_nom' => 'Cylindrée min',
'valeur' => '250',
'id_opt' => '3',
),
142=>
array(
'id_sel' => '205',
'sel_nom' => 'Cylindrée min',
'valeur' => '500',
'id_opt' => '3',
),
143=>
array(
'id_sel' => '207',
'sel_nom' => 'Cylindrée min',
'valeur' => '600',
'id_opt' => '3',
),
144=>
array(
'id_sel' => '209',
'sel_nom' => 'Cylindrée min',
'valeur' => '750',
'id_opt' => '3',
),
145=>
array(
'id_sel' => '211',
'sel_nom' => 'Cylindrée min',
'valeur' => '1000',
'id_opt' => '3',
),
146=>
array(
'id_sel' => '60',
'sel_nom' => 'Kilométrages max',
'valeur' => '10001',
'id_opt' => '1',
),
147=>
array(
'id_sel' => '62',
'sel_nom' => 'Kilométrages max',
'valeur' => '20000',
'id_opt' => '1',
),
148=>
array(
'id_sel' => '64',
'sel_nom' => 'Kilométrages max',
'valeur' => '30000',
'id_opt' => '1',
),
149=>
array(
'id_sel' => '66',
'sel_nom' => 'Kilométrages max',
'valeur' => '40000',
'id_opt' => '1',
),
150=>
array(
'id_sel' => '68',
'sel_nom' => 'Kilométrages max',
'valeur' => '50000',
'id_opt' => '1',
),
151=>
array(
'id_sel' => '70',
'sel_nom' => 'Kilométrages max',
'valeur' => '60000',
'id_opt' => '1',
),
152=>
array(
'id_sel' => '72',
'sel_nom' => 'Kilométrages max',
'valeur' => '70000',
'id_opt' => '1',
),
153=>
array(
'id_sel' => '74',
'sel_nom' => 'Kilométrages max',
'valeur' => '80000',
'id_opt' => '1',
),
154=>
array(
'id_sel' => '76',
'sel_nom' => 'Kilométrages max',
'valeur' => '90000',
'id_opt' => '1',
),
155=>
array(
'id_sel' => '78',
'sel_nom' => 'Kilométrages max',
'valeur' => '100000',
'id_opt' => '1',
),
156=>
array(
'id_sel' => '80',
'sel_nom' => 'Kilométrages max',
'valeur' => '125000',
'id_opt' => '1',
),
157=>
array(
'id_sel' => '82',
'sel_nom' => 'Kilométrages max',
'valeur' => '150000',
'id_opt' => '1',
),
158=>
array(
'id_sel' => '84',
'sel_nom' => 'Kilométrages max',
'valeur' => '175000',
'id_opt' => '1',
),
159=>
array(
'id_sel' => '86',
'sel_nom' => 'Kilométrages max',
'valeur' => '200000',
'id_opt' => '1',
),
160=>
array(
'id_sel' => '88',
'sel_nom' => 'Kilométrages max',
'valeur' => '225000',
'id_opt' => '1',
),
161=>
array(
'id_sel' => '90',
'sel_nom' => 'Kilométrages max',
'valeur' => '250000',
'id_opt' => '1',
),
162=>
array(
'id_sel' => '59',
'sel_nom' => 'Kilométrages min',
'valeur' => '10001',
'id_opt' => '1',
),
163=>
array(
'id_sel' => '61',
'sel_nom' => 'Kilométrages min',
'valeur' => '20000',
'id_opt' => '1',
),
164=>
array(
'id_sel' => '63',
'sel_nom' => 'Kilométrages min',
'valeur' => '30000',
'id_opt' => '1',
),
165=>
array(
'id_sel' => '65',
'sel_nom' => 'Kilométrages min',
'valeur' => '40000',
'id_opt' => '1',
),
166=>
array(
'id_sel' => '67',
'sel_nom' => 'Kilométrages min',
'valeur' => '50000',
'id_opt' => '1',
),
167=>
array(
'id_sel' => '69',
'sel_nom' => 'Kilométrages min',
'valeur' => '60000',
'id_opt' => '1',
),
168=>
array(
'id_sel' => '71',
'sel_nom' => 'Kilométrages min',
'valeur' => '70000',
'id_opt' => '1',
),
169=>
array(
'id_sel' => '73',
'sel_nom' => 'Kilométrages min',
'valeur' => '80000',
'id_opt' => '1',
),
170=>
array(
'id_sel' => '75',
'sel_nom' => 'Kilométrages min',
'valeur' => '90000',
'id_opt' => '1',
),
171=>
array(
'id_sel' => '77',
'sel_nom' => 'Kilométrages min',
'valeur' => '100000',
'id_opt' => '1',
),
172=>
array(
'id_sel' => '79',
'sel_nom' => 'Kilométrages min',
'valeur' => '125000',
'id_opt' => '1',
),
173=>
array(
'id_sel' => '81',
'sel_nom' => 'Kilométrages min',
'valeur' => '150000',
'id_opt' => '1',
),
174=>
array(
'id_sel' => '83',
'sel_nom' => 'Kilométrages min',
'valeur' => '175000',
'id_opt' => '1',
),
175=>
array(
'id_sel' => '85',
'sel_nom' => 'Kilométrages min',
'valeur' => '200000',
'id_opt' => '1',
),
176=>
array(
'id_sel' => '87',
'sel_nom' => 'Kilométrages min',
'valeur' => '225000',
'id_opt' => '1',
),
177=>
array(
'id_sel' => '89',
'sel_nom' => 'Kilométrages min',
'valeur' => '250000',
'id_opt' => '1',
),
178=>
array(
'id_sel' => '252',
'sel_nom' => 'Pièces max',
'valeur' => '1',
'id_opt' => '5',
),
179=>
array(
'id_sel' => '254',
'sel_nom' => 'Pièces max',
'valeur' => '2',
'id_opt' => '5',
),
180=>
array(
'id_sel' => '256',
'sel_nom' => 'Pièces max',
'valeur' => '3',
'id_opt' => '5',
),
181=>
array(
'id_sel' => '258',
'sel_nom' => 'Pièces max',
'valeur' => '4',
'id_opt' => '5',
),
182=>
array(
'id_sel' => '260',
'sel_nom' => 'Pièces max',
'valeur' => '5',
'id_opt' => '5',
),
183=>
array(
'id_sel' => '262',
'sel_nom' => 'Pièces max',
'valeur' => '6',
'id_opt' => '5',
),
184=>
array(
'id_sel' => '264',
'sel_nom' => 'Pièces max',
'valeur' => '7',
'id_opt' => '5',
),
185=>
array(
'id_sel' => '266',
'sel_nom' => 'Pièces max',
'valeur' => '8',
'id_opt' => '5',
),
186=>
array(
'id_sel' => '251',
'sel_nom' => 'Pièces min',
'valeur' => '1',
'id_opt' => '5',
),
187=>
array(
'id_sel' => '253',
'sel_nom' => 'Pièces min',
'valeur' => '2',
'id_opt' => '5',
),
188=>
array(
'id_sel' => '255',
'sel_nom' => 'Pièces min',
'valeur' => '3',
'id_opt' => '5',
),
189=>
array(
'id_sel' => '257',
'sel_nom' => 'Pièces min',
'valeur' => '4',
'id_opt' => '5',
),
190=>
array(
'id_sel' => '259',
'sel_nom' => 'Pièces min',
'valeur' => '5',
'id_opt' => '5',
),
191=>
array(
'id_sel' => '261',
'sel_nom' => 'Pièces min',
'valeur' => '6',
'id_opt' => '5',
),
192=>
array(
'id_sel' => '263',
'sel_nom' => 'Pièces min',
'valeur' => '7',
'id_opt' => '5',
),
193=>
array(
'id_sel' => '265',
'sel_nom' => 'Pièces min',
'valeur' => '8',
'id_opt' => '5',
),
194=>
array(
'id_sel' => '30',
'sel_nom' => 'Prix max',
'valeur' => '0',
'id_opt' => '0',
),
195=>
array(
'id_sel' => '31',
'sel_nom' => 'Prix max',
'valeur' => '1000',
'id_opt' => '0',
),
196=>
array(
'id_sel' => '32',
'sel_nom' => 'Prix max',
'valeur' => '2500',
'id_opt' => '0',
),
197=>
array(
'id_sel' => '33',
'sel_nom' => 'Prix max',
'valeur' => '5000',
'id_opt' => '0',
),
198=>
array(
'id_sel' => '34',
'sel_nom' => 'Prix max',
'valeur' => '7500',
'id_opt' => '0',
),
199=>
array(
'id_sel' => '35',
'sel_nom' => 'Prix max',
'valeur' => '10000',
'id_opt' => '0',
),
200=>
array(
'id_sel' => '36',
'sel_nom' => 'Prix max',
'valeur' => '15000',
'id_opt' => '0',
),
201=>
array(
'id_sel' => '37',
'sel_nom' => 'Prix max',
'valeur' => '25000',
'id_opt' => '0',
),
202=>
array(
'id_sel' => '38',
'sel_nom' => 'Prix max',
'valeur' => '50000',
'id_opt' => '0',
),
203=>
array(
'id_sel' => '39',
'sel_nom' => 'Prix max',
'valeur' => '75000',
'id_opt' => '0',
),
204=>
array(
'id_sel' => '40',
'sel_nom' => 'Prix max',
'valeur' => '100000',
'id_opt' => '0',
),
205=>
array(
'id_sel' => '41',
'sel_nom' => 'Prix max',
'valeur' => '150000',
'id_opt' => '0',
),
206=>
array(
'id_sel' => '42',
'sel_nom' => 'Prix max',
'valeur' => '200000',
'id_opt' => '0',
),
207=>
array(
'id_sel' => '43',
'sel_nom' => 'Prix max',
'valeur' => '250000',
'id_opt' => '0',
),
208=>
array(
'id_sel' => '44',
'sel_nom' => 'Prix max',
'valeur' => '300000',
'id_opt' => '0',
),
209=>
array(
'id_sel' => '45',
'sel_nom' => 'Prix max',
'valeur' => '350000',
'id_opt' => '0',
),
210=>
array(
'id_sel' => '46',
'sel_nom' => 'Prix max',
'valeur' => '400000',
'id_opt' => '0',
),
211=>
array(
'id_sel' => '47',
'sel_nom' => 'Prix max',
'valeur' => '450000',
'id_opt' => '0',
),
212=>
array(
'id_sel' => '48',
'sel_nom' => 'Prix max',
'valeur' => '500000',
'id_opt' => '0',
),
213=>
array(
'id_sel' => '49',
'sel_nom' => 'Prix max',
'valeur' => '550000',
'id_opt' => '0',
),
214=>
array(
'id_sel' => '50',
'sel_nom' => 'Prix max',
'valeur' => '600000',
'id_opt' => '0',
),
215=>
array(
'id_sel' => '51',
'sel_nom' => 'Prix max',
'valeur' => '650000',
'id_opt' => '0',
),
216=>
array(
'id_sel' => '52',
'sel_nom' => 'Prix max',
'valeur' => '700000',
'id_opt' => '0',
),
217=>
array(
'id_sel' => '53',
'sel_nom' => 'Prix max',
'valeur' => '750000',
'id_opt' => '0',
),
218=>
array(
'id_sel' => '54',
'sel_nom' => 'Prix max',
'valeur' => '800000',
'id_opt' => '0',
),
219=>
array(
'id_sel' => '55',
'sel_nom' => 'Prix max',
'valeur' => '850000',
'id_opt' => '0',
),
220=>
array(
'id_sel' => '56',
'sel_nom' => 'Prix max',
'valeur' => '900000',
'id_opt' => '0',
),
221=>
array(
'id_sel' => '57',
'sel_nom' => 'Prix max',
'valeur' => '950000',
'id_opt' => '0',
),
222=>
array(
'id_sel' => '58',
'sel_nom' => 'Prix max',
'valeur' => '1000000',
'id_opt' => '0',
),
223=>
array(
'id_sel' => '1',
'sel_nom' => 'Prix min',
'valeur' => '0',
'id_opt' => '0',
),
224=>
array(
'id_sel' => '2',
'sel_nom' => 'Prix min',
'valeur' => '1000',
'id_opt' => '0',
),
225=>
array(
'id_sel' => '3',
'sel_nom' => 'Prix min',
'valeur' => '2500',
'id_opt' => '0',
),
226=>
array(
'id_sel' => '4',
'sel_nom' => 'Prix min',
'valeur' => '5000',
'id_opt' => '0',
),
227=>
array(
'id_sel' => '5',
'sel_nom' => 'Prix min',
'valeur' => '7500',
'id_opt' => '0',
),
228=>
array(
'id_sel' => '6',
'sel_nom' => 'Prix min',
'valeur' => '10000',
'id_opt' => '0',
),
229=>
array(
'id_sel' => '7',
'sel_nom' => 'Prix min',
'valeur' => '15000',
'id_opt' => '0',
),
230=>
array(
'id_sel' => '8',
'sel_nom' => 'Prix min',
'valeur' => '25000',
'id_opt' => '0',
),
231=>
array(
'id_sel' => '9',
'sel_nom' => 'Prix min',
'valeur' => '50000',
'id_opt' => '0',
),
232=>
array(
'id_sel' => '10',
'sel_nom' => 'Prix min',
'valeur' => '75000',
'id_opt' => '0',
),
233=>
array(
'id_sel' => '11',
'sel_nom' => 'Prix min',
'valeur' => '100000',
'id_opt' => '0',
),
234=>
array(
'id_sel' => '12',
'sel_nom' => 'Prix min',
'valeur' => '150000',
'id_opt' => '0',
),
235=>
array(
'id_sel' => '13',
'sel_nom' => 'Prix min',
'valeur' => '200000',
'id_opt' => '0',
),
236=>
array(
'id_sel' => '14',
'sel_nom' => 'Prix min',
'valeur' => '250000',
'id_opt' => '0',
),
237=>
array(
'id_sel' => '15',
'sel_nom' => 'Prix min',
'valeur' => '300000',
'id_opt' => '0',
),
238=>
array(
'id_sel' => '16',
'sel_nom' => 'Prix min',
'valeur' => '350000',
'id_opt' => '0',
),
239=>
array(
'id_sel' => '17',
'sel_nom' => 'Prix min',
'valeur' => '400000',
'id_opt' => '0',
),
240=>
array(
'id_sel' => '18',
'sel_nom' => 'Prix min',
'valeur' => '450000',
'id_opt' => '0',
),
241=>
array(
'id_sel' => '19',
'sel_nom' => 'Prix min',
'valeur' => '500000',
'id_opt' => '0',
),
242=>
array(
'id_sel' => '20',
'sel_nom' => 'Prix min',
'valeur' => '550000',
'id_opt' => '0',
),
243=>
array(
'id_sel' => '21',
'sel_nom' => 'Prix min',
'valeur' => '600000',
'id_opt' => '0',
),
244=>
array(
'id_sel' => '22',
'sel_nom' => 'Prix min',
'valeur' => '650000',
'id_opt' => '0',
),
245=>
array(
'id_sel' => '23',
'sel_nom' => 'Prix min',
'valeur' => '700000',
'id_opt' => '0',
),
246=>
array(
'id_sel' => '24',
'sel_nom' => 'Prix min',
'valeur' => '750000',
'id_opt' => '0',
),
247=>
array(
'id_sel' => '25',
'sel_nom' => 'Prix min',
'valeur' => '800000',
'id_opt' => '0',
),
248=>
array(
'id_sel' => '26',
'sel_nom' => 'Prix min',
'valeur' => '850000',
'id_opt' => '0',
),
249=>
array(
'id_sel' => '27',
'sel_nom' => 'Prix min',
'valeur' => '900000',
'id_opt' => '0',
),
250=>
array(
'id_sel' => '28',
'sel_nom' => 'Prix min',
'valeur' => '950000',
'id_opt' => '0',
),
251=>
array(
'id_sel' => '29',
'sel_nom' => 'Prix min',
'valeur' => '1000000',
'id_opt' => '0',
),
252=>
array(
'id_sel' => '214',
'sel_nom' => 'Surface max',
'valeur' => '20',
'id_opt' => '4',
),
253=>
array(
'id_sel' => '216',
'sel_nom' => 'Surface max',
'valeur' => '25',
'id_opt' => '4',
),
254=>
array(
'id_sel' => '218',
'sel_nom' => 'Surface max',
'valeur' => '30',
'id_opt' => '4',
),
255=>
array(
'id_sel' => '220',
'sel_nom' => 'Surface max',
'valeur' => '35',
'id_opt' => '4',
),
256=>
array(
'id_sel' => '222',
'sel_nom' => 'Surface max',
'valeur' => '40',
'id_opt' => '4',
),
257=>
array(
'id_sel' => '224',
'sel_nom' => 'Surface max',
'valeur' => '50',
'id_opt' => '4',
),
258=>
array(
'id_sel' => '226',
'sel_nom' => 'Surface max',
'valeur' => '60',
'id_opt' => '4',
),
259=>
array(
'id_sel' => '228',
'sel_nom' => 'Surface max',
'valeur' => '70',
'id_opt' => '4',
),
260=>
array(
'id_sel' => '230',
'sel_nom' => 'Surface max',
'valeur' => '80',
'id_opt' => '4',
),
261=>
array(
'id_sel' => '232',
'sel_nom' => 'Surface max',
'valeur' => '90',
'id_opt' => '4',
),
262=>
array(
'id_sel' => '234',
'sel_nom' => 'Surface max',
'valeur' => '100',
'id_opt' => '4',
),
263=>
array(
'id_sel' => '236',
'sel_nom' => 'Surface max',
'valeur' => '110',
'id_opt' => '4',
),
264=>
array(
'id_sel' => '238',
'sel_nom' => 'Surface max',
'valeur' => '120',
'id_opt' => '4',
),
265=>
array(
'id_sel' => '240',
'sel_nom' => 'Surface max',
'valeur' => '130',
'id_opt' => '4',
),
266=>
array(
'id_sel' => '242',
'sel_nom' => 'Surface max',
'valeur' => '140',
'id_opt' => '4',
),
267=>
array(
'id_sel' => '244',
'sel_nom' => 'Surface max',
'valeur' => '150',
'id_opt' => '4',
),
268=>
array(
'id_sel' => '246',
'sel_nom' => 'Surface max',
'valeur' => '200',
'id_opt' => '4',
),
269=>
array(
'id_sel' => '248',
'sel_nom' => 'Surface max',
'valeur' => '300',
'id_opt' => '4',
),
270=>
array(
'id_sel' => '250',
'sel_nom' => 'Surface max',
'valeur' => '500',
'id_opt' => '4',
),
271=>
array(
'id_sel' => '213',
'sel_nom' => 'Surface min',
'valeur' => '20',
'id_opt' => '4',
),
272=>
array(
'id_sel' => '215',
'sel_nom' => 'Surface min',
'valeur' => '25',
'id_opt' => '4',
),
273=>
array(
'id_sel' => '217',
'sel_nom' => 'Surface min',
'valeur' => '30',
'id_opt' => '4',
),
274=>
array(
'id_sel' => '219',
'sel_nom' => 'Surface min',
'valeur' => '35',
'id_opt' => '4',
),
275=>
array(
'id_sel' => '221',
'sel_nom' => 'Surface min',
'valeur' => '40',
'id_opt' => '4',
),
276=>
array(
'id_sel' => '223',
'sel_nom' => 'Surface min',
'valeur' => '50',
'id_opt' => '4',
),
277=>
array(
'id_sel' => '225',
'sel_nom' => 'Surface min',
'valeur' => '60',
'id_opt' => '4',
),
278=>
array(
'id_sel' => '227',
'sel_nom' => 'Surface min',
'valeur' => '70',
'id_opt' => '4',
),
279=>
array(
'id_sel' => '229',
'sel_nom' => 'Surface min',
'valeur' => '80',
'id_opt' => '4',
),
280=>
array(
'id_sel' => '231',
'sel_nom' => 'Surface min',
'valeur' => '90',
'id_opt' => '4',
),
281=>
array(
'id_sel' => '233',
'sel_nom' => 'Surface min',
'valeur' => '100',
'id_opt' => '4',
),
282=>
array(
'id_sel' => '235',
'sel_nom' => 'Surface min',
'valeur' => '110',
'id_opt' => '4',
),
283=>
array(
'id_sel' => '237',
'sel_nom' => 'Surface min',
'valeur' => '120',
'id_opt' => '4',
),
284=>
array(
'id_sel' => '239',
'sel_nom' => 'Surface min',
'valeur' => '130',
'id_opt' => '4',
),
285=>
array(
'id_sel' => '241',
'sel_nom' => 'Surface min',
'valeur' => '140',
'id_opt' => '4',
),
286=>
array(
'id_sel' => '243',
'sel_nom' => 'Surface min',
'valeur' => '150',
'id_opt' => '4',
),
287=>
array(
'id_sel' => '245',
'sel_nom' => 'Surface min',
'valeur' => '200',
'id_opt' => '4',
),
288=>
array(
'id_sel' => '247',
'sel_nom' => 'Surface min',
'valeur' => '300',
'id_opt' => '4',
),
289=>
array(
'id_sel' => '249',
'sel_nom' => 'Surface min',
'valeur' => '500',
'id_opt' => '4',
),
);