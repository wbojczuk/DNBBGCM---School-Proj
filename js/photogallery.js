const photoGalleryObj = {
    lazyLoadImages: ()=>{
        // ONLY LOAD IMAGES ONE IN VIEWPORT
        const lazyObserver = new IntersectionObserver(
            (entries)=>{
                entries.forEach((entry)=>{
                    if(entry.isIntersecting){
                        lazyObserver.unobserve(entry.target);
                        lazyLoad(entry.target);
                    }
                    
                })
            },{
                threshold: 0.01
            }
        );
        const allImages = document.querySelectorAll(".photo-gallery-item");
        allImages.forEach((curImage)=>{
            lazyObserver.observe(curImage);
        });
        function lazyLoad(elem){
            // check if img exisits
            const testImg = new Image();
            testImg.src = elem.dataset.src;
            if(/(IMG|CRW|[0-9]{1,})_[0-9]{1,}/i.test(elem.dataset.src)){
                const imgTitle = `${elem.dataset.src}`.match(/(IMG|CRW|[0-9]{1,})_[0-9]{1,}/i)[0];
                const imgTitleElem = elem.parentNode.querySelector(".photo-gallery-img-title");
                imgTitleElem.textContent = imgTitle;
                // Event listener to copy photo id to clipboard
                imgTitleElem.addEventListener("click", ()=>{
                    navigator.clipboard.writeText(imgTitle);
                    alert("Copied the ID!");
                })
            }
           
            
            if(testImg.complete){
                elem.src  = elem.dataset.src;
            }else{
                testImg.onload = ()=>{
                    elem.src = elem.dataset.src;
                };
                // If image doesn't exist, remove the image element
                testImg.onerror = ()=>{
                    elem.parentNode.remove();
                };
            }
        }
    }
};
photoGalleryObj.lazyLoadImages();