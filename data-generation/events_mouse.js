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

function random_number(limit)
{
    return Math.floor(Math.random()*limit);
}

//create the random data
const cookie = random_id();
const timestamp = new Date(+(new Date()) - Math.floor(Math.random()*10000000000)).toISOString().slice(0, 19).replace('T', ' ');
const coordinates = `(${random_number(1920)} ${random_number(1080)},${random_number(1920)} ${random_number(1080)})`;//(1 1, 3 3)

//button data packet
const mouse_data = {
    "cookie": cookie,
    "timestamp": timestamp,
    "coordinates": coordinates 
}
//console.log(mouse_data);

//*//write it out to a file
fs.writeFile("./mouse.json",JSON.stringify(mouse_data), (err) => {
    if(err){
        console.error(err);
        return;//exit out of things
    }
    //else do nothing because everything went well
});
//*/