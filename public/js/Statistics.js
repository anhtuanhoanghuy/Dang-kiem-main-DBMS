var thisPage = 1;
var limit = 10;
if (document.getElementById("data-table-body")){
    var listElement = document.getElementById("data-table-body");
    var list = listElement.children;
};
var maxPageButton = 7;
if (sessionStorage.getItem("car_information")) {
var data = JSON.parse(sessionStorage.getItem("car_information"));
loadData(data);
}
$("#registration-license-num").on("keyup", function() {
    var check = document.getElementById("check");
    if ($("#registration-license-num").val() != "") {
        $("#vehicle-state-all").prop("checked",true);;
        $(".vehicle-state").attr('disabled',true);
        jQuery("#city-list").prop('disabled', true);
        jQuery("#vehicle-type").prop('disabled', true);
        var text = $("#registration-license-num").val();
        if (text.charAt(0) != "#" && text.charAt(0) != "%") {
            check.innerHTML = "Trường nhập bắt dầu bằng '%' với số đăng ký xe hoặc '#' với biển số xe !";
        } else {
            var mikExp = /[\$\\\\\#\^\&\*\(\)\[\]\+\_\{\}\`\~\=\\!\|\/\?\.\,\:\;\"\'\@]/;  //Kiểm tra hợp thức
            if (text.slice(1).search(mikExp) >= 0) {
                check.innerHTML = "Vui lòng nhập đúng định dạng.";  
            } else {
                check.innerHTML = "";
            }
        }
    } else {
        check.innerHTML = "";
        $("#vehicle-state-all").prop("checked",true);;
        $(".vehicle-state").attr('disabled', false);
        jQuery("#city-list").prop('disabled', false);
        jQuery("#vehicle-type").prop('disabled', false);
    }
    
});   
$('input[name="vehicle-state"]').change(function(){

    searchVehicleData();
});

$("#registration-license-num").keypress(function(event) {
    if (event.keyCode == "13") {
        event.preventDefault();
        searchVehicleData();
        $("#registration-license-num").blur();
    }
})

function searchVehicleData() { //tìm kiếm xe
    thisPage = 1;
    document.getElementsByClassName("pagination")[0].style.display = "none";
     document.getElementById("status").style.display = "none";
     document.getElementById('table-container').style.display = "none";
    var registration_license_num = $("#registration-license-num").val();
    var city = $("#city-list").val();
    var vehicle_type = $("#vehicle-type").val();
    var vehicle_state = $('input[name="vehicle-state"]:checked').val();     
    $.post("./Statistics/showStatistics", //AJAX không tải lại
    {registration_license_num:registration_license_num,
    city: city,
    vehicle_type:vehicle_type,
    vehicle_state:vehicle_state
    },function(data){
            data =  JSON.parse(data); //dữ liệu JSON
            if (data == "error") {
            document.getElementById("status").style.display = "block";
            document.getElementById("warning").innerHTML = "Vui lòng nhập đúng định dạng.";
            document.getElementById('table-container').style.display = "none";
            
            } else if(data.length == 0) {
                document.getElementById("status").style.display = "block"; 
                document.getElementById('table-container').style.display = "none";
                if(registration_license_num == "") {
                    document.getElementById("warning").innerHTML = "Không tìm thấy xe";
                } else {
                    if(registration_license_num.charAt(0) == "#") {document.getElementById("warning").innerHTML = "Không tìm thấy xe có biển số: "+registration_license_num.substr(1);} 
                    else if (registration_license_num.charAt(0) == "%") {document.getElementById("warning").innerHTML = "Không tìm thấy xe có số đăng ký xe: "+registration_license_num.substr(1);} 
                }
            } else {
            sessionStorage.setItem("car_information", JSON.stringify(data)); 
            loadData(data);
            }
    }
)}

function loadData(data) { //load dữ liệu lên giao diện
    // console.log(data);
    if (document.getElementById("status") && document.getElementById('table-container') && document.querySelector('#data-table > tbody')) {
        document.getElementById("status").style.display = "none";
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
            a.href="./Statistics/showCarInformation/"+data[i].Bien_so;
            a.id = data[i].Bien_so;
            var l3 = document.createElement('td');
            var l4 = document.createElement('td');
            var l5 = document.createElement('td');
            var l6 = document.createElement('td');
            var l7 = document.createElement('td');
            var l8 = document.createElement('td');
            var l9 = document.createElement('td');
            var l10 = document.createElement('td');
            var l11 = document.createElement('td');
            l1.innerHTML = i + 1;
            a.innerHTML = data[i].Bien_so;
            l3.innerHTML = data[i].So_dang_ky_xe;
            l4.innerHTML = data[i].Ten_chu_xe;
            l5.innerHTML = data[i].Ngay_cap;
            l6.innerHTML = data[i].Noi_dang_ky;
            l7.innerHTML = data[i].Trang_thai;
            l8.innerHTML = data[i].Ma_dang_kiem;
            if (data[i].Ngay_dang_kiem_gan_nhat != "0000-00-00") {l9.innerHTML = data[i].Ngay_dang_kiem_gan_nhat;}
            else {l9.innerHTML = ""};
            if (data[i].Ngay_het_han != "0000-00-00") {l10.innerHTML = data[i].Ngay_het_han;}
            else {l10.innerHTML = ""};
            l11.innerHTML = data[i].Noi_dang_kiem;
            r.appendChild(l1);
            l2.appendChild(a);
            r.appendChild(l2);
            r.appendChild(l3);
            r.appendChild(l4);
            r.appendChild(l5);
            r.appendChild(l6);
            r.appendChild(l7);
            r.appendChild(l8);
            r.appendChild(l9);
            r.appendChild(l10);
            r.appendChild(l11);
            document.querySelector('#data-table > tbody').appendChild(r);                              
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

if(document.getElementById("view")) {
    document.getElementById("view").onclick = function() {
    document.getElementById("pop_up").style.display = "Block";
    document.getElementById("screen-cover").style.display = "Block";/****thêm******/

}
}


window.addEventListener("click", function(event) {
    if (event.target.matches('#screen-cover')) {
            document.getElementById("pop_up").style.display = "none";
            document.getElementById("screen-cover").style.display = "none";/****thêm******/
        } else {}
})