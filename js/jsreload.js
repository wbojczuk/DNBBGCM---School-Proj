// TO TRIGGER PAGE RELOAD BASED ON ELEMENT APPEARANCE
const reloadObj = {checkForReload: ()=>{
    if(document.getElementById("jsReload")){
        window.location.href = document.getElementById("jsReload").dataset.filename;
    }
}};reloadObj.checkForReload();