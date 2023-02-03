/*
<div class="dropdown-info-wrapper">

        <div class="dropdown-info-item">
            <div class="dropdown-info-title">
                <div class="dropdown-info-img"></div>
                <span>TITLE</span>
            </div>
            <div class="dropdown-info-content">
                Content is here. Lots of content
            </div>
        </div>

        </div>
*/

const dropdownInfoObj = {
    init: ()=>{
        const allWrappers = document.querySelectorAll(".dropdown-info-wrapper");
        allWrappers.forEach((wrapper)=>{
            const allItems = wrapper.querySelectorAll(".dropdown-info-item");
            allItems.forEach((item)=>{
                const title = item.querySelector(".dropdown-info-title");
                const img = item.querySelector(".dropdown-info-img");
                const content = item.querySelector(".dropdown-info-content");
                let contentOpen = false;
                let itemActive = true;

                item.addEventListener("mouseenter", ()=>{
                    itemActive = true;
                });
                item.addEventListener("mouseleave", ()=>{
                    itemActive = false;
                });

                function openContent(){
                    content.style.height = "auto";
                    content.style.padding = "0.5vh 5% 0.5vh 10%";
                    contentOpen = true;
                    img.style.transform = "rotate(-90deg)";
                }
                function closeContent(){
                    content.style.height = "0";
                    content.style.padding = "0 5% 0 10%";
                    contentOpen = false;
                    img.style.transform = "rotate(0)";
                }
                window.addEventListener("click", ()=>{
                    if(!itemActive){
                        closeContent();
                    }
                });

                title.addEventListener("click", ()=>{
                    if(!contentOpen){
                        openContent();
                    }else{
                        closeContent();
                    }

                });
            });
        });
    }
}
dropdownInfoObj.init();