/*
 Program: photogallery.js
 Creator: William Bojczuk (wiliambojczuk@gmail.com)
 Github: https://github.com/wbojczuk
 */
const photoGalleryObj = {
    // System to only load images that are in user's viewport
    lazyLoadImages: ()=>{
        // Observer Object
        const lazyObserver = new IntersectionObserver(
            (entries)=>{
                entries.forEach((entry)=>{
                    if(entry.isIntersecting){
                        lazyObserver.unobserve(entry.target);
                        lazyLoad(entry.target);
                    }
                    
                })
            },{
                // Loads if image is 1/100 in the viewport
                threshold: 0.01
            }
        );
            // Observe all image elements
        const allImages = document.querySelectorAll(".photo-gallery-item");
        allImages.forEach((curImage)=>{
            lazyObserver.observe(curImage);
        });

        // Function to load image
        function lazyLoad(elem){

            // check if img exisits
            const testImg = new Image();
            testImg.src = elem.dataset.src;
            
            if(testImg.complete){
                elem.src  = elem.dataset.src;
                addPhotoId();
            }else{
                testImg.onload = ()=>{
                    elem.src = elem.dataset.src;
                    addPhotoId();
                };
                // If image doesn't exist, remove the image element
                testImg.onerror = ()=>{
                    elem.parentNode.remove();
                };
            }
            // Function to add an element containing the Image Name/ID if it matches the RegEx
            function addPhotoId(){
                const imgTitleElem = elem.parentNode.querySelector(".photo-gallery-img-title");
                if(/(IMG|CRW|DSC|[0-9]{1,})_[0-9]{1,}/i.test(elem.dataset.src)){
                    const imgTitle = `${elem.dataset.src}`.match(/(IMG|CRW|DSC|[0-9]{1,})_[0-9]{1,}/i)[0];
                    imgTitleElem.textContent = imgTitle;
                    // Event listener to copy photo id to clipboard
                }else{
                    imgTitleElem.remove();
                }
            }
        }
    }
};
photoGalleryObj.lazyLoadImages();