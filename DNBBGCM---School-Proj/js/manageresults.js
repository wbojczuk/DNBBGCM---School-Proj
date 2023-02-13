/*
    Program: manageresults.js
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
*/
const manageResultsObj = {
    init: ()=>{
        
// Check if there are unsaved changes before page closes/exits
window.onbeforeunload = checkSaved;
let unSavedChanges = false;
document.querySelectorAll("input[type='text'], textarea").forEach((elem)=>{
    elem.addEventListener("input", ()=>{
        unSavedChanges = true;
    });
});
function checkSaved(){
    if(unSavedChanges){
        return "There are unsaved changes on this page, are you sure you want to exit?";
    }
}

if(document.getElementById("addFolderButton")){

    // ------------------ IF USER IS VIEWING YEARS ----------------------
    // Add folder button
document.getElementById("addFolderButton").addEventListener("click", addFolder);

// YEAR/FOLDER EDIT BUTTON LISTENERS
const allEditButtons = document.querySelectorAll(".edit-folder-bar");
allEditButtons.forEach((elem)=>{
    elem.querySelector(".edit").addEventListener("click", editFolderName);
    elem.querySelector(".delete").addEventListener("click", deleteFolder);

});
const allTopEditButtons = document.querySelectorAll(".edit-folder-bar-top");
allTopEditButtons.forEach((elem)=>{
    elem.addEventListener("click", openFolder);
});
}else{
   // ------------------ IF USER IS VIEWING RESULTS ----------------------

//    Results imported from PHP
    const currentResults = [...resultData];
    
    // "Add Result" Button Listeners
    const resultInputContainer = document.getElementById("nameInput").parentElement;
    const addResultButton = document.getElementById("addResultButton");
    let inputOpen = false;
    addResultButton.addEventListener("click", ()=>{
        if(!inputOpen){
            resultInputContainer.style.display = "flex";
            document.getElementById("addResultFinish").style.display = "inline-block";
        }else{
            resultInputContainer.style.display = "none";
            document.getElementById("addResultFinish").style.display = "none";
        }
        inputOpen = !inputOpen;
    });
    document.getElementById("addResultFinish").addEventListener("click", addResult);

    // Save Button Listeners
    const saveButton = document.getElementById("saveChangesButton");
    saveButton.addEventListener("click", saveChanges);

    // Events on each of the exisiting results
    const allResults = document.querySelectorAll(".result-wrapperr");
    allResults.forEach((result)=>{
        // Name Input
        result.querySelector(".name-input").addEventListener("input", (evt)=>{
            const currentResult = (currentResults[result.dataset.index].split("~"));

            currentResults[result.dataset.index] = `${((evt.target.value).replace(/~/gi, "-")).replace(/\`/gi, "'")}~${currentResult[1]}`;
        });
        // URL Input
        result.querySelector(".url-input").addEventListener("input", (evt)=>{
            const currentResult = (currentResults[result.dataset.index].split("~"));

            currentResults[result.dataset.index] = `${currentResult[0]}~${((evt.target.value).replace(/~/gi, "-")).replace(/\`/gi, "'")}`;
        });
        // Delete Button
        result.querySelector(".delete-link").addEventListener("click", (evt)=>{
            if(confirm("Are you sure you want to delete this link?")){
                currentResults.splice((evt.target.parentNode).dataset.index,1);
                saveChanges();
            }
        });
        
    });

   

    // Add a new result
    function addResult(evt){
        const nameVal = (evt.target.parentElement).querySelector("#nameInput").value;
        const urlVal = (evt.target.parentElement).querySelector("#urlInput").value;
        currentResults.push(`${(nameVal.replace(/~/gi, "-")).replace(/\`/gi, "'")}~${(urlVal.replace(/~/gi, "-")).replace(/\`/gi, "'")}`);
        saveChanges();
    }
    //  Save Changes
    function saveChanges(){
        window.onbeforeunload = "";
        const postForm = document.createElement("form");
        postForm.setAttribute("method", "post");
        postForm.setAttribute("action", "./manage_results.php?action=savefile");
        postForm.style.display = "none";

        const yearVal = document.createElement("input");
        yearVal.setAttribute("name", "year");
        yearVal.value = document.getElementById("currentYear").dataset.value;

        const saveVal = document.createElement("input");
        saveVal.setAttribute("name", "tosave");
        let firstElem = true;
        let newSaveVal = "";
        currentResults.forEach((result)=>{
            if(!firstElem){
                newSaveVal += "`" + result;
            }else{
                newSaveVal += result;
                firstElem = false;
            }
        });
        saveVal.value = newSaveVal;
        postForm.append(saveVal);
        postForm.append(yearVal);
        document.getElementsByTagName("body")[0].append(postForm);
        postForm.submit();
    }

}
         // ADD FOLDER
         function addFolder(){
            let folderName = prompt("Enter Folder Name", "Untitled");
            if (folderName != null) {
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_results.php?action=addfolder");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "foldername");
                nameVal.value = folderName;
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
            }
        }

        // RENAME FOLDER
        function editFolderName(evt){
            let folderName = prompt("Enter Folder Name", ((evt.target.parentNode).parentNode.textContent).trim());
            if (folderName != null) {
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_results.php?action=editfoldername");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "newname");
                nameVal.value = folderName;
                 const oldNameVal = document.createElement("input");
                 oldNameVal.setAttribute("name", "oldname");
                 oldNameVal.value = (evt.target.parentNode).parentNode.textContent;
                postForm.append(nameVal);
                postForm.append(oldNameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
                
            }
        }
        // DELETE FOLDER
        function deleteFolder(evt){
            if(confirm("Are you sure you want to delete this folder and all it's contents?")){
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_results.php?action=delfolder");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "foldername");
                nameVal.value = (evt.target.parentNode).parentNode.textContent;
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
            }
        }
        // OPEN FOLDER
        function openFolder(evt){
            const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_results.php");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "year");
                nameVal.value = formatNametoVal(evt.target.parentNode.textContent);
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
        }
         // Formtat 'Test Val' to 'Test_Val'
        function formatNametoVal(str){
            return( `${str.trim()}`);
        }
    }
};
manageResultsObj.init();