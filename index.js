function copy() {
    let copyText = document.querySelector("#output");
    copyText.select();
    document.execCommand("copy");
}

function fetchApi() {
    let tweet = document.querySelector("#input").textContent;
    let id = tweet.match(/^https?:\/\/twitter\.com\/(?:#!\/)?(\w+)\/status(es)?\/(\d+)/)[3];
    console.log(id);
    fetch(`https://api.twitter.com/2/tweets/:${id}`, {
        headers : {
            Authorization : "Bearer Ym1fUjA0akptVXFFQUl4OU0yVFUtNFB4dTd6UVFzUnVubzI5X2dmUmVMbzFnOjE2NTYyNDIzNTcxMjk6MTowOmF0OjE",
        }, mode : "no-cors",
    })
    .then(response => response.json())
        .then(data => console.log(data))
}


document.querySelector("#copy").addEventListener("click", copy);

var fileInput = document.getElementById('customFile');
var fileDisplayArea = document.getElementById('input');

fileInput.addEventListener('change', function(e) {
    var file = fileInput.files[0];
    var textType = /text.*/;

    if (file.type.match(textType)) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var content = reader.result;
            document.getElementById('input').value = content;
        }

        reader.readAsText(file);
    } else {
        fileDisplayArea.innerText = "File not supported!"
    }
});