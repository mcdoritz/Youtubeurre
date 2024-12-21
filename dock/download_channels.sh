#!/bin/bash

> /tmp/yt-dlp-output.log  # Réinitialiser le fichier temporaire
# Ajouter le chemin explicite
export PATH="/usr/local/bin:$PATH"

# Variables
ARCHIVE_FILE="/archive/archive_channels.txt"
OUTPUT_DIR="/data/%(uploader)s/%(title)s.%(ext)s"
URLS_FILE="/config/urls_channels.txt"

echo ""
echo ""
echo "[$(date '+%Y-%m-%d %H:%M:%S')] Scan des chaînes..."
echo ""
echo ""

# Commande yt-dlp
if ! yt-dlp -f "bestvideo+bestaudio/best" \
  --write-info-json \
  --write-description \
  --write-thumbnail \
  --write-subs --sub-langs "en,fr" \
  --write-annotations \
  --add-metadata \
  --merge-output-format mkv \
  --download-archive "$ARCHIVE_FILE" -i -o "$OUTPUT_DIR" -a "$URLS_FILE" 2>&1 | tee /tmp/yt-dlp-output.log; then
    echo ""
    echo ""
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] Échec du téléchargement !" >> /logs/error.log
    echo ""
    echo ""
else
    echo ""
    echo ""
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] Téléchargement complété avec succès !" >> /logs/success.log
    echo ""
    echo ""
fi

# Vérifier si des vidéos étaient déjà dans l'archive
if grep -q "already in archive" /tmp/yt-dlp-output.log; then
    echo ""
    echo ""
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] Vidéo déjà téléchargée." >> /logs/success.log
    echo ""
    echo ""
fi

echo ""
echo ""
echo "[$(date '+%Y-%m-%d %H:%M:%S')] Scan terminé avec succès." >> /logs/yt-dlp.log
echo ""
echo ""
