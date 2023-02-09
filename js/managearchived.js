/*
    Program: managegallery.js
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
*/
const manageGalleryObj = {
    init: ()=>{
        
        // FOLDER EDITORS
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

        }

        // ADD FOLDER
         function addFolder(){
            let folderName = prompt("Enter Folder Name", "Untitled");
            if (folderName != null) {
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", `./manage_archived.php?action=addfolder`);
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "foldername");
                nameVal.value = (folderName).trim();
                const typeVal = document.createElement("input");
                typeVal.setAttribute("name", "type");
                typeVal.value = document.getElementById("currentType").dataset.value;
               postForm.append(typeVal);
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
                postForm.setAttribute("action", "./manage_archived.php?action=editfoldername");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "newname");
                nameVal.value = (folderName).trim();
                 const oldNameVal = document.createElement("input");
                 oldNameVal.setAttribute("name", "oldname");
                 oldNameVal.value = ((evt.target.parentNode).parentNode.textContent).trim();
                 const typeVal = document.createElement("input");
                 typeVal.setAttribute("name", "type");
                 typeVal.value = document.getElementById("currentType").dataset.value;
                postForm.append(typeVal);
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
                postForm.setAttribute("action", "./manage_archived.php?action=delfolder");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "foldername");
                nameVal.value = ((evt.target.parentNode).parentNode.textContent).trim();
                const typeVal = document.createElement("input");
                 typeVal.setAttribute("name", "type");
                 typeVal.value = document.getElementById("currentType").dataset.value;
                postForm.append(typeVal);
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
            }
        }
        // OPEN FOLDER
        function openFolder(evt){
            const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_archived.php");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "year");
                nameVal.value = (evt.target.parentNode.textContent).trim();
                const typeVal = document.createElement("input");
                 typeVal.setAttribute("name", "type");
                 typeVal.value = document.getElementById("currentType").dataset.value;
                postForm.append(typeVal);
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
        }

    },
    linkManager: ()=>{
        // ------------------ IF USER IS VIEWING LINKS ----------------------

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

        // Links imported from PHP
        const allCurrentLinks = [...allLinks];
        
        // Element Refs
        const saveButton = document.getElementById("saveChangesButton");
        const allLinkElems = document.querySelectorAll(".manage-link");

        const currentYear = document.getElementById("currentYear").dataset.value;
        const currentType = document.getElementById("currentType").dataset.value;
        const allCurrentLinksLength = allCurrentLinks.length;
        let currentIndex = 0;
        for(let i = 0; i < allCurrentLinksLength; ++i){
            if(allCurrentLinks[i].date == currentYear){
                currentIndex = i;
            }
        }

        // Save Button Event listener
        saveButton.addEventListener("click", saveChanges);

        // Events on each of the exisiting links
        allLinkElems.forEach((elem)=>{
            // LINK INPUT
            if(currentType == "winner"){
                elem.addEventListener("input", (evt)=>{
                    allCurrentLinks[currentIndex].winners[evt.target.dataset.count] = evt.target.value;
                });
            }else if(currentType == "location"){
                elem.addEventListener("input", (evt)=>{
                    allCurrentLinks[currentIndex].loc = evt.target.value;
                });
            }
            
    });
    // Convert changes to JSON Format and POST to be saved by PHP
    function saveChanges(){
        
        window.onbeforeunload = "";
        const postForm = document.createElement("form");
            postForm.setAttribute("method", "post");
            postForm.setAttribute("action", "./manage_archived.php?action=savejson");
            postForm.style.display = "none";
            const yearVal = document.createElement("input");
            yearVal.setAttribute("name", "year");
            yearVal.value = document.getElementById("currentYear").dataset.value;
            const saveVal = document.createElement("input");
            saveVal.setAttribute("name", "tosave");
            saveVal.value = JSON.stringify(allCurrentLinks);
            const typeVal = document.createElement("input");
                 typeVal.setAttribute("name", "type");
                 typeVal.value = document.getElementById("currentType").dataset.value;
                postForm.append(typeVal);
            postForm.append(saveVal);
            postForm.append(yearVal);
            document.getElementsByTagName("body")[0].append(postForm);
            postForm.submit();
    }

    

    }
};
// Determine if viewing links or not
if(document.getElementById("saveChangesButton")){
    manageGalleryObj.linkManager();
}else if(document.getElementById("currentType")){
    manageGalleryObj.init();
}