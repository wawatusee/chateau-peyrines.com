Conception base de données des ***TARIFS***


Et si nous considérions que le rouge n'est pas une couleur, que 2020, n'est pas un temps, etc.

Que ces mots décrivent des propriétés uniques que nous considérerons sans affect.

A ce moment là, pourraient apparaître ces quelques simples tables :

1. ***année*** : de 1960 à 2020.
2. ***appellation*** : Blanc Sec A.O.C Entre-Deux-Mers Haut Benauge, Blanc Moelleux A.O.C Bordeaux Haut Benauge, Rosé A.O.C Bordeaux, Méthode Traditionnelle-Les Bulles de Peyrines, Rouge A.O.C Bordeaux Supérieur, Rouge A.O.C Bordeaux.
3. ***contenant*** : bouteille 75cl, 36 bouteilles et+, 60 bouteilles et+, 120 bouteilles et+, cubit 22 litres par 1 ou 2 colis,   cubit 22 litres par 3 colis et +,  fontaine 20 litres par 1 ou 2 colis,  fontaine 20 litres par 3 colis et +, magnum, magnum dans un coffret bois.


l'assemblage de celles-ci nous donneraient alors ces tables composites : 

1. ***vins*** : année+appellation 
2. ***produits*** : vins+contenants
3. ***tarifs*** : produit+prix(à saisir pour chaque produit)

à ce stade nous aurions peut-être la possibilité d'afficher le prix de chaque produit.

Accessoirement nous pourrion alors nous préoccuper d'attribuer à chacun de ces vins :
. Une ***couleur*** : blanc, rosé ou rouge

. Une ***médaille*** quand il le mérite

Et à chacun de ces produits

. ***disponibilité***