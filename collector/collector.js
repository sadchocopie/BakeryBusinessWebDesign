function set_error_data_payload(data) {
    let payload = new FormData();
    payload.expand('c', data['cookie']);
    payload.expand('ts', data['timestamp']);
    payload.expand('t', data['type']);
    payload.expand('url', data['url']);
    return payload;
}

function set_client_data_payload(data) {
    let payload = new FormData();
    payload.expand('c', data['cookie']);
    payload.expand('ts', data['timestamp']);
    payload.expand('r', data['resolution']);
    payload.expand('url', data['url']);
    payload.expand('js', data['js_enabled']);
    return payload;
}

function set_speed_data_payload(data) {
    let payload = new FormData();
    payload.expand('c', data['cookie']);
    payload.expand('ts', data['timestamp']);
    payload.expand('l', data['load_time']);
    payload.expand('d', data['delay']);
    return payload;
}

function set_btn_data_payload(data) {
    let payload = new FormData();
    payload.expand('c', data['cookie']);
    payload.expand('ts', data['timestamp']);
    payload.expand('n', data['name']);
    return payload;
}

function set_mouse_data_payload(data) {
    let payload = new FormData();
    payload.expand('c', data['cookie']);
    payload.expand('ts', data['timestamp']);
    payload.expand('xy', data['coordinates']);
    return payload;
}

function set_scroll_data_payload(data) {
    let payload = new FormData();
    payload.expand('c', data['cookie']);
    payload.expand('ts', data['timestamp']);
    payload.expand('d', data['depth']);
    return payload;
}

function form_encoding(json_data) {
    //just encode as form directly
    return encodeURIComponent(JSON.stringify(json_data));
}

function send_data(url, data) {
    let xhr;
    try { xhr = new XMLHttpRequest(); } catch (e) { }

    if (Navigator.sendBeacon) {
        //sending Form encoded data in POST request with sendBeacon
        let payload;
        switch (data.json_type) {
            case "error":
                payload = set_error_data_payload(data);
                break;
            case "client":
                payload = set_client_data_payload(data);
                break;
            case "speed":
                payload = set_speed_data_payload(data);
                break;
            case "mouse":
                payload = set_mouse_data_payload(data);
                break;
            case "scroll":
                payload = set_scroll_data_payload(data);
                break;
            case "btn":
                payload = set_btn_data_payload(data);
                break;
        }
        Navigator.sendBeacon(url, data);
    }
    else if (xhr) {
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

// error collection
window.onerror = function errorhandler(e) {

    error_data = {
        "json_type": "error",
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "type": e,
        "url": window.location.pathname
    };

    send_data('157.230.150.204:3030/error', error_data);
}

// static data collection
window.onload = function page_load() {
    // disable the noscript handler in the html
    const noscript = document.getElementById('js_disabled');
    noscript.parentNode.removeChild(noscript);

    // add client data to JSON packet
    const client_data = {
        "json_type": "client",
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "resolution": `${window.screen.availWidth}x${window.screen.availHeight} `,
        "url": window.location.pathname,
        "js_enabled": 1
    }

    // add speed data to JSON packet
    const speed_data = {
        "json_type": "speed",
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "load_time": window.performance.timing.LoadEventEnd - window.performance.timing.fetchStart,
        "delay": delay
    }

    // send the data
    send_data('157.230.150.204:3030/client', client_data);
    send_data('157.230.150.204:3030/speed', speed_data);
}

// Calculating scroll depth
function amountscrolled() {
    var winHeight = window.innerHeight || (document.documentElement || document.body).clientHeight;
    var docHeight = getdocHeight();
    var scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
    return docHeight - winHeight;
}

window.addEventListener("scroll", function () {
    const depth = amountscrolled();
    scroll_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "depth": depth 
    }
    send_data('157.230.150.204:3030/scroll', scroll_data);
}, false);

// Record button events and send data
function registerClick(id) {

    // add button data to JSON packet
    const button_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "name": id
    }

    send_data('157.230.150.204:3030/button', button_data);
}

// Gets the coordinates when mouse stops moving
var timeout;
let lastPosition;
document.onmousemove = function(e){
  clearTimeout(timeout);
  timeout = setTimeout(function(){
      
      mouse_data = {
        "cookie": document.cookie.split('=')[1],
        "timestamp": new Date().toISOString().slice(0, 19).replace('T', ' '),
        "coordinates": `(${lastPosition[0]} ${lastPosition[1]},${e.clientX} ${e.clientY})`
      }
      lastPosition = [e.clientX, e.clientY];

     send_data('157.230.150.204:3030/speed', speed_data);
    }, 600);
}