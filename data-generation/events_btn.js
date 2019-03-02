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

//these are the different button names that could appear in the website 
const names = [
"logo",
"back",
"order",
"menu",
"learn more",
"browser back button",
"brownie",
"oatmeal raisin cookie",
"ice cream muffin",
"banna bread"
];

//create the random data
const timestamp = new Date(+(new Date()) - Math.floor(Math.random()*10000000000)).toISOString().slice(0, 19).replace('T', ' ');
const name = names[Math.floor(Math.random()*names.length)];
const cookie = random_id();

//button data packet
const btn_data = {
    "cookie": cookie,
    "timestamp": timestamp,
    "name": name
}
//console.log(btn_data);

//*//write it out to a file
fs.writeFile("./btn.json",JSON.stringify(btn_data), (err) => {
    if(err){
        console.error(err);
        return;//exit out of things
    }
    //else do nothing because everything went well
});
//*/