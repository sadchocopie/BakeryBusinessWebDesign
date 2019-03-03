//to write to a file we need the fs module
const fs = require('fs');

/*
 * This function will generate a random 26 character string for the PHP session ID
 */
function random_id() {
    var result = '';
    chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    for (var i = 26; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
    return result;
}

//these are the different types and urls that could appear in the error log
const types = ["Error handling response: Error: Failed to construct 'WebSocket': The URL 'ws/ws' is invalid.","Uncaught ReferenceError: learnMoreFunction is not defined","Missing Resource: cat.png could not be found"];
const urls = ["/","/menu.html"];

//create the random error data
const type = types[Math.floor(Math.random()*types.length)];
const timestamp = new Date(+(new Date()) - Math.floor(Math.random()*10000000000)).toISOString().slice(0, 19).replace('T', ' ');
const url = urls[Math.floor(Math.random()*urls.length)];
const cookie = random_id();

//error data packet
const error_data = {
    "cookie": cookie,
    "timestamp": timestamp,
    "type": type,
    "url": url
}
//console.log(error_data);

//write it out to a file
fs.writeFile("./error.json",JSON.stringify(error_data), (err) => {
    if(err){
        console.error(err);
        return;//exit out of things
    }
    //else do nothing because everything went well
});