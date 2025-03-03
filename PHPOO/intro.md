La POO en PHP facilite la réutilisation du code grâce à l'héritage et au polymorphisme. Les classes peuvent utiliser les propriétés et les méthodes d'autres classes. Cela vous permet d'utiliser un ancien code d'une nouvelle manière avec peu de changements.

L'orienté object est un concept de programmation qui permet de regrouper des données et des méthodes qui agissent sur ces données en une seule entité appelée objet.
On ne peut rien faire de plus visuellement qu'avec le procédural. C'est une méthodologie, une organisation du travail.

M : modèle (base de données)
V : view rendu visuel (HTML, CSS, Template)
C : contrôleur, les controleur pilotes

Avantages :

- Modulariser le code afin d'avoir un code évolutif
- Encourage le travail collaboratif
- Masquer la complexité du code grace aux principes d'encapsulation
- Possibilité de documenter le code
- Réutilisation du code, ne pas repartir de zéro, effectuer un code pouvant être repris sur d'autres, code générique
- Simplifier la maintenance et la mise à jour du code
- Assouplir le code, le rendre plus flexible, factoriser le code, meilleure encapsulation
- Plus d'option dans le langage (heritage, surcharge, namespace, autoload, finalisation, interface, trait etc... )
- Cela vous permettra de passer plus facilement à d'autres langages de programmation (C++, Java, C#, node.js, Python, Ruby, etc...)

Inconvénients :

- Techniquement, on ne peut rien faire de plus avec l'orienté objet qu'avec le procédural
- En général, l'approche orientée objet est moins intuitive que l'approche procédurale

Conclusions :

Pour des petits projets, nous n'aurons pas besoin d'orienté objet, mais pour des projets plus important avec des équipes de développement.

$connect->prepare('INSERT')

$em->persist($user); // prepare()
$em->flush(); // execute()
