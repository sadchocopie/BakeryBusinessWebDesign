const url = "http://localhost:3000";//fake rest endpoint locally
//const url = "http://httpbin.org/post";//good for testing against real web server

function form_encoding(json_data) {
    //just encode as form directly
    return encodeURIComponent(JSON.stringify(json_data));
}

function send_data(url, data) {
    data = JSON.stringify(data);
    let xhr;
    try { xhr = new XMLHttpRequest(); } catch (e) { }
    if (xhr) {
        //send JSON encoded data in POST with AJAX
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {/*do nothing*/ };
        xhr.send(data);
    }
    else {
        //last resort: Send x-www-urlformencoded in GET request with 1-way comms
        const img = new Image();
        url_encoded_data = form_encoding(data);
        img.src = url + '?' + url_encoded_data;
    }
}

function send_error(e){
    error_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "type": e,
        "url": window.location.pathname
    };
    console.error('sending new error: '+JSON.stringify(error_data));
    send_data(url + '/error', error_data);
}

// error collection
window.onerror = function errorhandler(e) {
    send_error(e);
}

// static data collection
window.onload = function page_load() {
    const load_time = new Date() - window.performance.timing.fetchStart;

    // disable the noscript handler in the html
    const noscript = document.getElementById('js_disabled');
    noscript.parentNode.removeChild(noscript);

    // add client data to JSON packet
    const client_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "resolution": `${window.innerWidth}x${window.innerHeight} `,
        "url": window.location.pathname,
        "js_enabled": 1
    }

    // add speed data to JSON packet
    const speed_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "load_time": load_time,
        "delay": delay
    }

    // send the data
    send_data(url + '/client', client_data);
    send_data(url + '/speed', speed_data);
}

// Gets the coordinates when mouse stops moving
let timeout;
document.onscroll = function on_scroll (e) {
    clearTimeout(timeout);
    timeout = setTimeout(function scroll_handler () {
        scroll_data = {
            "cookie": document.cookie.split('=')[1],
            "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
            "depth": window.scrollY
        }
        send_data(url + '/scroll', scroll_data);
    },50);
}

// Record button events and send data
function registerClick(id) {
    // add button data to JSON packet
    const button_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "name": id
    }
    send_data(url + '/btn', button_data);
}

// Gets the coordinates when mouse stops moving
let lastPosition = [0, 0];
document.onmousemove = function on_mouse_move (e) {
    clearTimeout(timeout);
    timeout = setTimeout(function mouse_handler () {
        mouse_data = {
            "cookie": document.cookie.split('=')[1],
            "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
            "coordinates": `(${lastPosition[0]} ${lastPosition[1]},${e.clientX} ${e.clientY})`
        }
        lastPosition = [e.clientX, e.clientY];

        send_data(url + '/mouse', mouse_data);
    },50);
}