// JavaScript Document

function readvideodata(){

    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", "readfiles/info/ffprobe.txt", false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                var majorbrand = allText.substring(99,107);
				var minor_version = allText.substring(126,130);
				var compatible_brands = allText.substring(155,174);
				var encoder = allText.substring(194,210);
				var duration = allText.substring(222,233);
				var bitrate = allText.substring(260,269);
				var format = allText.substring(300,312);
				
				document.getElementById("majorbrand").innerHTML = majorbrand;
				document.getElementById("minorversion").innerHTML = minor_version;
				document.getElementById("compatiblebrands").innerHTML = compatible_brands;
				document.getElementById("encoder").innerHTML = encoder;
				document.getElementById("duration").innerHTML = duration;
				document.getElementById("bitrate").innerHTML = bitrate;
				document.getElementById("format").innerHTML = format;
            }
        }
    }
    rawFile.send(null);

}