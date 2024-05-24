var thisPage = 1;
var limit = 5;
var listElement = document.getElementById("regisCentre_Datalist");
var list = listElement.children;
var maxPageButton = 9;
if (sessionStorage.getItem("registrationNetwork")) {
    var data = JSON.parse(sessionStorage.getItem("registrationNetwork"));
    loadData(data);
    }

$("#regisCentre_search-text").on("keyup", function() {
    var warning = document.querySelector(".warning");
    var text = $("#regisCentre_search-text").val();
    var mikExp = /[\$\\\\\#\^\&\*\(\)\[\]\+\_\{\}\`\~\=\\!\|\/\?\.\,\:\;\"\'\@]/;  //Kiểm tra hợp thức
    if (text.search(mikExp) >= 0) {
        warning.innerHTML = "Vui lòng nhập đúng định dạng.";  

    } else {
        warning.innerHTML = "";
    }
    
}); 

$(document).ready(function(){
    var warning = document.querySelector(".warning");
    $("#regisCentre_search-text").keypress(function(event) {
        if (event.keyCode == "13") {
            event.preventDefault();
            $("#regisCentre_search-button").click();
            $("#regisCentre_search-text").blur();

        }
    })
    $("#regisCentre_search-button").click(function(){ //tìm kiếm trung tâm đăng kiểm
         warning.innerHTML = "";
        while(document.getElementById("regisCentre_Datalist").hasChildNodes()){
            let datalist = document.getElementById("regisCentre_Datalist");
            datalist.removeChild(datalist.firstChild);
        }
        
           
            var city = $("#regisCentre_City").val();
            var name = $("#regisCentre_search-text").val();

            $.post("./RegistrationNetwork/showRegistrationNetwork",{city: city, name: name},function(data){  //AJAX không tải lại
                data =  JSON.parse(data);     //dữ liệu JSON
                sessionStorage.setItem("registrationNetwork", JSON.stringify(data));      
                loadData(data);
            })
        
    })
})

function loadData(data) { //load dữ liệutlên giao diện
    var warning = document.querySelector(".warning");
                if (data == "error") {
                    warning.innerHTML = "Vui lòng nhập đúng định dạng.";
                    document.getElementsByClassName("pagination")[0].style.display = "none";
                } else if(data.length == 0) {
                    document.getElementsByClassName("pagination")[0].style.display = "none";
                    warning.innerHTML = "Không tìm thấy trung tâm đăng kiểm.";
                } else {
                    
                    
                    
                
    warning.innerHTML = "Tìm thấy " + data.length + " trung tâm đăng kiểm.";  // cập nhật DOM trên frontend.
    for (var i = 0; i < data.length; i++) {
        var r = document.createElement('ul');
        var l1 = document.createElement('li');
        var l2 = document.createElement('li');
        var l3 = document.createElement('li');
        var l4 = document.createElement('li');
        var l5 = document.createElement('li');
        var l6 = document.createElement('li');
        var l7 = document.createElement('li');
        l1.classList.add('ten');
        l2.classList.add('dia_chi');
        l3.classList.add('dien_thoai');
        l3.classList.add('fax');
        l4.classList.add('email');
        l5.classList.add('giam_doc');
        l5.classList.add('giam_doc_phone');
        l6.classList.add('pho_giam_doc_1');
        l6.classList.add('pho_giam_doc_1_phone');
        l7.classList.add('pho_giam_doc_2');
        l7.classList.add('pho_giam_doc_2_phone');
        l1.innerHTML = data[i].ten
        l2.innerHTML = "Địa chỉ: " + data[i].dia_chi;
        l3.innerHTML = "Điện thoại: " + data[i].dien_thoai + " Fax: " + data[i].fax;
        l4.innerHTML = "Email: " + data[i].email;
        l5.innerHTML = "Giám đốc: " + data[i].giam_doc + " - " + data[i].giam_doc_phone;
        l6.innerHTML = "Phó Giám đốc: " + data[i].pho_giam_doc_1 + " - " + data[i].pho_giam_doc_1_phone;
        l7.innerHTML = "Phó Giám đốc: " + data[i].pho_giam_doc_2 + " - " + data[i].pho_giam_doc_2_phone;
        r.appendChild(l1);
        r.appendChild(l2);
        r.appendChild(l3);
        r.appendChild(l4);
        r.appendChild(l5);
        r.appendChild(l6);
        r.appendChild(l7);
        document.querySelector(".regisCentre_Datalist").appendChild(r);
    }
    loadItems();
}
}


function loadItems() {//tải thông tin thành từng trang để hiển thị
    list = listElement.children;
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    for(let i = 0; i < list.length; i++) {
        if(i >= beginGet && i <= endGet) {
            list[i].style.display = 'block';
        }
        else list[i].style.display = 'none';
    }
    //console.log(list);
    //console.log(list.length);
    listPage();
}   
function listPage() {//tạo phần nút bấm để chuyển trang
    list = listElement.children;
    //console.log(list.length);
    let count = Math.ceil(list.length / limit);
    // console.log(list);
    document.querySelector('.pagination-list').innerHTML = "";
    if(list.length != 0) {//nếu không có data thì không hiển thị
        document.getElementsByClassName("pagination")[0].style.display = "block";
        let firstpage = document.createElement('li');
        firstpage.innerHTML = "<<";
        document.querySelector('.pagination-list').appendChild(firstpage);
        let pre = document.createElement('li');
        pre.innerHTML = "<";
        document.querySelector('.pagination-list').appendChild(pre);
        if (thisPage != 1) {
            firstpage.setAttribute('onclick', "changePage(" + 1 + ")");
            pre.setAttribute('onclick', "changePage(" + (thisPage-1) + ")");
        } 
        else {
            firstpage.classList.add('disable');
            pre.classList.add('disable');
        }
        if(count <= (maxPageButton-1)) { //số trang nhỏ hơn 7
            for(let i = 1; i <= count; i++) {
                let pageNum = document.createElement('li');
                pageNum.innerText = i;
                if(i == thisPage) {
                    pageNum.classList.add('active');
                }
                pageNum.setAttribute('onclick', "changePage(" + i + ")");
                document.querySelector('.pagination-list').appendChild(pageNum);
            }
        }
        else {//số trang lớn hơn hoặc bằng 7
            if (thisPage > 0 && thisPage <= (maxPageButton-4)) { // có dạng 1,2,3,...,count 
                if(thisPage == (maxPageButton-4)) {
                    for(let i = 1; i <= (maxPageButton-1); i++) {//giới hạn số nút 
                        let pageNum = document.createElement('li');
                        if(i == (maxPageButton-2)) {
                            pageNum.innerText = "...";
                            pageNum.classList.add('disable');
                        }
                        else if(i == maxPageButton-1) {
                            pageNum.innerText = count;
                            if(thisPage == count) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + count + ")");
                        }
                        else {
                            pageNum.innerText = i;
                            if(i == thisPage) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + i + ")");
                        }
                        document.querySelector('.pagination-list').appendChild(pageNum);
                    }
                }
                else {
                    for(let i = 1; i <= (maxPageButton-2); i++) {//giới hạn số nút 
                        let pageNum = document.createElement('li');
                        if(i == (maxPageButton-3)) {
                            pageNum.innerText = "...";
                            pageNum.classList.add('disable');
                        }
                        else if(i == maxPageButton-2) {
                            pageNum.innerText = count;
                            if(thisPage == count) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + count + ")");
                        }
                        else {
                            pageNum.innerText = i;
                            if(i == thisPage) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + i + ")");
                        }
                        document.querySelector('.pagination-list').appendChild(pageNum);
                    }
                }
            }
            else if (thisPage > (count-(maxPageButton-4)) && thisPage <= count) {//có dạng 1,...,count-2,count-1,count
                if(thisPage == (count-(maxPageButton-5))){
                    for(let i = 1; i <= (maxPageButton-1); i++) {//giới hạn số nút 
                        let pageNum = document.createElement('li');
                        if(i == 2) {
                            pageNum.innerText = "...";
                            pageNum.classList.add('disable');
                        }
                        else if(i == 1) {
                            pageNum.innerText = i;
                            if(i == thisPage) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + i + ")");
                        }
                        else {
                            pageNum.innerText = (count-((maxPageButton-1)-i));
                            if(thisPage == (count-((maxPageButton-1)-i)) ) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + (count-((maxPageButton-1)-i)) + ")");
                        }
                        document.querySelector('.pagination-list').appendChild(pageNum);
                    }
                }
                else {
                    for(let i = 1; i <= (maxPageButton-2); i++) {//giới hạn số nút 
                        let pageNum = document.createElement('li');
                        if(i == 2) {
                            pageNum.innerText = "...";
                            pageNum.classList.add('disable');
                        }
                        else if(i == 1) {
                            pageNum.innerText = i;
                            if(i == thisPage) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + i + ")");
                        }
                        else {
                            pageNum.innerText = (count-((maxPageButton-2)-i));
                            if(thisPage == (count-((maxPageButton-2)-i)) ) {
                                pageNum.classList.add('active');
                            }
                            pageNum.setAttribute('onclick', "changePage(" + (count-((maxPageButton-2)-i)) + ")");
                        }
                        document.querySelector('.pagination-list').appendChild(pageNum);
                    }
                }
                
            }
            else {//có dạng 1,...,4,5,6,...,count
                for(let i = 1; i <= maxPageButton; i++) {//giới hạn số nút 
                    let pageNum = document.createElement('li');
                    if(i == 2 || i == (maxPageButton-1)) {
                        pageNum.innerText = "...";
                        pageNum.classList.add('disable');
                    }
                    else if(i == 1) {
                        pageNum.innerText = i;
                        if(i == thisPage) {
                            pageNum.classList.add('active');
                        }
                        pageNum.setAttribute('onclick', "changePage(" + i + ")");
                    }
                    else if(i == maxPageButton) {
                        pageNum.innerText = count;
                        if(count == thisPage) {
                            pageNum.classList.add('active');
                        }
                        pageNum.setAttribute('onclick', "changePage(" + count + ")");
                    }
                    else {
                        pageNum.innerText = ((i-(Math.ceil(maxPageButton/2)))+thisPage);
                        if(thisPage == ((i-(Math.ceil(maxPageButton/2)))+thisPage) ) {
                            pageNum.classList.add('active');
                        }
                        pageNum.setAttribute('onclick', "changePage(" + ((i-(Math.ceil(maxPageButton/2)))+thisPage) + ")");
                    }
                    document.querySelector('.pagination-list').appendChild(pageNum);
                }
            }
        }
        let next = document.createElement('li');
        next.innerHTML = ">";
        document.querySelector('.pagination-list').appendChild(next);
        let lastpage = document.createElement('li');
        lastpage.innerHTML = ">>";
        document.querySelector('.pagination-list').appendChild(lastpage);
        if (thisPage != count) {
            next.setAttribute('onclick', "changePage(" + (thisPage+1) + ")");
            lastpage.setAttribute('onclick', "changePage(" + count + ")");
        } 
        else {
            next.classList.add('disable');
            lastpage.classList.add('disable');
        }
    }
    else document.getElementsByClassName("pagination")[0].style.display = "none";
    
}
function changePage(i) {//chuyển trang
    thisPage = i;
    loadItems();
}