# YOUTUBEURRE



### TO DO
- A l'ajout de playlist / chaine, récupérer les infos de la chaine + enregistrer dans un fichier tvshow.nfo


### DONE
- 21/12/2024 : 
  - Passage en pico.css ✅
- 22/12/2024
  - Ajout des vidéos à l'ajout d'une mediaList ✅
  - TO DO : 
    - Ajouter l'upload_date aux médias (marche pas directement avec la première commande yt-dlp) ✅
    - Tri des médias par upload_date sur la page de la medialist ✅
    - Gérer la suppression de la mediaList avec les médias ✅
- 23/12/2024
  - DONE
    - Ajouter l'upload_date aux médias (marche pas directement avec la première commande yt-dlp)
    - Tri des médias par upload_date sur la page de la medialist
    - Gérer la suppression de la mediaList avec les médias
    - Gestion des erreurs de yt-dlp (deleted, restricted, unavailable) Quel cirque !
  - TO DO :
    - Problème de certaines chaines à avoir une erreur nsig... titre de la playlist ne se récupère pas. ✅
      - Je récupère le titre de la playlist grâce à la première vidéo.. Or si celle ci renvoie une erreur,
      ça ne marche pas ! Donc trouver une autre idée ou passer à la vidéo suivante tant que ça renvoie des erreurs
    - Gérer les cronjob => que ça permette de paramétrer des messages à date/heure précise pour lancer un scan
    - Gérer le scan standalone (jusque là fait que lorsqu'on ajoute une medialist)
    - Gérer le téléchargement
- 24/12/2024
  - DONE
    - Erreur nsig : changé le renvoi de ProcessExecutor->execute qui ne renvoyait que l'erreur en cas d'erreur
    - Scan pour l'ajout des vidéos OK !
  - TO DO
    - Scan pour la suppression de vidéo ?
- 27/12/2024
  - Scan de vidéo : si vidéo supplémentaire, ne pas tout rescanner, juste les x dernières
  - Scan de vidéo : si vidéo en moins, tout rescanner