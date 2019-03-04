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

//create the random speed data
const start_time = new Date(+(new Date()) - Math.floor(Math.random()*10000000000));

const cookie = random_id();
const timestamp = start_time.toISOString().slice(0, 19).replace('T', ' ');
const delay = Math.round(Math.random() * 2000);
const load_time = Math.floor(Math.random() * 256) + (delay * 1); 

//error data packet
const speed_data = {
    "cookie": cookie,
    "timestamp": timestamp,
    "load_time": load_time,
    "delay": delay
}

//console.log(speed_data);

//*//
//write it out to a file
fs.writeFile("./speed.json",JSON.stringify(speed_data), (err) => {
    if(err){
        console.error(err);
        return;//exit out of things
    }
    //else do nothing because everything went well
});
//*/