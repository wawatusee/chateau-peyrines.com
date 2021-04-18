<?php
/*
 * Config file
 */
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PWD', '');
define('DB_NAME', 'catalogue_ventes_vins');
define('DB_PORT', 3306);
define('DB_CHARSET', 'utf8');
define('PAGE_ARRAY',array('accueil','vente-tarifs','vins-vignes','Presentation','tournee','admin'));
define('HORS_MENU',array('admin'));
/*Le tableau ci-dessus aurait du contenir ces mots mais c'est trop long pour un menu : 'accueil','ventes-prix','vignes-vins-elaboration','Presentation-histoire-famille','tournee','administration'*/
?>