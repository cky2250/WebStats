<?php

// Don't edit this entry!
define('WS_CONFIG_NoMySQL', true);

//	Start	recipe	declaration
//format id of item output |topleft, topmiddle, topright|left, middle, right|bottomleft, bottom, bottomright| number of the output
$recipe	=	array(
	0	=>	'5|,,|,,|,17,|4',
	1	=>	'5|,,|,,|,17-1,|4',
	2	=>	'5|,,|,,|,17-2,|4',
	3	=>	'280|,,|,5,|,5,|4',
	4	=>	'50|,,|,263,|,280,|4',
	5	=>	'58|,,|5,5,|5,5,|1',
	6	=>	'61|4,4,4|4,,4|4,4,4|1',
	7	=>	'54|5,5,5|5,,5|5,5,5|1',
	8	=>	'41|266,266,266|266,266,266|266,266,266|1',
	9	=>	'42|265,265,265|265,265,265|265,265,265|1',
	10	=>	'57|264,264,264|264,264,264|264,264,264|1',
	11	=>	'22|351-4,351-4,351-4|351-4,351-4,351-4|351-4,351-4,351-4|1',
	12	=>	'89|,,|348,348,|348,348,|1',
	13	=>	'35|,,|287,287,|287,287,|1',
	14	=>	'46|289,12,289|12,289,12|289,12,289|1',
	15	=>	'43|,,|,,|1,1,1|3',
	16	=>	'43-1|,,|,,|24,24,24|3',
	17	=>	'43-2|,,|,,|5,5,5|3',
	18	=>	'43-3|,,|,,|4,4,4|3',
	19	=>	'43-4|,,|,,|45,45,45|3',
	20	=>	'43-5|,,|,,|98,98,98|3',
	21	=>	'53|5,,|5,5,|5,5,5|4',
	22	=>	'67|4,,|4,4,|4,4,4|4',
	23	=>	'108|45,,|45,45,|45,45,45|4',
	24	=>	'109|98,,|98,98,|98,98,98|4',
	25	=>	'114|112,,|112,112,|112,112,112|4',
	26	=>	'80|,,|332,332,|332,332,|1',
	27	=>	'82|,,|337,337,|337,337,|1',
	28	=>	'45|,,|336,336,|336,336,|1',
	29	=>	'98|,,|1,1,|1,1,|4',
	30	=>	'47|5,5,5|340,340,340|5,5,5|1',
	31	=>	'24|,,|12,12,|12,12,|1',
	32	=>	'91|,,|,86,|,50,|1',
	33	=>	'328|,,|265,,265|265,265,265|1',
	34	=>	'343|,,|,61,|,328,|1',
	35	=>	'342|,,|,54,|,328,|1',
	36	=>	'66|265,,265|265,280,265|265,,265|16',
	37	=>	'27|266,,266|266,280,266|266,331,266|6',
	38	=>	'28|265,,265|265,70,265|265,331,265|6',
	39	=>	'333|,,|5,,5|5,5,5|1',
	40	=>	'324|5,5,|5,5,|5,5,|1',
	41	=>	'330|265,265,|265,265,|265,265,|1',
	42	=>	'96|,,|5,5,5|5,5,5|2',
	43	=>	'72|,,|,,|5,5,|1',
	44	=>	'70|,,|,,|1,1,|1',
	45	=>	'77|,,|,1,|,,|1', //fixed 10/25/2012 for the new button format in crafting table.
	46	=>	'76|,,|,331,|,280,|1',
	47	=>	'69|,,|,280,|,4,|1',
	48	=>	'25|5,5,5|5,331,5|5,5,5|1',
	49	=>	'84|5,5,5|5,264,5|5,5,5|1',
	50	=>	'23|4,4,4|4,261,4|4,331,4|1',
	51	=>	'93|,,|76,331,76|1,1,1|1',
	52	=>	'33|5,5,5|4,265,4|4,331,4|1',
	53	=>	'29|,,|,341,|,33,|1',
	54	=>	'281|,,|5,,5|,5,|4',
	55	=>	'282|,40,|,39,|,281,|1',
	56	=>	'282|,39,|,40,|,281,|1',
	57	=>	'297|,,|,,|296,296,296|1',
	58	=>	'353|,,|,,|,338,|1',
	59	=>	'354|335,335,335|353,344,353|296,296,296|1',
	60	=>	'357|,,|,,|296,351-3,296|8',
	61	=>	'322|41,41,41|41,260,41|41,41,41|1',
	62	=>	'103|360,360,360|360,360,360|360,360,360|1',
	63	=>	'361|,,|,,|,360,|1',
	64	=>	'265|,,|,,|,42,|9',
	65	=>	'266|,,|,,|,41,|9',
	66	=>	'264|,,|,,|,57,|9',
	67	=>	'351-4|,,|,,|,22,|9',
	68	=>	'321|280,280,280|280,35,280|280,280,280|1',
	69	=>	'323|5,5,5|5,5,5|,280,|1',
	70	=>	'65|280,,280|280,280,280|280,,280|2',
	71	=>	'102|,,|20,20,20|20,20,20|16',
	72	=>	'101|,,|265,265,265|265,265,265|16',
	73	=>	'339|,,|,,|338,338,338|3',
	74	=>	'340|,339,|,339,|,339,|1',
	75	=>	'85|,,|280,280,280|280,280,280|2',
	76	=>	'113|,,|112,112,112|112,112,112|6',
	77	=>	'107|,,|280,5,280|280,5,280|1',
	78	=>	'355|,,|35,35,35|5,5,5|1',
	79	=>	'351-15|,,|,352,|,,|3',
	80	=>	'351-7|,,|,,|351,351-15,351-15|3',
	81	=>	'351-7|,,|,,|351-8,,351-15|3',
	82	=>	'351-8|,,|,,|351,,351-15|2',
	83	=>	'351-1|,,|,,|,38,|2',
	84	=>	'351-14|,,|,,|351-1,,351-11|2',
	85	=>	'351-11|,,|,,|,351-11,|2',
	86	=>	'351-10|,,|,,|351-2,,351-15|2',
	87	=>	'351-12|,,|,,|351-4,,351-15|2',
	88	=>	'351-6|,,|,,|351-4,,351-2|2',
	89	=>	'351-5|,,|,,|351-4,,351-1|2',
	90	=>	'351-13|,,|,,|351-5,,351-9|2',
	91	=>	'351-13|,,|351-4,351-15,|351-1,351-1,|2',
	92	=>	'351-13|,,|,,|351-9,351-1,351-4|2',
	93	=>	'351-9|,,|,,|351-1,,351-15|2',
	94	=>	'271|5,5,|5,280,|,280,|1',
	95	=>	'275|4,4,|4,280,|,280,|1',
	96	=>	'258|265,265,|265,280,|,280,|1',
	97	=>	'286|266,266,|266,280,|,280,|1',
	98	=>	'279|264,264,|264,280,|,280,|1',
	99	=>	'270|5,5,5|,280,|,280,|1',
	100	=>	'274|4,4,4|,280,|,280,|1',
	101	=>	'257|265,265,265|,280,|,280,|1',
	102	=>	'285|266,266,266|,280,|,280,|1',
	103	=>	'278|264,264,264|,280,|,280,|1',
	104	=>	'269|,5,|,280,|,280,|1',
	105	=>	'273|,4,|,280,|,280,|1',
	106	=>	'256|,265,|,280,|,280,|1',
	107	=>	'284|,266,|,280,|,280,|1',
	108	=>	'277|,264,|,280,|,280,|1',
	109	=>	'290|5,5,|,280,|,280,|1',
	110	=>	'291|4,4,|,280,|,280,|1',
	111	=>	'292|265,265,|,280,|,280,|1',
	112	=>	'294|266,266,|,280,|,280,|1',
	113	=>	'293|264,264,|,280,|,280,|1',
	114	=>	'259|,,|265,,|,318,|1',
	115	=>	'325|,,|265,,265|,265,|1',
	116	=>	'345|,265,|265,331,265|,265,|1',
	117	=>	'358|339,339,339|339,345,339|339,339,339|1',
	118	=>	'347|,266,|266,331,266|,266,|1',
	119	=>	'346|,,280|,280,287|280,,287|1',
	120	=>	'359|,,|,265,|265,,|1',
	121	=>	'298|,,|334,334,334|334,,334|1',
	122	=>	'314|,,|266,266,266|266,,266|1',
	123	=>	'306|,,|265,265,265|265,,265|1',
	124	=>	'310|,,|264,264,264|264,,264|1',
	125	=>	'302|,,|10,10,10|10,,10|1',
	126	=>	'299|334,,334|334,334,334|334,334,334|1',
	127	=>	'315|266,,266|266,266,266|266,266,266|1',
	128	=>	'307|265,,265|265,265,265|265,265,265|1',
	129	=>	'311|264,,264|264,264,264|264,264,264|1',
	130	=>	'303|10,,10|10,10,10|10,10,10|1',
	131	=>	'300|334,334,334|334,,334|334,,334|1',
	132	=>	'316|266,266,266|266,,266|266,,266|1',
	133	=>	'308|265,265,265|265,,265|265,,265|1',
	134	=>	'312|264,264,264|264,,264|264,,264|1',
	135	=>	'304|10,10,10|10,,10|10,,10|1',
	136	=>	'301|,,|334,,334|334,,334|1',
	137	=>	'317|,,|266,,266|266,,266|1',
	138	=>	'309|,,|265,,265|265,,265|1',
	139	=>	'313|,,|264,,264|264,,264|1',
	140	=>	'305|,,|10,,10|10,,10|1',
	141	=>	'268|,5,|,5,|,280,|1',
	142	=>	'272|,4,|,4,|,280,|1',
	143	=>	'267|,265,|,265,|,280,|1',
	144	=>	'283|,266,|,266,|,280,|1',
	145	=>	'276|,264,|,264,|,280,|1',
	146	=>	'261|,280,287|280,,287|,280,287|1',
	147	=>	'262|,318,|,280,|,288,|4',
	148	=>	'35-8|,,|,,|35,,351-7|1',
	149	=>	'35-7|,,|,,|35,,351-8|1',
	150	=>	'35-15|,,|,,|35,,351|1',
	151	=>	'35-14|,,|,,|35,,351-1|1',
	152	=>	'35-1|,,|,,|35,,351-14|1',
	153	=>	'35-4|,,|,,|35,,351-11|1',
	154	=>	'35-5|,,|,,|35,,351-10|1',
	155	=>	'35-13|,,|,,|35,,351-2|1',
	156	=>	'35-3|,,|,,|35,,351-12|1',
	157	=>	'35-9|,,|,,|35,,351-6|1',
	158	=>	'35-11|,,|,,|35,,351-4|1',
	159	=>	'35-10|,,|,,|35,,351-5|1',
	160	=>	'35-2|,,|,,|35,,351-13|1',
	161	=>	'35-6|,,|,,|35,,351-9|1',
	162	=>	'35-12|,,|,,|35,,351-3|1',
	163	=>	'377|,,|,369,|,,|2',
	164	=>	'378|,,|,341,|,377,|1',
	165	=>	'381|,,|,368,|,377,|1',
	166	=>	'385|,377,|,289,|,263,|3|1',
	167	=>	'380|265,,265|265,,265|265,265,265|1',
	168	=>	'374|,,|20,,20|,20,|3',
	169	=>	'382|,,|360,371,|,,|1',
	170	=>	'371|,,|,266,|,,|9',
	171	=>	'266|371,371,371|371,371,371|371,371,371|1',
	172	=>	'116|,340,|264,49,264|49,49,49|1',
	173	=>	'130|49,49,49|49,381,49|49,49,49|1',
	174	=>	'138|20,20,20|20,399,20|49,49,49|1',
	175	=>	'389|280,280,280|280,334,280|280,280,280|1',
	176	=>	'390|,,|336,,336|,336,|1',
	177	=>	'388|,,|,133,|,,|9|1',
	178	=>	'133|388,388,388|388,388,388|388,388,388|1|1',
	179 =>	'145|42,42,42|,265,|265,265,265|1',
	180 =>	'131|,265,|,280,|,265,|2',
	181 =>	'396|371,371,371|371,391,371|371,371,371|1',
	182 =>	'44|,,|,,|1,1,1|6'
);
// End Recipe
//
// Start brewing recipe	declaration
// Format
// item number input | input 1, input 2, input 3| number of output | output
$brewing	=	array(
	//	-------------- Primary Start --------------
	0	=>	'372|,373,|1|373-16',
	1	=>	'331|,373,|1|373-64',
	// -- Mundane Potion Start --
	2	=>	'370|,373,|1|373-8192',
	3	=>	'382|,373,|1|373|373-8192',
	4	=>	'377|,373,|1|373-8192',
	5	=>	'378|,373,|1|373-8192',
	6	=>	'353|,373,|1|373-8192',
	7	=>	'375|,373,|1|373-8192',
	// -- Mundane Potion End --
	8	=>	'348|,373,|1|373-32',
	9	=>	'376|,373,|1|373-8202',
	// -------------- Primary End --------------
	
	// -------------- Secondary Start  --------------
	// -------------- Positive --------------
	10	=>	'382|,373-16,|1|373-8197', //Potion of Healing
	11	=>	'378|,373-16,|1|373-8195', //Potion of Fire Resistance
	12	=>	'370|,373-16,|1|373-8193', //Potion of Regeneration
	13	=>	'377|,373-16,|1|373-8201', //Potion of Strength
	14	=>	'353|,373-16,|1|373-8194', //Potion of Swiftness
	69	=>	'396|,373-16,|1|373-8198', //Potion of Night Vision
	// -------------- Negative --------------
	15	=>	'375|,373-16,|1|373-8196', //Potion of Poison
	// -- Potion of Weakness Start --
	16	=>	'376|,373-16,|1|373-8200',
	17	=>	'376|,373-32,|1|373-8200',
	18	=>	'376|,373-8192,|1|373-8200',
	// -- Potion of Weakness End --
	19	=>	'376|,373-64,|1|373-8264', //Potion of Weakness(Extended)
	// -------------- Secondary End  --------------
	
	// -------------- Tertiary Start  --------------
	// -------------- Positive --------------
	// -- Potion of Fire Resistance (Extended) --
	20	=>	'331|,373-8195,|1|373-8259',
	21	=>	'331|,373-8227,|1|373-8259',
	// -- Potion of Healing II --
	22	=>	'348|,373-8197,|1|373-8229',
	23	=>	'348|,373-8261,|1|373-8229',
	// -- Potion of Regeneration(Extended) --
	24	=>	'331|,373-8193,|1|373-8257',
	25	=>	'331|,373-8225,|1|373-8257',
	// -- Potion of Regeneration II --
	26	=>	'348|,373-8193,|1|373-8225',
	27	=>	'348|,373-8257,|1|373-8225',
	// -- Potion of Strength(Extended) --
	28	=>	'331|,373-8201,|1|373-8265',
	29	=>	'331|,373-8233,|1|373-8265',
	// -- Potion of Strength II --
	30	=>	'348|,373-8201,|1|373-8233',
	31	=>	'348|,373-8265,|1|373-8233',
	// -- Potion of Swiftness(Extended) --
	32	=>	'331|,373-8194,|1|373-8258',
	33	=>	'331|,373-8226,|1|373-8258',
	// -- Potion of Swiftness II --
	34	=>	'331|,373-8194,|1|373-8226',
	35	=>	'331|,373-8258,|1|373-8226',
	// -- Potion of Invisibility --
	71	=>	'376|,373-8198,|1|373-8270',
	// -------------- Negative --------------
	// -- Potion of Harming --
	36	=>	'376|,373-8197,|1|373-8204',
	37	=>	'376|,373-8196,|1|373-8204',
	// -- Potion of Harming II --
	38	=>	'376|,373-8229,|1|373-8236',
	39	=>	'376|,373-8228,|1|373-8236',
	40	=>	'348|,373-8204,|1|373-8236',
	41	=>	'348|,373-8268,|1|373-8236',
	// -- Potion of Poison(Extended) --
	42	=>	'331|,373-8196,|1|373-8260',
	43	=>	'331|,373-8228,|1|373-8260',
	// -- Potion of Poison II --
	44	=>	'348|,373-8260,|1|373-8228',
	45	=>	'348|,373-8196,|1|373-8228',
	// -- Potion of Slowness --
	46	=>	'376|,373-8195,|1|373-8202',
	47	=>	'376|,373-8194,|1|373-8202',
	// -- Potion of Slowness(Extended) --
	48	=>	'376|,373-8259,|1|373-8266',
	49	=>	'376|,373-8258,|1|373-8266',
	50	=>	'331|,373-8202,|1|373-8266',
	51	=>	'331|,373-8234,|1|373-8266',
	// -- Potion of Weakness --
	52	=>	'376|,373-8201,|1|373-8200',
	53	=>	'376|,373-8193,|1|373-8200',
	// -- Potion of Weakness(Extended) --
	54	=>	'376|,373-8265,|1|373-8264',
	55	=>	'376|,373-8257,|1|373-8264',
	56	=>	'331|,373-8200,|1|373-8264',
	57	=>	'331|,373-8232,|1|373-8264',
	// -------------- Reverted --------------
	58	=>	'348|,373-8259,|1|373-8227', //Potion of Fire Resistance(Reverted)
	59	=>	'348|,373-8266,|1|373-8234', //Potion of Slowness(Reverted)
	60	=>	'348|,373-8264,|1|373-8232', //Potion of Weakness(Reverted)
	61	=>	'331|,373-8229,|1|373-8261', //Potion of Healing(Reverted)
	// -- Potion of Harming(Reverted) --
	62	=>	'331|,373-8236,|1|373-8268',
	63	=>	'376|,373-8261,|1|373-8268',
	64	=>	'376|,373-8260,|1|373-8268',
	//-- Potion of Slowness(Reverted) --
	65	=>	'376|,373-8227 ,|1|373-8234',
	66	=>	'376|,373-8226 ,|1|373-8234',
	//-- Potion of Weakness(Reverted) --
	67	=>	'376|,373-8233 ,|1|373-8232',
	68	=>	'376|,373-8225 ,|1|373-8232'
);
// ------ End brewing ------
//
// Start smelting recipe	declaration
// Format
// item number output | input 1 (top) , input 2 (bottom)
$smelting	=	array(
	0	=>	'265|15,263',
	1	=>	'263|16,263',
	2	=>	'20|12,263',
	3	=>	'1|4,263',
	4	=>	'336|337,263',
	5	=>	'264|56,263',
	6	=>	'351|21,263',
	7	=>	'331|73,263',
	8	=>	'388|129,263',
	9	=>	'351-2|81,263',
	//--- FOOD ---
	10	=>	'320|319,263',
	11	=>	'364|363,263',
	12	=>	'366|365,263',
	13	=>	'350|349,263',
	14	=>	'393|392,263',
	
	//--- END FOOD ---
);
?>