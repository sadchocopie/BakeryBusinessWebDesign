#!/bin/bash
origin="localhost:3000/"
packages=('errors.js' 'events_btn.js' 'events_mouse.js' 'events_scroll.js' 'speeds.js' 'clients.js')
files=('./error.json' 'btn.json' 'mouse.json' 'scroll.json' 'speed.json' 'clients.json')
endpoints=('error' 'btn' 'mouse' 'scroll' 'speed' 'client')

for i in {1..2}
do
    index=`shuf -i 0-5 -n 1`
    url=$origin${endpoints[$index]}
    node ${packages[$index]}
    curl --silent --header "Content-Type: application/json" --request POST -T ${files[$index]} $url
    sleep .5
done