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

        }else if(document.getElementById("addCategoryButton")){
            // ------------------ IF USER IS VIEWING CATEGORIES ----------------------

        // Add Category Button
        document.getElementById("addCategoryButton").addEventListener("click", addCategory);

        // CATEGORY EDIT BUTTON LISTENERS
        const allEditButtons = document.querySelectorAll(".edit-category-bar");
        allEditButtons.forEach((elem)=>{
            elem.querySelector(".edit").addEventListener("click", editCategoryName);
            elem.querySelector(".delete").addEventListener("click", deleteCategory);

        });
        const allTopEditButtons = document.querySelectorAll(".edit-category-bar-top");
        allTopEditButtons.forEach((elem)=>{
            elem.addEventListener("click", openCategory);
        });
    
        }

        // ADD FOLDER
         function addFolder(){
            let folderName = prompt("Enter Folder Name", "Untitled");
            if (folderName != null) {
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_gallery.php?action=addfolder");
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
                postForm.setAttribute("action", "./manage_gallery.php?action=editfoldername");
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
                postForm.setAttribute("action", "./manage_gallery.php?action=delfolder");
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
                postForm.setAttribute("action", "./manage_gallery.php");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "year");
                nameVal.value = (evt.target.parentNode.textContent).trim();
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
        }

        // Add Category
        function addCategory(){
            let categoryName = prompt("Enter Category Name", "Untitled");
            if (categoryName != null) {
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_gallery.php?action=addcategory");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "categoryname");
                nameVal.value = formatNametoVal(categoryName);
                const yearVal = document.createElement("input");
                yearVal.setAttribute("name", "year");
                yearVal.value = document.getElementById("yearHeader").textContent;
                postForm.append(nameVal);
                postForm.append(yearVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
            }
        }

        // EDIT CATEGORY NAME
        function editCategoryName(evt){
            let categoryName = prompt("Enter Folder Name", ((evt.target.parentNode).parentNode.textContent).trim());
            if (categoryName != null) {
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_gallery.php?action=editcategoryname");
                postForm.style.display = "none";

                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "newname");
                nameVal.value = formatNametoVal(categoryName);

                 const oldNameVal = document.createElement("input");
                 oldNameVal.setAttribute("name", "oldname");
                 oldNameVal.value = formatNametoVal(((evt.target.parentNode).parentNode.textContent).trim());

                 const yearVal = document.createElement("input");
                yearVal.setAttribute("name", "year");
                yearVal.value = document.getElementById("yearHeader").textContent.trim();

                postForm.append(nameVal);
                postForm.append(oldNameVal);
                postForm.append(yearVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
                
            }
        }

        // Delete Category
        function deleteCategory(evt){
            if(confirm("Are you sure you want to delete this album and all it's contents?")){
                const postForm = document.createElement("form");
                postForm.setAttribute("method", "post");
                postForm.setAttribute("action", "./manage_gallery.php?action=delcategory");
                postForm.style.display = "none";
                const nameVal = document.createElement("input");
                nameVal.setAttribute("name", "categoryname");
                nameVal.value = formatNametoVal(((evt.target.parentNode).parentNode.textContent).trim());
                const yearVal = document.createElement("input");
                yearVal.setAttribute("name", "year");
                yearVal.value = document.getElementById("yearHeader").textContent.trim();
                postForm.append(yearVal);
                postForm.append(nameVal);
                document.getElementsByTagName("body")[0].append(postForm);
                postForm.submit();
            }
        }

        // Open Category
        function openCategory(evt){
            const postForm = document.createElement("form");
            postForm.setAttribute("method", "post");
            postForm.setAttribute("action", "./manage_gallery.php");
            postForm.style.display = "none";
            const nameVal = document.createElement("input");
            nameVal.setAttribute("name", "category");
            nameVal.value = formatNametoVal(((evt.target.parentNode).textContent).trim());
            const yearVal = document.createElement("input");
            yearVal.setAttribute("name", "year");
            yearVal.value = document.getElementById("yearHeader").textContent.trim();
            postForm.append(yearVal);
            postForm.append(nameVal);
            document.getElementsByTagName("body")[0].append(postForm);
            postForm.submit();
        }

        // Formtat 'Test Val' to 'test_val'
        function formatNametoVal(str){
            return( `${(str.toLowerCase()).replace(" ", "_")}`);
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
                return "There are unsaved chanegs on this page, are you sure you want to exit?";
            }
        }

        // Links imported from PHP
        const allGalleryLinks = [...allLinks];
        // Batch Select State
        let amtChecked = 0;
        

        // Element Refs
        const addPhotoFinish = document.getElementById("addPhotoFinish");
        const addPhotoInput = document.getElementById("addPhotoInput");
        const batchDeleteButton = document.getElementById("batchDelete");
        const saveButton = document.getElementById("saveChangesButton");
        const addPhotoButton = document.getElementById("addPhotoButton");
        const allLinkElems = document.querySelectorAll(".manage-link");

        
        // "Add Photo" Button Listeners
        let inputOpen = false;
        addPhotoButton.addEventListener("click", ()=>{
            if(!inputOpen){
                addPhotoInput.parentElement.style.display = "flex";
            }else{
                addPhotoInput.parentElement.style.display = "none";
                addPhotoFinish.style.display = "none";
            }
            inputOpen = !inputOpen;
        });

        addPhotoInput.addEventListener("input", ()=>{
            if(addPhotoInput.value !== ""){
                addPhotoFinish.style.display = "inline-block";
            }else{
                addPhotoFinish.style.display = "none";
            }
        });

        addPhotoFinish.addEventListener("click", ()=>{
            let newLinks = (addPhotoInput.value).split(",");
            newLinks.forEach((link)=>{
                allGalleryLinks.push(link);
                saveChanges();
            });
        });

        // Save Button Event listener
        saveButton.addEventListener("click", saveChanges);

        // Events on each of the exisiting links
        allLinkElems.forEach((elem)=>{
            // LINK INPUT
            elem.addEventListener("input", (evt)=>{
                allGalleryLinks[evt.target.dataset.count] = evt.target.value;
            });
            // DELETE BUTTON
            elem.parentElement.querySelector(".delete-link").addEventListener("click", (evt)=>{
                if(confirm("Are you sure you want to delete this link?")){
                    allGalleryLinks.splice((evt.target.parentNode).querySelector("input[type='text']").dataset.count,1);
                    saveChanges();
                }
            });
            // CHECKBOX
            elem.parentElement.querySelector(".check-link").addEventListener("change", (evt)=>{
                if(evt.target.checked){
                    ++amtChecked;
                }else{
                    --amtChecked;
                }
                if(amtChecked > 0){
                    batchDeleteButton.style.visibility = "visible";
                }else{
                    batchDeleteButton.style.visibility = "hidden";
                }
            });

            
    });

    // Batch Delete All Selected Links
    batchDeleteButton.addEventListener("click", ()=>{
        if(confirm("Are you sure you want to delete all the selected links?")){
            const allDelLinks = document.querySelectorAll(".check-link:checked");
            const delVals = [];
            allDelLinks.forEach((link)=>{
                delVals.push((link.parentNode).querySelector("input[type='text']").value);
            });
            delVals.forEach((val)=>{
                allGalleryLinks.splice(allGalleryLinks.indexOf(val),1);
            });
            saveChanges();
        }
    });

    // Convert changes to JSON Format and POST to be saved by PHP
    function saveChanges(){
        window.onbeforeunload = "";
        const postForm = document.createElement("form");
            postForm.setAttribute("method", "post");
            postForm.setAttribute("action", "./manage_gallery.php?action=savejson");
            postForm.style.display = "none";
            const nameVal = document.createElement("input");
            nameVal.setAttribute("name", "category");
            nameVal.value = document.getElementById("currentCategory").dataset.value;
            const yearVal = document.createElement("input");
            yearVal.setAttribute("name", "year");
            yearVal.value = document.getElementById("currentYear").dataset.value;
            const saveVal = document.createElement("input");
            saveVal.setAttribute("name", "tosave");
            const newSaveVal = allGalleryLinks.map((link)=>{
                return `"${link}"`
            })
            saveVal.value = `[${newSaveVal.toString()}]`;
            postForm.append(saveVal);
            postForm.append(yearVal);
            postForm.append(nameVal);
            document.getElementsByTagName("body")[0].append(postForm);
            postForm.submit();
    }

    

    }
};
// Determine if viewing links or not
if(document.getElementById("addPhotoButton")){
    manageGalleryObj.linkManager();
}else{
    manageGalleryObj.init();
}