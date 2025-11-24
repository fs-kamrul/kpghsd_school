// -------------------------------
// GLOBAL XMLHTTP OBJECT
// -------------------------------
var xmlhttp = null;
if (window.XMLHttpRequest) {
    // Modern browsers
    xmlhttp = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    // Old IE
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

// -------------------------------
// Function: show_subject(obj)
// Description: Fetch subject data dynamically from controller
// Example URL: base_url/subject_panel/show_sub/{class}/{group}
// -------------------------------
function show_subject(obj) {
    var cls_s = document.getElementById('class_id').value;
    var grp = document.getElementById('group_r').value;
    var serverPage = base_url + "subject_panel/show_sub/" + cls_s + "/" + grp;

    // Debug (optional)
    // alert(serverPage);

    xmlhttp.open("GET", serverPage, true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById(obj).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.send(null);
}

// -------------------------------
// Toggle between RFID and Normal design sets
// -------------------------------
function toggleDesignSet(showId, hideId) {
    document.getElementById(showId).style.display = "block";
    document.getElementById(hideId).style.display = "none";
}

// -------------------------------
// Toggle Student / Teacher field states
// -------------------------------
function toggleUserType(type) {
    const fields = ['year', 'class_id', 'section', 'group_r'];
    const disable = (type === 'teacher');
    fields.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.disabled = disable;
    });
}
// function toggleUserType(type) {
//     const fields = ['year', 'class_id', 'section', 'group_r'];
//     const disable = (type === 'teacher');
//     fields.forEach(id => {
//         const el = document.getElementById(id);
//         if (el) el.disabled = disable;
//     });
//
//     // Show/hide design sections
//     if (type === 'teacher') {
//         document.getElementById('dvNormal').style.display = 'none';
//         document.getElementById('dvRfid').style.display = 'none';
//         document.getElementById('dvTeacher').style.display = 'block';
//     } else {
//         document.getElementById('dvNormal').style.display = 'block';
//         document.getElementById('dvRfid').style.display = 'block';
//         document.getElementById('dvTeacher').style.display = 'none';
//     }
// }

// -------------------------------
// Auto-hide alert messages
// -------------------------------
window.addEventListener('load', function() {
    const alertBox = document.querySelector('.alert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 5000);
    }
});
