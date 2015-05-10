var showBanner = function() {
    var hr = new XMLHttpRequest();
    var pathnames = location.pathname.split('/');
    var request_page = pathnames[pathnames.length-1].split('.')[0];
    
    var url = "bn-admin/banner/iframe/"+request_page;

    hr.open("POST", url, true); 
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            return_data = hr.responseText;
            console.log(return_data);
            if (return_data != -1){
                document.getElementsByTagName("iframe")[0].setAttribute("src", "bn-admin/banner/showbody/" + return_data);
                document.getElementsByTagName("iframe")[0].setAttribute("style","display:block;");
            }
        } 
    } 
    hr.send(); 
}