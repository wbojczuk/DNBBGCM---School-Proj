// A Temporary patch to allow photos from an insecure site.
if(/https/gi.test(window.location.href)){
    window.location.href = (window.location.href).replace("https", "http");
}
