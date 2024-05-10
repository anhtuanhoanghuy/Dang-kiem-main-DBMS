const containerMarqueeWidth = document.getElementsByClassName('homePageContainer_marquee')

var myIndex = 0;
var forward;

$.post("./Home/showLatestNews", //AJAX không tải lại
{category_name:''
},function(data){
        data =  JSON.parse(data); //dữ liệu JSON
        for (var i=0; i<data.length; i++){
                var latest_list = document.getElementById("latest_list");
                var latest_list_bar = document.getElementById("latest_list_bar");
                var li1 = document.createElement('li');
                var li2 = document.createElement('li');
                li2.className="news_Slide fadding_animate";
                var a1 = document.createElement('a');
                var a2 = document.createElement('a');
                var img = document.createElement('img');

                a1.href = data[i].url_des;
                a1.innerHTML=data[i].news_title;
                a2.href = data[i].url_des;
                a2.innerHTML=data[i].news_title;
                a2.className="Slide_Desc";
                img.alt ='png';
                img.src = data[i].image_source;
                li1.appendChild(a1);
                li2.appendChild(img);
                li2.appendChild(a2);
                latest_list_bar.appendChild(li1);               
                latest_list.appendChild(li2);
            }
    }
)

$.post("./Home/showGeneralNews", //AJAX không tải lại
{category_name:''
},function(data){
        data =  JSON.parse(data); //dữ liệu JSON
        for (var i=0; i<data.length; i++){
            if (data[i].isMainNews == "1") {
                $("#generalMainNews_image").attr('src',data[i].image_source);
                $("#generalMainNews_title").html(data[i].news_title + `<p class="date"><span class="time">`+ data[i].time + `</span></p>`);
            } else {
                var general_list = document.getElementById("general_list");
                var li = document.createElement('li');
                var a = document.createElement('a');
                a.href = data[i].url_des;
                a.innerHTML=data[i].news_title;
                var span = document.createElement('span');
                span.className = 'time';
                span.innerHTML=' (' + data[i].time + ')';
                li.appendChild(a);
                li.appendChild(span);
                general_list.appendChild(li);

            }
        }
}
)

$.post("./Home/showGlobalNews", //AJAX không tải lại
{category_name:''
},function(data){
        data =  JSON.parse(data); //dữ liệu JSON
        for (var i=0; i<data.length; i++){
            if (data[i].isMainNews == "1") {
                $("#globalMainNews_image").attr('src',data[i].image_source);
                $("#globalMainNews_title").html(data[i].news_title + `<p class="date"><span class="time">`+ data[i].time + `</span></p>`);
            } else {
                var global_list = document.getElementById("global_list");
                var li = document.createElement('li');
                var a = document.createElement('a');
                a.href = data[i].url_des;
                a.innerHTML=data[i].news_title;
                var span = document.createElement('span');
                span.className = 'time';
                span.innerHTML=' (' + data[i].time + ')';
                li.appendChild(a);
                li.appendChild(span);
                global_list.appendChild(li);

            }
        }
}
)

$.post("./Home/showRoadNews", //AJAX không tải lại
{category_name:''
},function(data){
        data =  JSON.parse(data); //dữ liệu JSON
        for (var i=0; i<data.length; i++){
            if (data[i].isMainNews == "1") {
                $("#roadwaysMainNews_image").attr('src',data[i].image_source);
                $("#roadwaysMainNews_title").html(data[i].news_title + `<p class="date"><span class="time">`+ data[i].time + `</span></p>`);
            } else {
                var roadways_list = document.getElementById("roadways_list");
                var li = document.createElement('li');
                var a = document.createElement('a');
                a.href = data[i].url_des;
                a.innerHTML=data[i].news_title;
                var span = document.createElement('span');
                span.className = 'time';
                span.innerHTML=' (' + data[i].time + ')';
                li.appendChild(a);
                li.appendChild(span);
                roadways_list.appendChild(li);

            }
        }
}
)

$.post("./Home/showWaterwaysNews", //AJAX không tải lại
{category_name:''
},function(data){
        data =  JSON.parse(data); //dữ liệu JSON
        for (var i=0; i<data.length; i++){
            if (data[i].isMainNews == "1") {
                $("#waterwaysMainNews_image").attr('src',data[i].image_source);
                $("#waterwaysMainNews_title").html(data[i].news_title + `<p class="date"><span class="time">`+ data[i].time + `</span></p>`);
            } else {
                var waterways_list = document.getElementById("waterways_list");
                var li = document.createElement('li');
                var a = document.createElement('a');
                a.href = data[i].url_des;
                a.innerHTML=data[i].news_title;
                var span = document.createElement('span');
                span.className = 'time';
                span.innerHTML=' (' + data[i].time + ')';
                li.appendChild(a);
                li.appendChild(span);
                waterways_list.appendChild(li);

            }
        }
        carousel();
}
)

$.post("./Home/showNotification", //AJAX không tải lại
{category_name:''
},function(data){
        data =  JSON.parse(data); //dữ liệu JSON
        var notification_list = document.getElementById("notification_list");
        for (var i=0; i<data.length;i++){
            var li = document.createElement('li');
            var a = document.createElement('a');
            a.href = 'https://courses.uet.vnu.edu.vn/loginform/index.php';
            li.innerHTML = data[i].notification_title;
            li.appendChild(a);
            li.style.color = "black";
            notification_list.appendChild(li);
        }
}
)
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("news_Slide");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    if (myIndex == 0) {myIndex = x.length}
    x[myIndex-1].style.display = "block";
    forward = setTimeout(carousel, 10000);
    /* hiện slide tiếp theo ẩn phía sau  
    setTimeout(() => {
        x[myIndex].style.display = "block";
    },4000)*/
}
function showSlide(n) {
    clearTimeout(forward);
    myIndex += n;
    carousel();
}

function visitWebsite(t) {
    if (t.value != "")
    window.open(t.value);
}

