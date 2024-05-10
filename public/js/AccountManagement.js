var thisPage = 1;
var limit = 10;
var maxPageButton = 7;
if (document.getElementById("data-table-body")){
    var listElement = document.getElementById("data-table-body");
    var list = listElement.children;
};

if (sessionStorage.getItem("AccountList")) {
    var data = JSON.parse(sessionStorage.getItem("AccountList"));
    loadData(data);
    }

$("#qltk_search-text").on("keyup", function() {
    var warning = document.getElementById("notice");
    var text = $("#qltk_search-text").val();
    var mikExp = /[\$\\\\\#\^\&\*\(\)\[\]\+\_\{\}\`\~\=\\!\|\/\?\.\,\:\;\"\'\@]/;  //Kiểm tra hợp thức
    if (text.search(mikExp) >= 0) {
        warning.innerHTML = "Vui lòng nhập đúng định dạng.";  
    } else {
        warning.innerHTML = "";
    }
    
}); 

$(document).ready(function(){
    var warning = document.getElementById("notice");
    $("#qltk_search-text").keypress(function(event) {
        if (event.keyCode == "13") {
            event.preventDefault();
            $("#qltk_search-button").click();
            $("#qltk_search-text").blur();

        }
    })
    $("#qltk_search-button").click(function(){ //tìm kiếm tài khoản
        thisPage = 1;
        document.getElementsByClassName("pagination")[0].style.display = "none";
         document.getElementById('table-container').style.display = "none";
         var city = $("#qltk_City").val();
         var name = $("#qltk_search-text").val();    
            $.post("./AccountManagement/showAccountList",{city: city, name: name},function(data){  //AJAX không tải lại
                data =  JSON.parse(data);     //dữ liệu JSON
                sessionStorage.setItem("accountList", JSON.stringify(data));    
                loadData(data);
            })
        
    })
})

function loadData(data) { //load dữ liệu lên giao diện
    var warning = document.getElementById("notice");
                if (data == "error") {
                    warning.innerHTML = "Vui lòng nhập đúng định dạng.";
                } else if(data.length == 0) {
                    warning.innerHTML = "Không tìm thấy tài khoản.";
                } else {      
                    sessionStorage.setItem("AccountList", JSON.stringify(data));     
                
    warning.innerHTML = "Tìm thấy " + data.length + " tài khoản.";  // cập nhật DOM trên frontend.
    if (document.getElementById("status") && document.getElementById('table-container') && document.querySelector('#data-table > tbody')) {
        document.getElementById('table-container').style.display = "block";  
        var element = document.querySelector('#data-table > tbody');
        var child = element.children;
        for (var j = child.length-1; j >= 0; j--) {
        element.removeChild(child[j]);
        };
        for (var i = 0; i < data.length; i++) {
            var r = document.createElement('tr');
            var l1 = document.createElement('td');
            var l2 = document.createElement('td');
            var a = document.createElement('a');
            if(data[i].ten){
            a.href="./AccountManagement/changeAccountInformation/" + data[i].ten.replaceAll(' ', '_');}
            var l3 = document.createElement('td');
            var l4 = document.createElement('td');
            var l5 = document.createElement('td');
            l1.innerHTML = i + 1;
            a.innerHTML = data[i].ten;
            l3.innerHTML = data[i].dia_chi;
            l4.innerHTML = data[i].email;
            l5.innerHTML = data[i].giam_doc;
            r.appendChild(l1);
            l2.appendChild(a);
            r.appendChild(l2);
            r.appendChild(l3);
            r.appendChild(l4);
            r.appendChild(l5);
            document.querySelector('#data-table > tbody').appendChild(r);                              
        }
        loadItems();
    }

}
}


function loadItems() {//tải thông tin thành từng trang để hiển thị
    list = listElement.children;
    let beginGet = limit * (thisPage - 1);
    let endGet = limit * thisPage - 1;
    for(let i = 0; i < list.length; i++) {
        if(i >= beginGet && i <= endGet) {
            list[i].style.display = 'table-row';
        }
        else list[i].style.display = 'none';
    }
    // console.log(list);
    //console.log(list.length);
    listPage();
}   
function listPage() {//tạo phần nút bấm để chuyển trang
    list = listElement.children;
    //console.log(list.length);
    let count = Math.ceil(list.length / limit);
    //console.log(list);
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
