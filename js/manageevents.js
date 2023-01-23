// ADDS BUTTON FUNCTIONALITY TO "manage_events.php"
const manageEventsObj = {
    init: ()=>{
        const deleteButtons = document.querySelectorAll(".delete-button");
        deleteButtons.forEach((button)=>{
            button.addEventListener("click", manageEventsObj.removeEvent);
        });
        const editButtons = document.querySelectorAll(".edit-button");
        editButtons.forEach((button)=>{
            button.addEventListener("click", manageEventsObj.editEvent);
        });
    },
    removeEvent: (evt)=>{
        if(confirm("Are you sure you want to remove this event?")){
            const locData = (evt.target.parentElement).parentElement;
        window.location.href = `manage_events.php?action=delete&eventid=${locData.dataset.eventid}&day=${locData.dataset.day}&month=${locData.dataset.month}`;
    }
    },
    editEvent: (evt)=>{
        const locData = (evt.target.parentElement).parentElement;
        window.location.href = `add_event.php?action=edit&eventid=${locData.dataset.eventid}&day=${locData.dataset.day}&month=${locData.dataset.month}`;
    }

};
// If Logged In Or Not
if(document.querySelector(".delete-button")){
    manageEventsObj.init();
}
