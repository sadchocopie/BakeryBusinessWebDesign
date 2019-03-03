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

const resolutions = [
"360×640",
"1366×768",
"1920×1080",
"375×667",
"1440×900",
"1280×800"
]

const urls = ["/","/menu.html"];

let resolution = resolutions[Math.floor(Math.random()*resolutions.length)];
const url = urls[Math.floor(Math.random()*urls.length)];
const enabled = Math.floor(Math.random()*2);
if(!enabled)
{
    resolution = "";
}

//create the random error data
const timestamp = new Date(+(new Date()) - Math.floor(Math.random()*10000000000)).toISOString().slice(0, 19).replace('T', ' ');
const cookie = random_id();

//client data packet
const client_data = {
    "cookie": cookie,
    "timestamp": timestamp,
    "resolution": resolution,
    "url": url,
    "js_enabled": enabled
}
//console.log(client_data);

//*//
//write it out to a file
fs.writeFile("./clients.json",JSON.stringify(client_data), (err) => {
    if(err){
        console.error(err);
        return;//exit out of things
    }
    //else do nothing because everything went well
});
//*/