import spotipy
import logging
import argparse
from spotipy.oauth2 import SpotifyClientCredentials

parser = argparse.ArgumentParser()
parser.add_argument("-i", "--input", type = str, help = "The artist name given")
args = parser.parse_args()
name = args.input

logger = logging.getLogger('examples.artist_recommendations')
logging.basicConfig(level='INFO')
spotify = spotipy.Spotify(auth_manager=SpotifyClientCredentials())

recommended = [""]
songs = ""

results = spotify.search(q='artist:' + name, type='artist')
items = results['artists']['items']
if len(items) > 0:
    artist = items[0]
else:
    None

results = spotify.recommendations(seed_artists=[artist['id']])
for track in results['tracks']:
    recommended.append(track['name'] + " - " + track['artists'][0]['name'] + ",,,")

for x in recommended:
    if '&' in x:
        continue
    else:
        songs = songs + x

print(songs)
