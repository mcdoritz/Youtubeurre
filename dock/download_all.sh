#!/bin/bash

echo ""
echo ""
echo "[$(date '+%Y-%m-%d %H:%M:%S')] Exécution de download_all.sh"
echo ""
echo ""

# Lancer download_playlists.sh et attendre sa fin
bash download_playlists.sh
if [ $? -ne 0 ]; then
    echo "ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR "
    echo "------------------------------------------------------------------------------------------------"
    echo "download_playlists.sh a échoué. Arrêt du script."
    echo "------------------------------------------------------------------------------------------------"
    echo "ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR "
    exit 1
fi

# Lancer download_channels.sh une fois le précédent terminé
bash download_channels.sh
if [ $? -ne 0 ]; then
    echo "ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR "
    echo "------------------------------------------------------------------------------------------------"
    echo "download_channels.sh a échoué. Arrêt du script."
    echo "------------------------------------------------------------------------------------------------"
    echo "ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR ERROR "
    exit 1
fi

echo ""
echo ""
echo "[$(date '+%Y-%m-%d %H:%M:%S')] Les deux scripts ont été lancés."
echo ""
echo ""