# influenceo
influenceo est un réseau social qui met en relation des influenceur aux marques afin que ses derniers trouvent des missions ......

1- Install Docker et composer s'il n'est pas encore installer

2- Cloner le projet dans ton repo avec la commande  : git clone https://github.com/chanelV/influenceo.git

3- Pointer dans le repectoire, si taper les commandes 
   * docker-compose up // Permet de declancher le serveur 
   *Control c // pour stopper les contenairs 
   *docker ps // pour savoir si les composer sont en route 
   * docker-compose -d // permet de declencher les environnements en taches de fonds
   * docker-compose down  // permet de stopper les contenairs apres avoir utiliser la commande docker-compose -d au lieu de Control c d


4- à chaque fois qu'on ajoute un controller, il faut taper ces deux commandes:
    - composer install
    - composer dump-autoload

