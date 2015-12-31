--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: link; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO link VALUES (3, 'Home', 'Presenter', 'view');
INSERT INTO link VALUES (4, 'Page', 'Presenter', 'list');
INSERT INTO link VALUES (5, 'Page', 'Presenter', 'add');
INSERT INTO link VALUES (6, 'Menu', 'Presenter', 'list');
INSERT INTO link VALUES (7, 'Menu', 'Presenter', 'add');
INSERT INTO link VALUES (13, 'Link', 'Presenter', 'list');
INSERT INTO link VALUES (14, 'Link', 'Presenter', 'add');
INSERT INTO link VALUES (15, 'Translation', 'Presenter', 'list');
INSERT INTO link VALUES (16, 'Translation', 'Presenter', 'add');
INSERT INTO link VALUES (22, 'Shop:Home', 'Presenter', 'view');
INSERT INTO link VALUES (23, 'Shop:Category', 'Presenter', 'list');
INSERT INTO link VALUES (24, 'Shop:Category', 'Presenter', 'add');
INSERT INTO link VALUES (25, 'Blog:Home', 'Presenter', 'view');
INSERT INTO link VALUES (26, 'Blog:Post', 'Presenter', 'list');
INSERT INTO link VALUES (28, 'Blog:Category', 'Presenter', 'list');
INSERT INTO link VALUES (29, 'Blog:Post', 'Presenter', 'add');
INSERT INTO link VALUES (30, 'Blog:Category', 'Presenter', 'add');
INSERT INTO link VALUES (33, 'Blog:Category', 'Presenter', 'view');
INSERT INTO link VALUES (34, 'Shop:Category', 'Presenter', 'view');
INSERT INTO link VALUES (35, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (36, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (37, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (38, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (97, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (98, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (99, 'Blog:Category', 'Presenter', 'view');
INSERT INTO link VALUES (100, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (101, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (102, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (103, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (106, 'Blog:Category', 'Presenter', 'view');
INSERT INTO link VALUES (107, 'Blog:Category', 'Presenter', 'view');
INSERT INTO link VALUES (114, 'Shop:Product', 'Presenter', 'list');
INSERT INTO link VALUES (115, 'Shop:Product', 'Presenter', 'add');
INSERT INTO link VALUES (117, 'Shop:Product', 'Presenter', 'view');
INSERT INTO link VALUES (20, 'Page', 'Presenter', 'view');
INSERT INTO link VALUES (116, 'Shop:Category', 'Presenter', 'view');
INSERT INTO link VALUES (104, 'Blog:Post', 'Presenter', 'view');
INSERT INTO link VALUES (133, 'Web', 'Presenter', 'list');
INSERT INTO link VALUES (135, 'Web', 'Presenter', 'add');
INSERT INTO link VALUES (2, 'Home', 'Presenter', 'view');


--
-- Data for Name: translation; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO translation VALUES (43);
INSERT INTO translation VALUES (44);
INSERT INTO translation VALUES (45);
INSERT INTO translation VALUES (46);
INSERT INTO translation VALUES (47);
INSERT INTO translation VALUES (48);
INSERT INTO translation VALUES (49);
INSERT INTO translation VALUES (50);
INSERT INTO translation VALUES (51);
INSERT INTO translation VALUES (52);
INSERT INTO translation VALUES (55);
INSERT INTO translation VALUES (56);
INSERT INTO translation VALUES (62);
INSERT INTO translation VALUES (63);
INSERT INTO translation VALUES (65);
INSERT INTO translation VALUES (66);
INSERT INTO translation VALUES (67);
INSERT INTO translation VALUES (68);
INSERT INTO translation VALUES (69);
INSERT INTO translation VALUES (71);
INSERT INTO translation VALUES (72);
INSERT INTO translation VALUES (73);
INSERT INTO translation VALUES (208);
INSERT INTO translation VALUES (209);
INSERT INTO translation VALUES (210);
INSERT INTO translation VALUES (211);
INSERT INTO translation VALUES (212);
INSERT INTO translation VALUES (213);
INSERT INTO translation VALUES (214);
INSERT INTO translation VALUES (215);
INSERT INTO translation VALUES (216);
INSERT INTO translation VALUES (217);
INSERT INTO translation VALUES (218);
INSERT INTO translation VALUES (219);
INSERT INTO translation VALUES (223);
INSERT INTO translation VALUES (224);
INSERT INTO translation VALUES (235);
INSERT INTO translation VALUES (236);
INSERT INTO translation VALUES (237);
INSERT INTO translation VALUES (238);
INSERT INTO translation VALUES (239);
INSERT INTO translation VALUES (240);
INSERT INTO translation VALUES (245);
INSERT INTO translation VALUES (246);
INSERT INTO translation VALUES (281);
INSERT INTO translation VALUES (283);


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO menu VALUES (1, 2, 43);
INSERT INTO menu VALUES (2, 3, 44);
INSERT INTO menu VALUES (5, 4, 45);
INSERT INTO menu VALUES (7, 5, 46);
INSERT INTO menu VALUES (8, 6, 47);
INSERT INTO menu VALUES (9, 7, 48);
INSERT INTO menu VALUES (40, 13, 49);
INSERT INTO menu VALUES (41, 14, 50);
INSERT INTO menu VALUES (42, 15, 51);
INSERT INTO menu VALUES (43, 16, 52);
INSERT INTO menu VALUES (47, 20, 63);
INSERT INTO menu VALUES (49, 22, 65);
INSERT INTO menu VALUES (50, 23, 66);
INSERT INTO menu VALUES (51, 24, 67);
INSERT INTO menu VALUES (52, 25, 68);
INSERT INTO menu VALUES (53, 26, 69);
INSERT INTO menu VALUES (54, 28, 71);
INSERT INTO menu VALUES (55, 29, 72);
INSERT INTO menu VALUES (56, 30, 73);
INSERT INTO menu VALUES (60, 99, 209);
INSERT INTO menu VALUES (62, 106, 223);
INSERT INTO menu VALUES (63, 107, 224);
INSERT INTO menu VALUES (69, 114, 235);
INSERT INTO menu VALUES (70, 115, 236);
INSERT INTO menu VALUES (71, 116, 237);
INSERT INTO menu VALUES (87, 133, 281);
INSERT INTO menu VALUES (89, 135, 283);


--
-- Data for Name: blog_category; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO blog_category VALUES (3, 60);


--
-- Data for Name: blog_category_description; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO blog_category_description VALUES (1, 3, 208);


--
-- Name: blog_category_description_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('blog_category_description_id_seq', 1, true);


--
-- Name: blog_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('blog_category_id_seq', 4, false);


--
-- Data for Name: blog_post; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO blog_post VALUES (65, 100, 210, 211);
INSERT INTO blog_post VALUES (66, 101, 212, 213);
INSERT INTO blog_post VALUES (67, 102, 214, 215);
INSERT INTO blog_post VALUES (68, 103, 216, 217);
INSERT INTO blog_post VALUES (69, 104, 218, 219);


--
-- Data for Name: blog_post_category; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO blog_post_category VALUES (1, 65, 3, true);
INSERT INTO blog_post_category VALUES (2, 66, 3, true);
INSERT INTO blog_post_category VALUES (3, 67, 3, true);
INSERT INTO blog_post_category VALUES (4, 68, 3, true);
INSERT INTO blog_post_category VALUES (5, 69, 3, true);


--
-- Name: blog_post_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('blog_post_category_id_seq', 5, true);


--
-- Data for Name: blog_post_description; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Name: blog_post_description_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('blog_post_description_id_seq', 1, false);


--
-- Name: blog_post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('blog_post_id_seq', 70, false);


--
-- Name: link_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('link_id_seq', 137, true);


--
-- Data for Name: link_parameter; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO link_parameter VALUES (34, 33, 'id', '2');
INSERT INTO link_parameter VALUES (35, 34, 'id', '1');
INSERT INTO link_parameter VALUES (36, 35, 'id', '1');
INSERT INTO link_parameter VALUES (37, 36, 'id', '2');
INSERT INTO link_parameter VALUES (38, 37, 'id', '3');
INSERT INTO link_parameter VALUES (39, 38, 'id', '4');
INSERT INTO link_parameter VALUES (42, 97, 'id', '63');
INSERT INTO link_parameter VALUES (43, 98, 'id', '64');
INSERT INTO link_parameter VALUES (44, 99, 'id', '3');
INSERT INTO link_parameter VALUES (45, 100, 'id', '65');
INSERT INTO link_parameter VALUES (46, 101, 'id', '66');
INSERT INTO link_parameter VALUES (47, 102, 'id', '67');
INSERT INTO link_parameter VALUES (48, 103, 'id', '68');
INSERT INTO link_parameter VALUES (49, 104, 'id', '69');
INSERT INTO link_parameter VALUES (51, 106, 'id', '5');
INSERT INTO link_parameter VALUES (52, 107, 'id', '6');
INSERT INTO link_parameter VALUES (53, 116, 'id', '1');
INSERT INTO link_parameter VALUES (54, 117, 'id', '1');
INSERT INTO link_parameter VALUES (31, 20, 'id', '1');


--
-- Name: link_parameter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('link_parameter_id_seq', 70, true);


--
-- Name: menu_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('menu_id_seq', 91, true);


--
-- Data for Name: menu_node; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO menu_node VALUES (10, 5, 2, true);
INSERT INTO menu_node VALUES (11, 7, 5, true);
INSERT INTO menu_node VALUES (12, 8, 2, true);
INSERT INTO menu_node VALUES (13, 9, 8, true);
INSERT INTO menu_node VALUES (20, 40, 2, true);
INSERT INTO menu_node VALUES (21, 41, 40, true);
INSERT INTO menu_node VALUES (22, 42, 2, true);
INSERT INTO menu_node VALUES (23, 43, 42, true);
INSERT INTO menu_node VALUES (29, 49, 2, true);
INSERT INTO menu_node VALUES (30, 50, 49, true);
INSERT INTO menu_node VALUES (31, 51, 50, true);
INSERT INTO menu_node VALUES (32, 52, 2, true);
INSERT INTO menu_node VALUES (33, 53, 52, true);
INSERT INTO menu_node VALUES (34, 54, 52, true);
INSERT INTO menu_node VALUES (35, 55, 53, true);
INSERT INTO menu_node VALUES (36, 56, 54, true);
INSERT INTO menu_node VALUES (41, 69, 49, true);
INSERT INTO menu_node VALUES (42, 70, 69, true);
INSERT INTO menu_node VALUES (53, 87, 2, true);
INSERT INTO menu_node VALUES (55, 89, 87, true);
INSERT INTO menu_node VALUES (39, 60, 1, true);
INSERT INTO menu_node VALUES (50, 47, 1, true);
INSERT INTO menu_node VALUES (52, 71, 1, true);


--
-- Name: menu_node_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('menu_node_id_seq', 55, true);


--
-- Data for Name: page; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO page VALUES (1, 47, 62);


--
-- Name: page_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('page_id_seq', 17, true);


--
-- Data for Name: shop_category; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO shop_category VALUES (1, 71);


--
-- Data for Name: shop_category_description; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO shop_category_description VALUES (1, 1, 246);


--
-- Name: shop_category_description_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('shop_category_description_id_seq', 1, true);


--
-- Name: shop_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('shop_category_id_seq', 1, false);


--
-- Data for Name: shop_product; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO shop_product VALUES (1, 117, 238);


--
-- Data for Name: shop_product_category; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO shop_product_category VALUES (1, 1, 1, true);


--
-- Name: shop_product_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('shop_product_category_id_seq', 1, true);


--
-- Data for Name: shop_product_content; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO shop_product_content VALUES (1, 1, 240);


--
-- Name: shop_product_content_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('shop_product_content_id_seq', 1, true);


--
-- Data for Name: shop_product_description; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO shop_product_description VALUES (1, 1, 239);


--
-- Name: shop_product_description_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('shop_product_description_id_seq', 1, true);


--
-- Name: shop_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('shop_product_id_seq', 1, true);


--
-- Name: translation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('translation_id_seq', 287, true);


--
-- Data for Name: translation_locale; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO translation_locale VALUES ('cs', '🇨🇿');
INSERT INTO translation_locale VALUES ('en', '🇺🇸');
INSERT INTO translation_locale VALUES ('de', '🇩🇪');
INSERT INTO translation_locale VALUES ('sk', '🇸🇰');


--
-- Data for Name: translation_translate; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO translation_translate VALUES (3, 56, 'cs', 'Administrace');
INSERT INTO translation_translate VALUES (16, 44, 'cs', 'Administrace');
INSERT INTO translation_translate VALUES (30, 45, 'cs', 'Stránky');
INSERT INTO translation_translate VALUES (31, 46, 'cs', 'Přidat stránku');
INSERT INTO translation_translate VALUES (32, 47, 'cs', 'Menu');
INSERT INTO translation_translate VALUES (33, 48, 'cs', 'Přidat menu');
INSERT INTO translation_translate VALUES (34, 49, 'cs', 'Odkazy');
INSERT INTO translation_translate VALUES (35, 50, 'cs', 'Přidat odkaz');
INSERT INTO translation_translate VALUES (36, 51, 'cs', 'Překlady');
INSERT INTO translation_translate VALUES (37, 52, 'cs', 'Přidat překlad');
INSERT INTO translation_translate VALUES (39, 65, 'cs', 'Obchod');
INSERT INTO translation_translate VALUES (40, 66, 'cs', 'Kategorie');
INSERT INTO translation_translate VALUES (41, 67, 'cs', 'Přidat kategorii');
INSERT INTO translation_translate VALUES (42, 68, 'cs', 'Blog');
INSERT INTO translation_translate VALUES (45, 69, 'cs', 'Příspěvky');
INSERT INTO translation_translate VALUES (47, 71, 'cs', 'Kategorie');
INSERT INTO translation_translate VALUES (49, 72, 'cs', 'Přidat příspěvek');
INSERT INTO translation_translate VALUES (51, 73, 'cs', 'Přidat kategorii');
INSERT INTO translation_translate VALUES (191, 208, 'cs', 'Nějaké skvělé novinky');
INSERT INTO translation_translate VALUES (194, 209, 'cs', 'Novinky');
INSERT INTO translation_translate VALUES (196, 211, 'cs', 'Apple Music: Nepřehledný guláš hudebních služeb');
INSERT INTO translation_translate VALUES (195, 210, 'cs', 'Služba Music od Applu ještě nebyla oficiálně spuštěna - obsah');
INSERT INTO translation_translate VALUES (197, 212, 'cs', 'Přichází léto, pro mnohé čas vyrazit do bazénů a výletů do přírody');
INSERT INTO translation_translate VALUES (198, 213, 'cs', 'Výstava E3 2015: co nás čeká letos v Los Angeles?');
INSERT INTO translation_translate VALUES (199, 214, 'cs', '<div class=\"ar\">     	 		 		 		 		<p>Společnost Oculus VR <a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fwww.oculus.com%2fen-us%2f&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2funikly-snimky-mozna-finalni-verze-riftu-s-ovladacem-pro-virtualni-realitu%2fa-178633%2f%3ftextart%3d1\">chystá na 11. června speciální událost</a>, na které bude nejspíše odhalená finální verze podoby první finální virtuální reality Rift (CV1). Tak trochu omylem se ale nedočkavému fanouškovi (<a href=\"/TextRedirect.aspx?qu=http%3a%2f%2fwww.reddit.com%2fr%2foculus%2fcomments%2f3968y0%2fsome_final_cv1_images_probably_buried_in_the_css%2f&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2funikly-snimky-mozna-finalni-verze-riftu-s-ovladacem-pro-virtualni-realitu%2fa-178633%2f%3ftextart%3d1\">Reddit</a>) podařilo v&nbsp;kódu stránek najít soubory, které ukazují dosud neviděnou podobu nejen brýlí, ale i ostatních částí celého balíku pro virtuální realitu.</p>    <ul> <li>     <b>     <a href=\"/zpravy-z-firem/valve-lighthouse-laserove-snimani-i-pro-virtualni-realitu/sc-5-a-178383\"> 	    Valve Lighthouse: laserové snímání i pro virtuální realitu     </a>     </b> </li> </ul>  <p>Jak je možné vidět, obrázky odpovídají již dříve zveřejněným oficiálním fotografiím, takže se lze domnívat, že jde skutečně o finální podobu. Dle obrázku samotných brýlí se používají dvě oddělené části na čočky, ve vzduchu ale stále zůstává otázka, jestli se používá jeden velký nebo dva menší displeje jako u Vive VR.</p>  <h6><span><a href=\"/Getfile.aspx?id_file=284575885\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=284575885&amp;article=178633\"><img class=\"viewport\" alt=\"U7JEvNN.jpg\" border=\"0\" data-file=\"284575885\" data-height=\"500\" data-onclick=\"1\" data-title=\"U7JEvNN.jpg\" data-width=\"750\" height=\"405\" hspace=\"0\" src=\"/GetThumbNail.aspx?id_file=284575885&amp;width=480&amp;height=405&amp;q=100\" title=\"U7JEvNN.jpg\" vspace=\"0\" width=\"480\"></a></span><br> Že by finální verze balení Oculus Rift?</h6>  <p>Součástí brýlí jsou integrovaná odklopná sluchátka, o kterých se mluvilo již dříve a měla by být optimalizovaná právě na perfektní trojrozměrný zvuk, který nedokáže poskytnout drtivá většina běžných sluchátek. Na přední straně je pak vidět pouze jeden optický snímač či vysílač.</p>  <h6><span><a href=\"/Getfile.aspx?id_file=749180708\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=749180708&amp;article=178633\"><img class=\"viewport\" alt=\"cmhcD18.jpg\" border=\"0\" data-file=\"749180708\" data-height=\"500\" data-onclick=\"1\" data-title=\"cmhcD18.jpg\" data-width=\"750\" height=\"312\" hspace=\"0\" src=\"/GetThumbNail.aspx?id_file=749180708&amp;width=400&amp;height=312&amp;q=100\" title=\"cmhcD18.jpg\" vspace=\"0\" width=\"400\"></a></span><br> Detail jednoduchého ovladače k Riftu</h6>  <p>Součástí balení je kromě kabelů také válcovitý snímač/vysílač, který je určený pro sledování polohy Riftu v&nbsp;prostoru. Má poměrně vysoký podstavec, takže je otázka, zda bude nastavitelný a musí být v&nbsp;určité výšce. Poslední komponentou je velmi malý a jednoduchý ovladač, který má čtyři tlačítka (+, -, zpět a 0) a také něco jako kulatou dotykovou plochu pro palec.</p>  <h6><a href=\"/Getfile.aspx?id_file=381336309\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=381336309&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"3AG90yS.jpg\" data-file=\"381336309\" data-height=\"500\" data-onclick=\"1\" data-title=\"3AG90yS.jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=381336309&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"3AG90yS.jpg\"></a><a href=\"/Getfile.aspx?id_file=27585732\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=27585732&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"ks3ug36.jpg\" data-file=\"27585732\" data-height=\"500\" data-onclick=\"1\" data-title=\"ks3ug36.jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=27585732&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"ks3ug36.jpg\"></a><a href=\"/Getfile.aspx?id_file=26672716\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=26672716&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"o9Gni1P.jpg\" data-file=\"26672716\" data-height=\"500\" data-onclick=\"1\" data-title=\"o9Gni1P.jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=26672716&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"o9Gni1P.jpg\"></a><a href=\"/Getfile.aspx?id_file=285507534\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=285507534&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"qaD5WNr.jpg\" data-file=\"285507534\" data-height=\"500\" data-onclick=\"1\" data-title=\"qaD5WNr.jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=285507534&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"qaD5WNr.jpg\"></a><a href=\"/Getfile.aspx?id_file=667441624\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=667441624&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"y2lUWUq (1).jpg\" data-file=\"667441624\" data-height=\"500\" data-onclick=\"1\" data-title=\"y2lUWUq (1).jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=667441624&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"y2lUWUq (1).jpg\"></a><a href=\"/Getfile.aspx?id_file=30399311\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=30399311&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"y2lUWUq (2).jpg\" data-file=\"30399311\" data-height=\"500\" data-onclick=\"1\" data-title=\"y2lUWUq (2).jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=30399311&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"y2lUWUq (2).jpg\"></a><a href=\"/Getfile.aspx?id_file=289513623\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=289513623&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"y2lUWUq (3).jpg\" data-file=\"289513623\" data-height=\"500\" data-onclick=\"1\" data-title=\"y2lUWUq (3).jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=289513623&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"y2lUWUq (3).jpg\"></a><a href=\"/Getfile.aspx?id_file=962658660\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=962658660&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"y2lUWUq (4).jpg\" data-file=\"962658660\" data-height=\"500\" data-onclick=\"1\" data-title=\"y2lUWUq (4).jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=962658660&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"y2lUWUq (4).jpg\"></a><a href=\"/Getfile.aspx?id_file=961428884\" onclick=\"return false;\"></a><a href=\"/getimagegallery.aspx?id_file=961428884&amp;article=178633\"><img class=\"viewport\" align=\"middle\" alt=\"y2lUWUq.jpg\" data-file=\"961428884\" data-height=\"500\" data-onclick=\"1\" data-title=\"y2lUWUq.jpg\" data-width=\"750\" src=\"/GetThumbNail.aspx?id_file=961428884&amp;width=5000&amp;height=120&amp;q=100\" style=\"margin-right:3px; margin-bottom:3px;\" title=\"y2lUWUq.jpg\"></a></h6>  <p>Design vypadá skvěle a snad se tak oficiálního představení a parametrů dočkáme už zítra. Oculus již <a href=\"/TextRedirect.aspx?qu=http%3a%2f%2fwww.zive.cz%2fbleskovky%2foculus-zverejnil-doporuceny-vykon-pocitace-pro-virtualni-realitu-rift%2fsc-4-a-178314%2fdefault.aspx&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2funikly-snimky-mozna-finalni-verze-riftu-s-ovladacem-pro-virtualni-realitu%2fa-178633%2f%3ftextart%3d1\">dříve zveřejnil doporučenou konfiguraci pro počítač</a>, který bude potřeba pro virtuální realitu Rift.</p>    <ul> <li>     <b>     <a href=\"/zpravy-z-firem/kompletni-baleni-oculus-rift-s-pocitacem-bude-stat-kolem-42-000-kc/sc-5-a-178492\"> 	    Kompletní balení Oculus Rift s počítačem bude stát kolem 42 000 Kč     </a>     </b> </li> </ul>    <ul> <li>     <b>     <a href=\"/zpravy-z-firem/konecna-verze-oculus-rift-jde-na-trh-zacatkem-2016/sc-5-a-178190\"> 	    Konečná verze Oculus Rift jde na trh začátkem 2016     </a>     </b> </li> </ul>  		  		 			 			<p class=\"hr\">&nbsp;</p> 			<p class=\"sm\"><b>Rubriky:</b>  			 		<a href=\"/hardware/sc-167/?pgnum=1\" title=\"Hardware\">Hardware</a>, <a href=\"/technologie/sc-249/?pgnum=1\" title=\"Technologie\">Technologie</a> 			 			</p> 			 		  	<div class=\"clear\"></div> </div>');
INSERT INTO translation_translate VALUES (200, 215, 'cs', 'Unikly snímky možná finální verze Riftu s ovladačem pro virtuální realitu');
INSERT INTO translation_translate VALUES (201, 216, 'cs', '<div class=\"ar\" data-twttr-id=\"twttr-sandbox-0\">     	 		 		 		 		<p>Hudební služby postupně reagují na oznámení Apple Music. Rdio v&nbsp;pondělí na svém Twitteru parafrázovalo někdejší reklamu Applu namířenou proti IBM a lakonicky přivítalo jablečnou korporaci slovy: „Welcome Apple, Seriously.“</p>   <iframe id=\"twitter-widget-0\" scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" class=\"twitter-tweet twitter-tweet-rendered\" allowfullscreen=\"\" title=\"Twitter Tweet\" height=\"402\" style=\"border: none; max-width: 100%; min-width: 220px; margin: 7px auto; padding: 0px; display: block; position: static; visibility: visible; width: 500px; float: none;\"></iframe> <script async=\"\" src=\"//platform.twitter.com/widgets.js\" charset=\"utf-8\"></script> <div class=\"clear\"></div>  <p>Nyní se nepřímo přidalo i obří Spotify. Namísto vtípků <a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fnews.spotify.com%2fus%2f2015%2f06%2f10%2f20-million-reasons-to-say-thanks%2f&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fspotify-se-chlubi-ma-20-milionu-predplatitelu%2fa-178632%2f%3ftextart%3d1\">zveřejnilo aktualizovaná čísla</a> o počtech členů. Službu nyní používá více než 75 milionů posluchačů a 20 milionů z&nbsp;nich si platí prémiové předplatné. Na sklonku loňského května přitom měla služba pouze 10 milionů platících uživatelů, číslo se tedy zdvojnásobilo během jediného roku.</p>  <p>Spotify za dobu své existence vyplatilo přes 3 miliardy dolarů na poplatcích interpretům a 300 milionů dolarů jen v&nbsp;prvním čtvrtletí letošního roku.</p>  		  		 			 			<p class=\"hr\">&nbsp;</p> 			<p class=\"sm\"><b>Rubriky:</b>  			 		<a href=\"/byznys/sc-170/?pgnum=1\" title=\"Byznys\">Byznys</a>, <a href=\"/web/sc-119/?pgnum=1\" title=\"Web\">Web</a>, <a href=\"/multimedia/sc-187/?pgnum=1\" title=\"Multimédia\">Multimédia</a> 			 			</p> 			 		  	<div class=\"clear\"></div> </div>');
INSERT INTO translation_translate VALUES (202, 217, 'cs', 'Spotify se chlubí. Má 20 milionů předplatitelů');
INSERT INTO translation_translate VALUES (206, 223, 'cs', 'testaa');
INSERT INTO translation_translate VALUES (207, 224, 'cs', 'test');
INSERT INTO translation_translate VALUES (221, 235, 'cs', 'Produkty');
INSERT INTO translation_translate VALUES (223, 236, 'cs', 'Přidat produkt');
INSERT INTO translation_translate VALUES (227, 238, 'cs', 'Apple iPhone 6');
INSERT INTO translation_translate VALUES (229, 239, 'cs', 'popis');
INSERT INTO translation_translate VALUES (231, 240, 'cs', 'obsah');
INSERT INTO translation_translate VALUES (236, 245, 'cs', 'test');
INSERT INTO translation_translate VALUES (190, 63, 'cs', 'Začínáme');
INSERT INTO translation_translate VALUES (225, 237, 'cs', 'Chytré telefony');
INSERT INTO translation_translate VALUES (237, 246, 'cs', 'Něco o smartphonech');
INSERT INTO translation_translate VALUES (271, 283, 'cs', 'Přidat web');
INSERT INTO translation_translate VALUES (2, 55, 'cs', 'Frontend');
INSERT INTO translation_translate VALUES (14, 43, 'cs', 'Titulní strana');
INSERT INTO translation_translate VALUES (267, 281, 'cs', 'Weby');
INSERT INTO translation_translate VALUES (204, 219, 'cs', 'Windows a Windows Phone přestanou synchronizovat Facebook');
INSERT INTO translation_translate VALUES (203, 218, 'cs', '<div class=\"ar\">     	 		 		 		 		<p>Windows a Windows Phone <a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25C5%2599ipojen%25C3%25AD-k-Facebooku-u%25C5%25BE-nen%25C3%25AD-dostupn%25C3%25A9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3dcs-CZ%26amp%3brs%3dcs-CZ%26amp%3bad%3dCZ&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\">přestanou nativně podporovat</a> synchronizaci s&nbsp;Facebookem. Jedná se především o adresáře kontaktů, které přestanou načítat dodatečné informace o kontaktech, fotografie a další údaje ze sociální sítě. Stejně tak kalendářová služba přestane synchronizovat přihlášené události z&nbsp;Facebooku. Na vině je podle Microsoftu samotný Facebook, který upravil svoje Graph API, ze kterého Microsoft čerpá.</p>  <p>Na stránce podpory jsou nicméně zmíněné jen starší a současné produkty Windows 8, Windows 8.1 a Windows Phone 7 a 8. Chybí jakákoliv zmínka o blížícím se Windows 10. Buď jej Microsoft na stránce podpory nezmínil jednoduše proto, že se jedná o systém ve vývoji, anebo se jej tato nepříjemnost netýká.</p>  <h4>Seznam produktů, které přestanou komunikovat s Facebookem:</h4>  <ul> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_outlook.com&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Kontakty na Outlook.com\">Kontakty na Outlook.com</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_facebook_calendar&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Synchronizace Outlook.com, Windows, Windows Phone a Kalendáře Office 365\">Synchronizace Outlook.com, Windows, Windows Phone a Kalendáře Office 365</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_desktoppeopleapp&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Aplikace Lidé ve Windows 8.1\">Aplikace Lidé ve Windows 8.1</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_desktoppeople8&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Aplikace Lidé ve Windows 8\">Aplikace Lidé ve Windows 8</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_calendarapp8and8.1&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Aplikace Kalendář ve Windows 8 a Windows 8.1\">Aplikace Kalendář ve Windows 8 a Windows 8.1</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_photo&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Fotogalerie a Movie Maker ve Windows 8\">Fotogalerie a Movie Maker ve Windows 8</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_win8photo-app&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Aplikace Fotky systému Windows 8\">Aplikace Fotky systému Windows 8</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_peopleHub&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Aplikace Lidé ve Windows Phone 7 a 8\">Aplikace Lidé ve Windows Phone 7 a 8</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_onephone&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"OneDrive ve Windows Phone 7 a 8\">OneDrive ve Windows Phone 7 a 8</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_phone7-8photos&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Fotky ve Windows Phone 7 a 8\">Fotky ve Windows Phone 7 a 8</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_essentials&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Kalendář a kontakty ve Windows Live Essentials\">Kalendář a kontakty ve Windows Live Essentials</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_onedriveonline&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"OneDrive Online\">OneDrive Online</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_Social&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Outlook Social Connector v Outlooku 2013\">Outlook Social Connector v Outlooku 2013</a></li> 	<li><a href=\"/TextRedirect.aspx?qu=https%3a%2f%2fsupport.office.com%2fcs-cz%2farticle%2fP%25c5%2599ipojen%25c3%25ad-k-Facebooku-u%25c5%25be-nen%25c3%25ad-dostupn%25c3%25a9-f31c8107-7b5a-4e3d-8a22-e506dacb6db6%3fui%3den-US%26amp%3brs%3dcs-CZ%26amp%3bad%3dUS%26amp%3bfromAR%3d1%23BKMK_OWA&amp;backurl=%2fdefault.aspx%3f404%3bhttp%3a%2f%2fm.zive.cz%3a80%2fwindows-a-windows-phone-prestanou-synchronizovat-facebook%2fa-178625%2f%3ftextart%3d1\" title=\"Outlook Web App v Office 365\">Outlook Web App v Office 365</a></li> </ul>  <p>Ačkoliv z&nbsp;textu na stránkách Microsoftu vyplývá, že je už ukončení komunikace s&nbsp;Facebookem hotovou věcí, i několik dnů poté nám na zkušebním počítači s&nbsp;Windows 8.1 synchronizace bez problému funguje.</p>  		  		 			 			<p class=\"hr\">&nbsp;</p> 			<p class=\"sm\"><b>Rubriky:</b>  			 		<a href=\"/software/sc-169/?pgnum=1\" title=\"Software\">Software</a>, <a href=\"/facebook/sc-242/?pgnum=1\" title=\"Facebook\">Facebook</a>, <a href=\"/socialni-site/sc-223/?pgnum=1\" title=\"Sociální sítě\">Sociální sítě</a> 			 			</p> 			 		  	<div class=\"clear\"></div> </div>');
INSERT INTO translation_translate VALUES (17, 44, 'en', 'Administration');
INSERT INTO translation_translate VALUES (19, 65, 'en', 'Shop');
INSERT INTO translation_translate VALUES (20, 66, 'en', 'Category');
INSERT INTO translation_translate VALUES (21, 67, 'en', 'Add category');
INSERT INTO translation_translate VALUES (22, 45, 'en', 'Pages');
INSERT INTO translation_translate VALUES (23, 46, 'en', 'Add page');
INSERT INTO translation_translate VALUES (24, 47, 'en', 'Menu');
INSERT INTO translation_translate VALUES (25, 48, 'en', 'Add menu');
INSERT INTO translation_translate VALUES (26, 49, 'en', 'Link');
INSERT INTO translation_translate VALUES (27, 50, 'en', 'Add link');
INSERT INTO translation_translate VALUES (28, 51, 'en', 'Translations');
INSERT INTO translation_translate VALUES (29, 52, 'en', 'Add translation');
INSERT INTO translation_translate VALUES (38, 56, 'en', 'Administration');
INSERT INTO translation_translate VALUES (43, 68, 'en', 'Blog');
INSERT INTO translation_translate VALUES (44, 69, 'en', 'Posts');
INSERT INTO translation_translate VALUES (48, 71, 'en', 'Categories');
INSERT INTO translation_translate VALUES (50, 72, 'en', 'Add post');
INSERT INTO translation_translate VALUES (52, 73, 'en', 'Add category');
INSERT INTO translation_translate VALUES (192, 208, 'en', 'Some great news');
INSERT INTO translation_translate VALUES (193, 209, 'en', 'News');
INSERT INTO translation_translate VALUES (222, 235, 'en', 'Products');
INSERT INTO translation_translate VALUES (224, 236, 'en', 'Add product');
INSERT INTO translation_translate VALUES (228, 238, 'en', 'Apple iPhone 6');
INSERT INTO translation_translate VALUES (230, 239, 'en', 'description');
INSERT INTO translation_translate VALUES (232, 240, 'en', 'content');
INSERT INTO translation_translate VALUES (12, 62, 'en', 'download');
INSERT INTO translation_translate VALUES (13, 63, 'en', 'Getting started');
INSERT INTO translation_translate VALUES (226, 237, 'en', 'Smartphones');
INSERT INTO translation_translate VALUES (238, 246, 'en', 'Something about smartphones');
INSERT INTO translation_translate VALUES (272, 283, 'en', 'Add web');
INSERT INTO translation_translate VALUES (10, 55, 'en', 'Frontend');
INSERT INTO translation_translate VALUES (15, 43, 'en', 'Homepage');
INSERT INTO translation_translate VALUES (268, 281, 'en', 'Webs');


--
-- Name: translation_translate_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('translation_translate_id_seq', 276, true);


--
-- Data for Name: web; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO web VALUES (1, 1, 55, 'front');
INSERT INTO web VALUES (2, 2, 56, 'admin');


--
-- Data for Name: web_domain; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO web_domain VALUES (1, 1, true, 'ytnuk.com');
INSERT INTO web_domain VALUES (2, 2, true, 'admin.ytnuk.com');
INSERT INTO web_domain VALUES (3, 1, true, 'ytnuk.cz');
INSERT INTO web_domain VALUES (4, 1, true, 'ytnuk.sk');
INSERT INTO web_domain VALUES (5, 1, true, 'ytnuk.de');


--
-- Name: web_domain_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('web_domain_id_seq', 5, true);


--
-- Data for Name: web_domain_locale; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO web_domain_locale VALUES (1, 3, 'cs', true);
INSERT INTO web_domain_locale VALUES (6, 2, 'cs', NULL);
INSERT INTO web_domain_locale VALUES (4, 4, 'sk', true);
INSERT INTO web_domain_locale VALUES (7, 2, 'sk', NULL);
INSERT INTO web_domain_locale VALUES (5, 5, 'de', true);
INSERT INTO web_domain_locale VALUES (8, 2, 'de', NULL);
INSERT INTO web_domain_locale VALUES (2, 1, 'en', true);
INSERT INTO web_domain_locale VALUES (3, 2, 'en', true);


--
-- Name: web_domain_locale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('web_domain_locale_id_seq', 8, true);


--
-- Name: web_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('web_id_seq', 1, false);


--
-- PostgreSQL database dump complete
--

