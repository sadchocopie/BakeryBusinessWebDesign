#!/bin/bash
for i in {1..10}
do
    node errors.js
    curl --header "Content-Type: application/json" --request POST -T ./error.json localhost:3000/errors
done