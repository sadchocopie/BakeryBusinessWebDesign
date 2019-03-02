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

function pos_or_neg(){
    const result = Math.floor(Math.random()*2);
    if( result != 0 )
    {
        return 1;
    }
    return -1;
}

//create the random data
const cookie = random_id();
const timestamp = new Date(+(new Date()) - Math.floor(Math.random()*10000000000)).toISOString().slice(0, 19).replace('T', ' ');
const depth = Math.floor(Math.random()*1674) * pos_or_neg();


//button data packet
const scroll_data = {
    "cookie": cookie,
    "timestamp": timestamp,
    "depth": depth
}
//console.log(scroll_data);

//*//write it out to a file
fs.writeFile("./scroll.json",JSON.stringify(scroll_data), (err) => {
    if(err){
        console.error(err);
        return;//exit out of things
    }
    //else do nothing because everything went well
});
//*/